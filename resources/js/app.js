import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
// import 'bootstrap-vue/dist/bootstrap-vue.css';
// import 'bootstrap/dist/css/bootstrap.css';
// import "bootstrap/dist/css/bootstrap.min.css"
// import "bootstrap"
import 'feather-icons'

import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { Link } from '@inertiajs/inertia-vue3'
import Header from './Pages/Header.vue'
import { InertiaProgress } from '@inertiajs/progress'
 
createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component("font-awesome-icon", FontAwesomeIcon)
      .component("Link", Link)
      .mount(el)

  },
  components: {
    Header
  }
});

InertiaProgress.init({
  color: 'red',
  showSpinner: true,
});
