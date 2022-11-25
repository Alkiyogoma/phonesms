<template>
    <Nav /> 
    <div class="flex flex-col flex-1">
      <main class="h-full pb-16 overflow-y-auto">
          <!-- Remove everything INSIDE this div to a really blank page -->
          <div class="container px-6 mx-auto grid">
            <hr> 
            <p class="lead">In this tutoaliars  i will show th teh list of companies i work with</p>
            <Link class="btn btn-lg btn-primary" href="/" role="button"> &raquo; Go Back</Link>
          </div>
        </main>
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