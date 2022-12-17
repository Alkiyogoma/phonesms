<template>
<div class="container grid px-6 mx-auto">
    <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Tables
            </h2>
            <!-- CTA -->
            <a
              class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
              href="https://github.com/estevanmaito/windmill-dashboard"
            >
              <div class="flex items-center">
                <svg
                  class="w-5 h-5 mr-2"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <span>List of Registered users</span>
              </div>
              <span>View more &RightArrow;</span>
            </a>

            <!-- With avatar -->
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Table with avatars
            </h4>
    <div class="row">
        <div class="col-md-12">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                        <th scope="px-4 py-3">#</th>
                        <th scope="px-4 py-3">Fullname</th>
                        <th scope="px-4 py-3">API Key</th>
                        <th scope="px-4 py-3">Phone</th>
                        <th scope="px-4 py-3">Email</th>
                        <th scope="px-4 py-3">Join Date</th>
                        <th scope="px-4 py-3">Action</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400" v-for="user in users" :key="user.store_id">
                                <td>{{ user.id }}</td>
                                <td>{{ user.name }}</td>
                                <td>{{ user.api_key }}</td>
                                <td>{{ user.phone }}</td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.create_date }}</td>
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
              </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Nav from "../Shared/Nav.vue";
import DataTable from 'datatables.net-vue3'
import DataTablesLib from 'datatables.net';
 
DataTable.use(DataTablesLib);

export default {
    components: { Nav },
    props: {
        name: String,
        phone: String,
        email: String,
        users: Array,
    },
   
};

</script>
