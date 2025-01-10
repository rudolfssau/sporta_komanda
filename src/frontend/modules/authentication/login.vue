<script>
import { defineComponent } from 'vue';
import axios from 'axios';

export default defineComponent({
  data() {
    return {
      email: '',
      password: '',
      errorMsg: '',
      isLoggedIn: '',
    };
  },
  methods: {
    validate() {
      let errors = [];

      if (!this.email) errors.push("E-pasts ir obligāts.");
      else if (!/\S+@\S+\.\S+/.test(this.email)) errors.push("Norādiet derīgu e-pasta adresi.");

      if (!this.password) errors.push("Parole ir obligāta.");
      this.errorMsg = errors.length ? errors.join(' ') : '';
      return !errors.length;
    },
    async submitLogin(e) {
      if (!this.validate()) {
        return;
      }

      try {
        const payload = {
          email: this.email,
          password: this.password,
        };
        await axios.post('/login', payload);
        axios.get('/isloggedin')
            .then(() => {
              window.location = '/loggedin/home';
            });
      } catch (error) {
        e.preventDefault();
        this.errorMsg = "Autentifikācijas kļūda. Lūdzu, mēģiniet vēlreiz.";
      }
    },
    goToRegister() {
      window.location = '/auth/register'; // Redirect to the registration page
    },
  },
});
</script>

<template>
  <div>
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

    <section class="container">
      <form @submit.prevent="submitLogin" class="form-wrapper">
        <h1>Pieslēgšanās</h1>
        <p>Ievadiet savu e-pasta adresi un paroli, lai pieslēgtos savam kontam.</p>

        <div class="form-group">
          <label for="email">E-pasts:</label>
          <input id="email" v-model="email" type="email" placeholder="Ierakstiet e-pastu..." />
        </div>

        <div class="form-group">
          <label for="password">Parole:</label>
          <input id="password" v-model="password" type="password" placeholder="Ierakstiet paroli..." />
        </div>

        <span class="error_message" v-if="errorMsg">
          {{ errorMsg }}
        </span>

        <button type="submit" class="form-button">Pieslēgties</button>

        <div class="form-footer">
          <p>Vai vēl nav konta?</p>
          <button type="button" class="redirect-button" @click="goToRegister">Reģistrēties</button>
        </div>
      </form>
    </section>
  </div>
</template>
