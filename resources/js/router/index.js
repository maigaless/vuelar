import { createRouter, createWebHistory } from 'vue-router'

// Mock authentication function (replace with your actual authentication logic)
const isAuthenticated = () => {
  // Replace this with your actual authentication logic
  return !!localStorage.getItem('is_authenticated'); // Example: check if user is stored in localStorage
}

const routes = [
  {
    path: '/',
    name: 'home',
    component: () => import('@/vues/home.vue'),
  },
  {
    path: '/login',
    name: 'login',
    component: () => import('@/components/authen/login.vue'),
  },
  {
    path: '/register',
    name: 'register',
    component: () => import('@/components/authen/register.vue'),
  },
  {
    path: '/foundpassord',
    name: 'foundpassord',
    component: () => import('@/components/authen/lostpassword.vue'),
  },
 
  {
    path: '',
    name: 'app',
    component: () => import('@/vues/app/index.vue'),
    children: [
      {
        path: '/dashboard', // Note: path should not start with a '/'
        name: 'dashboard',
        component: () => import('@/vues/app/dashboard.vue'),
        
      },
      {
        path: '/catalog', // Note: path should not start with a '/'
        name: 'catalog',
        component: () => import('@/vues/app/catalog.vue'),
      },
    
    
      {
        path: '/parameters', // Note: path should not start with a '/'
        name: 'parameters',
        component: () => import('@/vues/app/parameters.vue'),
      },
      {
        path: '/users', // Note: path should not start with a '/'
        name: 'users',
        component: () => import('@/components/appSetting/users.vue'),
      },
      {
        path: '/myprofile',
        name: 'myprofile',
        component: () => import('@/components/authen/myprofile.vue'),
      },
    ]
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

// Navigation guard to restrict access to authenticated users
router.beforeEach((to, from, next) => {
  const publicPages = ['/login', '/register', '/foundpassord']; // Define public routes
  const authRequired = !publicPages.includes(to.path);
  
  if (authRequired && !isAuthenticated()) {
    // If the route requires authentication and the user is not authenticated
    next({ name: 'login' }); // Redirect to login page
  } else {
    next(); // Allow the navigation
  }
});

export default router;