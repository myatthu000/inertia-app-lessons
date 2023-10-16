import Layout from "./Shared/Layout";

require('./bootstrap');
import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'


createInertiaApp({
    resolve: async name => {
        let page = (await import(`./Pages/${name}`)).default;

        // if(! page.layout){
        //     page.layout = Layout;
        // }

        if(page.layout === undefined){
            page.layout = Layout;
        }

        // page.layout ??= Layout;

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("Head",Head)
            .component("Link",Link)
            // .component("Layout", Layout)
            .mount(el)
    },

    title: (title) => `My App | ${title}`,
})

InertiaProgress.init({
    color: 'red',
})
