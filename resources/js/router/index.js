import { createRouter, createWebHistory } from 'vue-router';
import SongList from '../components/SongList.vue';
import SongDetail from '../components/SongDetail.vue';
import LoginEntry from '../LoginEntry.vue'; // <-- Corrected here
import AdminDashboard from '../components/AdminDashboard.vue';

const routes = [
    {
        path: '/',
        name: 'Home',
        component: SongList
    },
    {
        path: '/song/:id',
        name: 'SongDetail',
        component: SongDetail
    },
    {
        path: '/loginentry',
        name: 'Login',
        component: LoginEntry // <-- Corrected here
    },
    {
        path: '/admin-dashboard',
        name: 'AdminDashboard',
        component: AdminDashboard,
        meta: { requiresAuth: true }
    }
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL), // <-- Vite uses import.meta.env
    routes
});

// Navigation Guard
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!localStorage.getItem('token')) {
            next('/login');
        } else {
            next();
        }
    } else {
        next();
    }
});

export default router;
