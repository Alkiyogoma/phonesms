<template>
    <h1>Hello, {{ name }} {{ phone }}!</h1>
</template>

<script>
export default {
    props: {
        name: String,
        phone: String,
        email: String,
    }
};
</script>