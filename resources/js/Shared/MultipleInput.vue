<template>
    <div :class="$attrs.class">
      <label v-if="label" class="block text-sm" :for="id"><span class="text-gray-700 dark:text-gray-400">{{ label }}:</span></label>
      <select :id="id" ref="input" v-model="selected" v-bind="{ ...$attrs, class: null }"  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" multiple :class="{ error: error }">
        <slot />
      </select>
      <div v-if="error" class="form-error">{{ error }}</div>
    </div>
  </template>
  
  <script>
  import { v4 as uuid } from 'uuid'
  
  export default {
    inheritAttrs: false,
    props: {
      id: {
        type: String,
        default() {
          return `multiple-input-${uuid()}`
        },
      },
      error: String,
      label: String,
      modelValue: [String, Number, Boolean],
    },
    emits: ['update:modelValue'],
    data() {
      return {
        selected: this.modelValue,
      }
    },
    watch: {
      selected(selected) {
        this.$emit('update:modelValue', selected)
      },
    },
    methods: {
      focus() {
        this.$refs.input.focus()
      },
      select() {
        this.$refs.input.select()
      },
    },
  }
  </script>
  