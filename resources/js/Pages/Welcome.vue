<template>
    <Head title="Home" />

    <div>
        <h2>Hello, {{ name }}</h2>
    </div>
</template>

<script>
    import Layout from "../Shared/Layout";
    import { Head } from  "@inertiajs/inertia-vue3";
    export default {
        components: {
            Head
        },
        layout: Layout,
        props: {
            name: String,
            frameworks: Array,
        },
    }
</script>

<style scoped>

</style>
