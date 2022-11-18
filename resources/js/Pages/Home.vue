<template>
    
<main class="container">
  <div class="bg-light p-5 rounded">
    <h1>Hello, {{ name }} {{ phone }}!</h1>
    <hr> 
    <p class="lead">In this tutoaliars  i will show th teh list of companies i work with</p>
    <ul>
        <li v-for="company of companies" v-text="company"></li>
    </ul>
    <a class="btn btn-lg btn-primary" href="../components/navbar/" role="button">View navbar docs &raquo;</a>
  </div>
</main>
</template>

<script>
export default {
    props: {
        name: String,
        phone: String,
        email: String,
        companies: Array
    }
};
</script>