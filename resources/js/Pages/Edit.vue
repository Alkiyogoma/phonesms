<template>
    <Nav /> 
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="bg-light p-5 rounded">
    <h1>Hello, {{ user.first_name }} {{ user.last_name }}!</h1>
    <hr> 
    <p class="lead">This {{ user.first_name }} Profile</p>
    <ul>
        <li v-for="(profile, key ) of user">
            <span v-if="profile != 'next'">{{ key }} - {{ profile }}</span>
        </li>
    </ul>
    <Link class="btn btn-lg btn-primary" href="/users" role="button"> &raquo; Go Back</Link>
    <Link class="btn btn-lg btn-secondary"  :href="`/user/${user.next.customer_id}/edit`" role="button">Next {{ user.next.first_name }}  &raquo; </Link>
  </div>
    </main>
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