<template>
  <div class="admin-page">
    <header>
      <h1>Admin Panel - Pārvaldīt Lietotājus</h1>
    </header>

    <section v-if="loading">Lādē...</section>

    <section v-else>
      <table class="user-table">
        <thead>
        <tr>
          <th>ID</th>
          <th>Lietotājvārds</th>
          <th>Epasts</th>
          <th>Darbība</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="user in users" :key="user.UserID">
          <td>{{ user.UserID }}</td>
          <td>{{ user.Username }}</td>
          <td>{{ user.Email }}</td>
          <td>
            <button @click="deleteUser(user.UserID)" class="delete-button">Dzēst</button>
          </td>
        </tr>
        </tbody>
      </table>
    </section>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      users: [],
      loading: true,
    };
  },
  methods: {
    fetchUsers() {
      axios.get('/get/users')
          .then(response => {
            this.users = response.data;
            this.loading = false;
          })
          .catch(error => {
            console.error('Error fetching users:', error);
            this.loading = false;
          });
    },
    deleteUser(userID) {
      if (confirm('Vai tiešām vēlaties dzēst šo lietotāju ar visiem viņa ziņojumiem?')) {
        axios.post('/delete_user.php', { UserID: userID })
            .then(response => {
              if (response.data.success) {
                alert('Lietotājs veiksmīgi dzēsts!');
                this.users = this.users.filter(user => user.UserID !== userID);
              } else {
                alert('Neizdevās dzēst lietotāju: ' + (response.data.error || 'Nezināma kļūda'));
              }
            })
            .catch(error => console.error('Error deleting user:', error));
      }
    }
  },
  mounted() {
    this.fetchUsers();
  }
};
</script>
