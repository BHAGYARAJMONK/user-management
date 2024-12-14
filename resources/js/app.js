import { createApp, h } from 'vue'; // Import h here
import 'bootstrap/dist/css/bootstrap.min.css';
import { InertiaApp } from '@inertiajs/inertia-vue3';

const app = createApp({
  render: () =>
    h(InertiaApp, {
      initialPage: JSON.parse(document.getElementById('app').dataset.page),
      resolveComponent: (name) => import(`./components/${name}.vue`).then((module) => module.default),

    }),
});

app.mount('#app');
