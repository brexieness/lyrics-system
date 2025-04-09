<template>
  <div class="min-h-screen flex justify-center items-center bg-gray-100">
    <div class="bg-white p-8 rounded-md shadow-lg w-96">
      <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Admin Login</h2>
      
      <!-- Login Form -->
      <form @submit.prevent="login">
        
        <!-- Email Field -->
        <div class="mb-6">
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input
            type="email"
            v-model="email"
            id="email"
            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
            required
            placeholder="Enter your email"
          />
        </div>

        <!-- Password Field -->
        <div class="mb-6">
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input
            type="password"
            v-model="password"
            id="password"
            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
            required
            placeholder="Enter your password"
          />
        </div>

        <!-- Submit Button -->
        <div class="mb-4">
          <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200 ease-in-out">
            Login
          </button>
        </div>

        <!-- Error Message -->
        <p v-if="errorMessage" class="text-red-500 text-center mt-2">{{ errorMessage }}</p>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      email: '',
      password: '',
      errorMessage: ''
    };
  },
  methods: {
    async login() {
      try {
        const response = await axios.post('/api/admin/login', {
          email: this.email,
          password: this.password
        });

        // Store the token in localStorage
        localStorage.setItem('token', response.data.token);

        // Redirect to the admin dashboard
        this.$router.push('/admin-dashboard');
      } catch (error) {
        this.errorMessage = 'Invalid credentials or unauthorized access';
      }
    }
  }
};
</script>

<style scoped>
/* You can add custom styles here if needed */
</style>
