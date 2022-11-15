# laravel-inertiajs
Inertia.js lets you quickly build modern single-page React, Vue and Svelte apps using classic server-side routing and controllers.

Build single-page apps, without building an API.

# Installation Steps

## Your First Laravel Project

Before creating your first Laravel project, you should ensure that your local machine has PHP and Composer installed. 
 #### composer create-project laravel/laravel project-name
 
## 2. Inertia Server-side setup

The first step when installing Inertia is to configure your server-side framework. Inertia ships with official server-side adapters for Laravel and Rails. 
Install the Inertia server-side adapters using the preferred package manager for that language or framework.

 #### composer require inertiajs/inertia-laravel
 #### php artisan inertia:middleware
 #### 
 
 ## 3. Client-side setup (vue3)

Once you have your server-side framework configured, you then need to setup your client-side framework. Inertia currently provides support for React, Vue, and Svelte.

 #### npm install @inertiajs/inertia @inertiajs/inertia-vue3
 ####  npm install vue@next
 #### npm install -D vue@compiler-sfc
 ####  npx mix
 
 
