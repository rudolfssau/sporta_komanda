<script>
import axios from 'axios';

export default {
  data() {
    return {
      posts: [], // To hold the fetched pictures
    };
  },
  methods: {
    async getAllPosts() {
      try {
        const response = await axios.get('/get/pictures'); // Fetch the pictures from the API
        this.posts = response.data; // Store the response data in posts
      } catch (error) {
        console.error('Error fetching pictures:', error);
      }
    },
  },
  mounted() {
    this.getAllPosts(); // Fetch posts when the component mounts
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
              <li><a onclick="location.href = '/add-product';">Aptauja</a></li>
              <li><a onclick="location.href = '/add-product';">Kontakti</a></li>
            </ul>
          </div>
          <div class="navbar-right">
            <div class="action-button">
              <a href="#"><i class="fas fa-sign-in-alt"></i> Ienkākt</a>
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
      <div class="gallery-grid">
        <div v-for="post in posts" :key="post.id" class="gallery-card">
          <h3 class="image-title">{{ post.title }}</h3>
          <p class="image-description">{{ post.description }}</p>
          <img class="gallery-image" :src="post.url" :alt="post.title" style="width: 100%" />
        </div>
      </div>
    </section>
  </div>
</template>
