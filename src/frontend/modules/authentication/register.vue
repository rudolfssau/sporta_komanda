<script>
import { defineComponent } from 'vue';
import axios from 'axios';

export default defineComponent({
  data() {
    return {
      name: '',
      email: '',
      password: '',
      confirm_password: '',
      errorMsg: '',
    };
  },
  methods: {
    validate() {
      let errors = [];

      if (!this.name) errors.push("Vārds ir nepieciešams.");
      if (!this.email) errors.push("Ēpasts ir nepieciešams.");
      else if (!/\S+@\S+\.\S+/.test(this.email)) errors.push("Ēpasts nedrīkst saturēt neatļautas rakstzīmes.");

      if (!this.password) errors.push("Parole ir nepieciešama.");
      if (this.password.length < 6) errors.push("Parolei jābūt vismaz 6 rakstzīmes garai.");

      if (this.password !== this.confirm_password) errors.push("Paroles nesakrīt.");

      this.errorMsg = errors.length ? errors.join(" ") : '';
      return !errors.length;
    },
    async submitForm(e) {
      if (!this.validate()) {
        return;
      }

      try {
        const payload = {
          name: this.name,
          email: this.email,
          password: this.password,
        };
        await axios.post('/register', payload);
        window.location = '/auth/login';
      } catch (error) {
        e.preventDefault();
        this.errorMsg = "An error occurred during registration. Please try again later.";
      }
    },
  },
});
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
      <form @submit.prevent="submitForm" class="form-wrapper">
        <h1>Reģistrācija</h1>
        <p>Lūdzu aizpildiet šo formu, lai reģistrētos.</p>
        <div class="form-group">
          <label for="name">Vārds:</label>
          <input id="name" v-model="name" type="text" placeholder="Ierakstiet vārdu..." />
        </div>

        <div class="form-group">
          <label for="email">E-pasts:</label>
          <input id="email" v-model="email" type="email" placeholder="Ierakstiet e-pastu..." />
        </div>

        <div class="form-group">
          <label for="password">Parole:</label>
          <input id="password" v-model="password" type="password" placeholder="Izveidojiet paroli..." />
        </div>

        <div class="form-group">
          <label for="confirm_password">Apstipriniet paroli:</label>
          <input id="confirm_password" v-model="confirm_password" type="password" placeholder="Atkārtojiet paroli..." />
        </div>

        <span class="error_message" v-if="errorMsg">
        {{ errorMsg }}
      </span>

        <button type="submit" class="form-button">Reģistrēties</button>
      </form>
    </section>

  </div>
</template>
