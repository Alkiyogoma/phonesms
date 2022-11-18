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
                <Link class="nav-link active" aria-current="page" href="/">Home</Link>
                </li>
                <li class="nav-item">
                <Link class="nav-link" href="/web">New Page</Link>
                </li>
                <li class="nav-item">
                <Link class="nav-link" href="/about">About</Link>
                </li>
                <li class="nav-item">
                <Link class="nav-link" href="/post">Posts</Link>
                </li>
                <li class="nav-item">
                <Link class="nav-link" href="/contact">Disabled</Link>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <button type="button" class="btn btn-outline-light me-2">Login</button>
                <button type="button" class="btn btn-warning">Sign-up</button>
            </form>
            </div>
        </div>
    </nav>
</template>