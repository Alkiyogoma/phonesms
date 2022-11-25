<template>

<div class="container px-6 mx-auto grid">
            <br>
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              Cards with title
            </h4>
            <div class="grid gap-6 mb-8 md:grid-cols-2">
              <div
                class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                  Revenue
                </h4>
                <p class="text-gray-600 dark:text-gray-400"> Hello, {{ user.first_name }} {{ user.last_name }}!</p>
        <hr> 
        <p class="mb-4 font-semibold text-gray-600 dark:text-gray-300">This {{ user.first_name }} Profile</p>
        <ul class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
            <li class="font-semibold text-gray-300 dark:text-gray-300" v-for="(profile, key ) of user">
                <span v-if="profile != 'next'">{{ key }} - {{ profile }}</span>
            </li>
        </ul>
    <Link class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="/users"> 
                  Go Back
    </Link>
    <Link class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
         :href="`/user/${user.next.customer_id}/edit`"> 
        NEXT {{user.next.first_name}}
    </Link>
    </div>
    </div>
    </div>
</template>

<script>
import Nav from '../Shared/Nav.vue';

export default {
    components: { Nav },
    props: {
        user: Array
    }
};
</script>