<script>
import axios from 'axios';

export default {
  data() {
    return {
      posts: [],
    };
  },
  methods: {
    getAllPosts() {
      axios.get('/get/posts')
          .then((response) => {
            this.posts = this.processPosts(response.data);
          })
          .catch((error) => {
            console.error('Error fetching posts:', error);
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
  },
  mounted() {
    this.getAllPosts();
  },
};
</script>

<template>
  <div>
    <!-- Navigation Bar -->
    <header>
      <section class="container">
        <nav>
          <div class="navbar-left">
            <ul>
              <li><a onclick="location.href = '/home';">Sākums</a></li>
              <li><a onclick="location.href = '/pictures';">Bildes</a></li>
              <li><a onclick="location.href = '#';">Kontakti</a></li>
            </ul>
          </div>
          <div class="navbar-right">
            <div class="action-button">
              <a onclick="location.href = '/auth/login';"><i class="fas fa-sign-in-alt"></i> Ienkākt</a>
            </div>
          </div>
        </nav>
        <div class="header-contents">
          <div class="contents">
            <div class="content">
              <h1 class="content-title">TET RALLY LATVIA.</h1>
              <div class="action-button">
                <a href="https://youtu.be/ium-TfpK9dg?si=rdne3m8Mpf3RVjFA">
                  Skatīties tagad <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </header>

    <!-- Posts Section -->
    <section class="container">
      <div v-for="post in posts" :key="post.PostID" class="post">
        <img :src="post.ImageURL" alt="Post image" class="post-image" />
        <h2>{{ post.Title }}</h2>
        <p>{{ post.Content }}</p>
        <div class="comments-section" v-if="post.Comments.length">
          <h4>Comments:</h4>
          <ul>
            <li v-for="comment in post.Comments" :key="comment.CommentedAt">
              <span><strong>{{ comment.Commenter }}</strong>: {{ comment.Comment }}</span>
              <span class="comment-date">({{ comment.CommentedAt }})</span>
            </li>
          </ul>
        </div>
        <p v-else>No comments available.</p>
      </div>
    </section>

  </div>
</template>
