<template>
  <div>
    <header>
      <section class="container">
        <nav>
          <div class="navbar-left">
            <ul>
              <li><a onclick="location.href = '/home';">Sākums</a></li>
              <li><a onclick="location.href = '/pictures';">Bildes</a></li>
              <li><a onclick="location.href = '/vote';">Aptauja</a></li>
              <li><a onclick="location.href = '#';">Kontakti</a></li>
            </ul>
          </div>
          <div class="navbar-right">
            <div class="action-button">
              <a @click="logout"><i class="fas fa-sign-in-alt"></i> Iziet</a>
            </div>
          </div>
        </nav>
        <div class="header-contents">
          <div class="contents">
            <h1 class="content-title">TET RALLY LATVIA.</h1>
            <div class="action-button">
              <a href="https://youtu.be/ium-TfpK9dg?si=rdne3m8Mpf3RVjFA">
                Skatīties tagad <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </section>
    </header>
    <section class="container">
      <div v-for="post in posts" :key="post.PostID" class="post">
        <img :src="post.ImageURL" alt="Post image" class="post-image" />
        <h2>{{ post.Title }}</h2>
        <p>{{ post.Content }}</p>
        <div class="comments-section">
          <h4>Comments:</h4>
          <ul>
            <li v-for="comment in post.Comments" :key="comment.CommentedAt">
              <strong>{{ comment.Commenter }}</strong>: {{ comment.Comment }}
              <span class="comment-date">({{ comment.CommentedAt }})</span>
            </li>
          </ul>
          <div v-if="isLoggedIn" class="comment-form">
            <textarea
                v-model="newComments[post.PostID]"
                placeholder="Add a comment..."
                rows="3"
            ></textarea>
            <button @click="submitComment(post.PostID)">Submit</button>
          </div>
          <p v-else>Please log in to add comments.</p>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      posts: [],
      isLoggedIn: false,
      newComments: {},
    };
  },
  methods: {
    logout() {
      axios.post('/logout')
          .then(response => {
            window.location.href = '/home';
          })
          .catch(error => {
            console.error('Error during logout:', error);
          });
    },
    getAllPosts() {
      axios
          .get("/get/posts")
          .then((response) => {
            this.posts = this.processPosts(response.data);
          })
          .catch((error) => {
            console.error("Error fetching posts:", error);
          });
    },
    processPosts(data) {
      const groupedPosts = {};
      data.forEach((entry) => {
        if (!groupedPosts[entry.PostID]) {
          groupedPosts[entry.PostID] = {
            PostID: entry.PostID,
            Title: entry.Title,
            Content: entry.Content,
            ImageURL: entry.ImageURL,
            Author: entry.Author,
            Comments: [],
          };
        }
        if (entry.Comment) {
          groupedPosts[entry.PostID].Comments.push({
            Comment: entry.Comment,
            Commenter: entry.Commenter,
            CommentedAt: entry.CommentedAt,
          });
        }
      });
      return Object.values(groupedPosts);
    },
    submitComment(postID) {
      const comment = this.newComments[postID];
      if (!comment) {
        alert("Comment cannot be empty!");
        return;
      }

      axios
          .post("/comment", {
            postID,
            comment,
          })
          .then((response) => {
            if (response.data) {
              this.getAllPosts();
            } else {
              alert("Error adding comment.");
            }
          })
          .catch((error) => {
            console.error("Error adding comment:", error);
          })
          .finally(() => {
            this.newComments[postID] = "";
          });
    },
  },
  mounted() {
    this.getAllPosts();
    axios
        .get("/isloggedin")
        .then((response) => {
          this.isLoggedIn = response.data['status'];
        })
        .catch((error) => {
          console.error("Error checking login status:", error);
        });
  },
};
</script>
