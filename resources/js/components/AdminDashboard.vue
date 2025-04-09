<template>
    <div>
      <h1>Admin Dashboard</h1>
      <p>Welcome, Admin! Here you can manage songs, categories, and more.</p>
      
      <div>
        <h2>Manage Songs</h2>
        <button @click="goToManageSongs">Manage Songs</button>
      </div>
      
      <div>
        <h2>Manage Categories</h2>
        <button @click="goToManageCategories">Manage Categories</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'AdminDashboard',
    methods: {
      goToManageSongs() {
        this.$router.push({ name: 'ManageSongs' });
      },
      goToManageCategories() {
        this.$router.push({ name: 'ManageCategories' });
      }
    }
  }
  </script>
  
  <style scoped>
  /* Add styles to make your dashboard look better */
  h1 {
    font-size: 2rem;
    font-weight: bold;
  }
  button {
    padding: 0.5rem 1rem;
    background-color: #3490dc;
    color: white;
    border: none;
    border-radius: 0.25rem;
    cursor: pointer;
  }
  button:hover {
    background-color: #2779bd;
  }
  </style>
  