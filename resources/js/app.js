import './bootstrap';
import '../css/app.css';


import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import Layout from './Layouts/Layout.vue'
import {ZiggyVue} from '../../vendor/tightenco/ziggy'

createInertiaApp({
    title : (title) => `My App ${title}`,
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = pages[`./Pages/${name}.vue`]
    page.default.layout = page.default.layout || Layout
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .component('Head', Head) //mounting component for global use(not need to import it)
      .component('Link', Link)  //mounting component for global use(not need to import it)
      .mount(el)
  },
})
