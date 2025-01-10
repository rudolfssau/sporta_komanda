<?php

namespace Main\App\Models\Persistence;

use Exception;
use Main\App\Database\Connection;
use Main\App\Models\Domain\Repository\NewsRepositoryInterface;
use PDO;

/**
 * News repository
 */
class NewsMySQLRepository implements NewsRepositoryInterface
{
    /**
     * @param Connection $connection
     */
    public function __construct(
        private readonly Connection $connection
    ) {
    }

    public function verifyUser(string $email, string $password): bool
    {
        $query = "SELECT * FROM users WHERE email = :s";

        $pdo = $this->connection->connect();
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":s", $email);
        $stmt->execute();
        $values = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($values) {
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $values['UserID'];
            return true;
        }

        http_response_code(401);
        echo json_encode(["error" => "Invalid email or password."]);
        return false;
    }

    /**
     * @return array
     */
    public function fetchAttribute(): array
    {
        $pdo = $this->connection->connect()->prepare(
            'SELECT 
            p.PostID, 
            p.Title, 
            p.Content, 
            p.ImageURL, 
            u.Username AS Author, 
            c.Content AS Comment, 
            cu.Username AS Commenter, 
            c.CommentedAt 
            FROM 
                Posts p 
            LEFT JOIN Comments c ON p.PostID = c.PostID 
            LEFT JOIN Users u ON p.AuthorID = u.UserID 
            LEFT JOIN Users cu ON c.UserID = cu.UserID'
        );
        $pdo->execute();

        return $pdo->fetchall(PDO::FETCH_ASSOC) ?: [];
    }

    /**
     * @return array
     */
    public function fetchPictures(): array
    {
        $pdo = $this->connection->connect()->prepare(
            'SELECT id, title, description, url FROM Images'
        );
        $pdo->execute();

        return $pdo->fetchall(PDO::FETCH_ASSOC) ?: [];
    }

    /**
     * @return mixed
     */
    public function insertComment(string $postId, string $comment): bool
    {
        header('Content-Type: application/json');
        $status = false;
        $userID = $_SESSION['userid'];
        $pdo = $this->connection->connect();
        try {
            $stmt = $pdo->prepare("
            INSERT INTO Comments (Content, PostID, UserID) VALUES (
                    :content,
                    :postId,
                    :userId
                    )
            ");
            $stmt->execute([
                ':content' => $comment,
                ':postId' => $postId,
                ':userId' => $userID
            ]);
            $status = true;
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }

        return $status;
    }

    /**
     * @param string $username
     * @param string $email
     * @param string $password
     * @return mixed
     */
    public function registerUser(string $username, string $email, string $password)
    {
        $pdo = $this->connection->connect();
        try {
            $stmt = $pdo->prepare("
            INSERT INTO Users (Username, Email, PasswordHash) VALUES (
                    :username,
                    :email,
                    :password
                    )
            ");
            $stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':password' => $password
            ]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    public function verifyAdmin(string $email, string $password): bool
    {
        $query = "SELECT * FROM users WHERE email = :s AND isAdmin = 1";

        $pdo = $this->connection->connect();
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":s", $email);
        $stmt->execute();
        $values = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($values) {
            $_SESSION['loggedin'] = true;
            $_SESSION['adminid'] = $values['UserID'];
            return true;
        }

        http_response_code(401);
        echo json_encode(["error" => "Invalid email or password."]);
        return false;
    }
    public function fetchUsers(): array
    {
        $pdo = $this->connection->connect()->prepare(
            'SELECT UserID, Username, Email FROM Users'
        );
        $pdo->execute();

        return $pdo->fetchall(PDO::FETCH_ASSOC) ?: [];
    }
}
