// resources/js/router/index.js
import { createRouter, createWebHistory } from 'vue-router';
import AccountList from '../components/AccountList.vue'; // Ajusta la ruta según sea necesario
import AdminDashboard from '../components/AdminDashboard.vue'; 
import UserDashboard from '../components/UserDashboard.vue'; 
import DashBoard from '../components/DashBoard.vue';
import UserReports from '../components/UserReports.vue';

const routes = [
    { path: '/accounts', component: AccountList },
    { path: '/dashboard', component: DashBoard },
    //ADMIN VIEWS
    { path: '/admin/dashboard', component: AdminDashboard },
    //USER VIEWS
    { path: '/user/dashboard', component: UserDashboard },
    { path: '/user/reports', component: UserReports },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
