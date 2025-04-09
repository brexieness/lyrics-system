import { createApp } from 'vue';  // Vue is automatically resolved by Vite
import App from './App.vue';  // Import the main App component
import router from './router';  // Import the router (relative path)
import '../css/app.css';

const app = createApp(App);  // Create the Vue app with App.vue
app.use(router);  // Use the router
app.mount('#app');  // Mount the app to the DOM element with id "app"
