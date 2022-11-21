<template>
    <Nav />
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="bg-light p-3 rounded">
                    <h1>Hello, {{ name }}</h1>
                    <hr />
                    <p class="lead">
                        In this tutoaliars i will show th teh list of companies
                        i work with
                    </p>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">City</th>
                                <th scope="col">County</th>
                                <th scope="col">Address</th>
                                <th scope="col">Join Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users.data" :key="user.address" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                <td>{{ user.id }}</td>
                                <td>{{ user.city }}</td>
                                <td>{{ user.country }}</td>
                                <td>{{ user.address }}</td>
                                <td>{{ user.deleted_at }}</td>
                                <td>
                                    <Link
                                        class="flex items-center px-4"
                                        :href="`/user/${user.id}/edit`"
                                        tabindex="-1"
                                        >Edit</Link
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li v-for="page_id in users.links" :key="page_id" class="page-item {{ 'active' : page_id.active === true }}">
                        <Link class="page-link" :href="`/messages?page=${page_id.label }`" tabindex="-1">{{ page_id.label }}</Link>
                        </li>
                    </ul>
                    </nav>
                    <Link class="btn btn-lg btn-primary" :href="`/messages?page=${users.current_page +1 }`" role="button">
                      Next Page  &raquo;</Link>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
import Nav from "../Shared/Nav.vue";

export default {
    components: { Nav },
    props: {
        name: String,
        users: Array,
    },
};
</script>
