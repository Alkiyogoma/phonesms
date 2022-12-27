<template>
  <div class="container px-6 mx-auto grid">
    <br>
            <!-- CTA -->
            <a
              class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
              href="/dashboard"
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
                <span>
                    <Link class="text-indigo-400 hover:text-indigo-600" href="/contacts">Contacts</Link>
                    <span class="text-indigo-400 font-medium">/
                    {{ form.name }}
                  </span>
                </span>
              </div>
              <span>View more &RightArrow;</span>
            </a>

    <div class="row">
      <div class="col-md-12">
    
    <!-- <trashed-message v-if="contact.deleted_at" class="mb-6" @restore="restore"> This contact has been deleted. </trashed-message> -->
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <form @submit.prevent="update" class="px-4 py-3 mb-8">
          <text-input v-model="form.name" :error="form.errors.name" class="pb-8 pr-6 w-full lg:w-1/2" value="{{ contact.name }}" label="Fullname" />
          <text-input v-model="form.phone" :error="form.errors.phone" class="pb-8 pr-6 w-full lg:w-1/2" value="{{ contact.phone }}" label="phone name" />
          <select-input v-model="form.organization_id" :error="form.errors.organization_id" class="pb-8 pr-6 w-full lg:w-1/2" label="Groups">
            <option :value="null" />
            <option v-for="organization in groups" :key="organization.id" :value="organization.id">{{ organization.name }}</option>
          </select-input>
          <text-input v-model="form.email" :error="form.errors.email" class="pb-8 pr-6 w-full lg:w-1/2" :value="contact.email" label="Email" />
          <text-input v-model="form.phone" :error="form.errors.phone" class="pb-8 pr-6 w-full lg:w-1/2" label="Phone" />
          <text-input v-model="form.address" :error="form.errors.address" class="pb-8 pr-6 w-full lg:w-1/2" value="{{ contact.address }}" label="Address" />
          <text-input v-model="form.jod" :error="form.errors.jod" class="pb-8 pr-6 w-full lg:w-1/2"  :value="contact.jod" type="date" label="jod"/>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <button v-if="!contact.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete Contact</button>
          <loading-button :loading="form.processing" class="px-3 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600  rounded-lg shadow-md" type="submit">Update Contact</loading-button>
        </div>
      </form>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
// import Layout from '@/Shared/Layout'
import TextInput from '../../Shared/TextInput'
import SelectInput from '../../Shared/SelectInput'
import LoadingButton from '../../Shared/LoadingButton'
import TrashedMessage from '../../Shared/TrashedMessage'

export default {
  components: {
    Link,
    LoadingButton,
    SelectInput,
    TextInput,
    TrashedMessage,
  },
  props: {
    contact: Object,
    groups: Array,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        name: this.contact.name,
        organization_id: this.contact.organization_id,
        email: this.contact.email,
        phone: this.contact.phone,
        address: this.contact.address,
        jod: this.contact.jod,
      }),
    }
  },
  methods: {
    update() {
      this.form.put(`/contacts/${this.contact.id}`)
    },
    destroy() {
      if (confirm('Are you sure you want to delete this contact?')) {
        this.$inertia.delete(`/contacts/${this.contact.id}`)
      }
    },
    restore() {
      if (confirm('Are you sure you want to restore this contact?')) {
        this.$inertia.put(`/contacts/${this.contact.id}/restore`)
      }
    },
  },
}
</script>
