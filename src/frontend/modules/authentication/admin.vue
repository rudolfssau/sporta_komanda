<template>
  <div class="admin-login-page">
    <h1>Admin Login</h1>
    <form @submit.prevent="loginAdmin">
      <div class="form-group">
        <label for="email">Ēpasts</label>
        <input
            type="email"
            id="email"
            v-model="email"
            required
        />
      </div>
      <div class="form-group">
        <label for="password">Parole</label>
        <input
            type="password"
            id="password"
            v-model="password"
            required
        />
      </div>
      <button type="submit" class="login-button">Ienākt</button>
    </form>
    <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      email: '',
      password: '',
      errorMessage: '',
    };
  },
  methods: {
    loginAdmin() {
      axios.post('/admin/login', {
        email: this.email,
        password: this.password,
      })
          .then(response => {
            if (response.data['status']) {
              window.location.href = '/admin/dashboard';
            } else {
              this.errorMessage = response.data.message || 'Pieslēgšanās kļūda!';
            }
          })
          .catch(error => {
            this.errorMessage = 'Servera kļūda, mēģiniet vēlreiz!';
            console.error('Login Error:', error);
          });
    },
  },
};
</script>
