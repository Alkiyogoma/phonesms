<template>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Inertia-JS APP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" href="/web">New Page</Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" href="/about">About</Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" href="/users">Customers</Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" href="/dashboard">Dashboard</Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link btn btn-dark btn-sm" href="/logouts" method="post" as="button">Post Link</Link>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <a href="/login" class="btn btn-outline-light me-2">Login</a>
                <a href="/register" class="btn btn-warning">Sign-up</a>
            </form>
            </div>
        </div>
    </nav>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: { Link },
};

</script>