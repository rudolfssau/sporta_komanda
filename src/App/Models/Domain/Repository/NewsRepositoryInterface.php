<?php

namespace Main\App\Models\Domain\Repository;

interface NewsRepositoryInterface
{
    public function fetchAttribute(): array;
    public function fetchPictures(): array;
    public function fetchUsers(): array;

    public function verifyUser(string $email, string $password): bool;
    public function verifyAdmin(string $email, string $password): bool;

    public function insertComment(string $postId, string $comment);

    public function registerUser(string $username, string $email, string $password);
}
