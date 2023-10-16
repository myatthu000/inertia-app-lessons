<template>
    <Head title="My App"></Head>
    <section class="bg-gray-200 p-6">
        <header class="flex justify-between">
            <div class="">
                <h1 class="font-bold text-lg">My App </h1>
                <span>Welcome back, {{ username }}</span>
            </div>
            <Nav />
        </header>
    </section>
    <section class="">
        <div class="max-w-3xl mx-auto">
            <slot />
        </div>
    </section>
</template>

<script>
    import NavLink from "./NavLink";
    import Nav from "./Nav";
    export default {
        components: {NavLink, Nav},
        computed: {
            username(){
                return this.$page.props.auth.user.username;
            }
        }
    }
</script>

<style scoped>

</style>
