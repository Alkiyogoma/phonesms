<template>
    <Nav /> 
    <div class="container-fluid">
  <div class="row">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="bg-light p-5 rounded">
    <h1>Hello, {{ name }} {{ phone }}!</h1>
    <hr> 
    <p class="lead">In this tutoaliars  i will show th teh list of companies i work with</p>
    <ul>
        <li v-for="company of companies" v-text="company"></li>
    </ul>
    <Link class="btn btn-lg btn-primary" href="/" role="button"> &raquo; Go Back</Link>
  </div>
    </main>
</div>
</div>
</template>

<script>
import Nav from '../Shared/Nav.vue';

export default {
    components: { Nav },
    props: {
        name: String,
        phone: String,
        email: String,
    }
};
</script>