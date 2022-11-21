<template>
  <Nav />
    <h1 class="visually-hidden">Heroes examples</h1>

    <div class="px-4 py-5 my-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h1 class="display-5 fw-bold">Centered hero</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <Link href="/" class="btn btn-primary btn-lg px-4 gap-3">Primary button</Link>
            <Link href="/web" class="btn btn-outline-secondary btn-lg px-4">Secondary</Link>
        </div>
        </div>
    </div>
  <div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Vertically centered hero sign-up form</h1>
        <p class="col-lg-10 fs-4">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
          <hr class="my-4">
          <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>
  
  <div class="container px-4 py-5">
    <h2 class="pb-2 border-bottom">Features with title <font-awesome-icon icon="phone" /></h2>

    <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
      <div class="d-flex flex-column align-items-start gap-2">
        <h3 class="fw-bold">Left-aligned title explaining these awesome features</h3>
        <p class="text-muted">Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
        <a href="#" class="btn btn-primary btn-lg">Primary button</a>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 g-4">
        <div class="d-flex flex-column gap-2">
          <div
            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
            <svg class="bi" width="1em" height="1em">
              <use xlink:href="#collection" />
            </svg>
          </div>
          <h4 class="fw-semibold mb-0">Featured title</h4>
          <p class="text-muted">Paragraph of text beneath the heading to explain the heading.</p>
        </div>

        <div class="d-flex flex-column gap-2">
          <div
            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
            <font-awesome-icon icon="phone" />
          </div>
          <h4 class="fw-semibold mb-0">Featured title</h4>
          <p class="text-muted">Paragraph of text beneath the heading to explain the heading.</p>
        </div>

        <div class="d-flex flex-column gap-2">
          <div
            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
            <svg class="bi" width="1em" height="1em">
              <use xlink:href="#speedometer" />
            </svg>
          </div>
          <h4 class="fw-semibold mb-0">Featured title</h4>
          <p class="text-muted">Paragraph of text beneath the heading to explain the heading.</p>
        </div>

        <div class="d-flex flex-column gap-2">
          <div
            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
            <svg class="bi" width="1em" height="1em">
              <use xlink:href="#table" />
            </svg>
          </div>
          <h4 class="fw-semibold mb-0">Featured title</h4>
          <p class="text-muted">Paragraph of text beneath the heading to explain the heading.</p>
        </div>
      </div>
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