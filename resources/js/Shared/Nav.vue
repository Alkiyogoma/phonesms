<template>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <Link class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/">Company name</Link>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <Link class="nav-link px-3 " href="/logout">Sign out</Link>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <Link class="nav-link active" aria-current="page" href="/">
              <vue-feather type="home" size="16"></vue-feather>
              Dashboard
            </Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" href="/users">
              <vue-feather type="users" size="16"></vue-feather>
              Our Clients
            </Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" href="familiy/index">
              <vue-feather type="check-square" size="16"></vue-feather>
              Sender Names
            </Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" href="/messages">
              <vue-feather type="message-circle" size="16"></vue-feather>
              Messages
            </Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" href="/invoices">
              <vue-feather type="printer" size="16"></vue-feather>
              Invoices
            </Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" href="/groups">
              <vue-feather type="copy" size="16"></vue-feather>
              Clients Groups
            </Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" href="/contacts">
              <vue-feather type="grid" size="16"></vue-feather>
              Contact Numbers
            </Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" href="/integretions">
              <vue-feather type="code" size="16"></vue-feather>
              Intergrations
            </Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" href="/reports">
              <vue-feather type="briefcase" size="16"></vue-feather>
              Commisions
            </Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" href="/reports">
              <vue-feather type="layers" size="16"></vue-feather>
              Reports
            </Link>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Saved reports</span>
          <Link class="link-secondary" href="#" aria-label="Add a new report">
            <vue-feather type="plus-circle" size="16"></vue-feather>
          </Link>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <Link class="nav-link" href="/month">
              <vue-feather type="sliders" size="16"></vue-feather>
              Current Month
            </Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" href="/last">
              <vue-feather type="twitch" size="16"></vue-feather>
              Last Month
            </Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" href="/week">
              <vue-feather type="trello" size="16"></vue-feather>
              This Week
            </Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" href="/year">
              <vue-feather type="table" size="16"></vue-feather>
              Year-end sale
            </Link>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</div>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';
import VueFeather from 'vue-feather';
 
export default {
    components: { Link, VueFeather },
};

</script>