<template>

    <h1>Hello, {{ name }} {{ phone }}!</h1>
    <Nav />
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