<template>
    <Nav /> 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
    <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First Name</th>
              <th scope="col">Last name</th>
              <th scope="col">Email</th>
              <th scope="col">Join Date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users" :key="user.store_id" class="hover:bg-gray-100 focus-within:bg-gray-100">
              <td>{{ user.store_id }}</td>
              <td>{{ user.first_name }}</td>
              <td>{{ user.last_name }}</td>
              <td>{{ user.email }}</td>
              <td>{{ user.create_date }}</td>
              <td><Link class="flex items-center px-4" :href="`/user/${user.customer_id}/edit`" tabindex="-1">Edit</Link></td>
            </tr>
          </tbody>
        </table>
      </div>
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
        users: Array,
    }
};
</script>