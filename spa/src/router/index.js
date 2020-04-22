import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from '@/pages/site/Home'
import Register from '@/pages/site/Register'
import Login from '@/pages/site/Login'

import AppHome from '@/pages/app/Home'



Vue.use(VueRouter)

const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'app',
        path: '/app',
        component: AppHome,
        meta: { requiresAuth: true }
    }

]



const router = new VueRouter({ mode: 'history', routes });

function isloggedIn(){
    return localStorage.getItem("auth");
}

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (!isloggedIn()) {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!
    }
});


export default router