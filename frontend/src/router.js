import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import ProductDetail from './views/ProductDetail.vue'

Vue.use(Router)

export default new Router({
    mode: 'hash',
    base: process.env.BASE_URL,
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/products/:id',
            name: 'productDetails',
            component: ProductDetail
        }
    ]
})
