<template>
  <div class="flex items-center">
    <div class="flex w-full bg-white rounded shadow">
      <dropdown :auto-close="false" class="focus:z-10 px-4 hover:bg-gray-100 border-r focus:border-white rounded-l focus:ring md:px-6" placement="bottom-start">
        <template #default>
          <div class="flex items-baseline">
            <span class="hidden text-gray-700 md:inline">Filter</span>
            <svg class="w-2 h-2 fill-gray-700 md:ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 961.243 599.998">
              <path d="M239.998 239.999L0 0h961.243L721.246 240c-131.999 132-240.28 240-240.624 239.999-.345-.001-108.625-108.001-240.624-240z" />
            </svg>
          </div>
        </template>
        <template #dropdown>
          <div class="mt-2 px-4 py-6 w-screen bg-white rounded shadow-xl" :style="{ maxWidth: `${maxWidth}px` }">
            <slot />
          </div>
        </template>
      </dropdown>
      <!-- <input
                  class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                  type="text"
                  aria-label="Search" name="search" placeholder="Search…" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" 
                /> -->
      <input class="relative px-6 py-3 w-full rounded-r focus:shadow-outline" autocomplete="off" type="text" name="search" placeholder="Search…" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" />
    </div>
    <button class="px-3 py-3 inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"  type="button" @click="$emit('reset')">
                    Clear
                  </button>
    <!-- <button class="ml-3 text-gray-500 hover:text-gray-700 focus:text-indigo-500 text-sm" type="button" @click="$emit('reset')">Reset</button> -->
  </div>
</template>

<script>
import Dropdown from './Dropdown'

export default {
  components: {
    Dropdown,
  },
  props: {
    modelValue: String,
    maxWidth: {
      type: Number,
      default: 300,
    },
  },
  emits: ['update:modelValue', 'reset'],
}
</script>
