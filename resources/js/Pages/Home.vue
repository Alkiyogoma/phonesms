<template>
    <h1>Hello, {{ name }} {{ phone }}!</h1>
    <hr> 
    <p>In this tutoaliars  i will show th teh list of companies i work with</p>
    <ul>
        <li v-for="company of companies" v-text="company"></li>
    </ul>
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
echo "# chat-api-php" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin git@github.com:Alkiyogoma/laravel-inertiajs.git
git push -u origin main