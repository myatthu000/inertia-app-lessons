<template>
    <div>
        <nav class="ml-6">
            <ul class="flex space-x-4">
                <li>
                    <NavLink href="/" :active="$page.component === 'Welcome'">Home</NavLink>
                </li>
                <li>
                    <NavLink href="/users" :active="$page.component === 'Users' ">Users</NavLink>
                </li>
                <li>
                    <NavLink href="/settings" :active="$page.component === 'Settings' ">Settings</NavLink>
                </li>
                <li>
                    <NavLink href="/logout" method="post" :data="{'foo':'bar'}" as="button" class="text-blue-500 hover:underline" >Logout</NavLink>
                </li>
            </ul>
        </nav>
    </div>
</template>
<script>
    import { Link } from '@inertiajs/inertia-vue3';
    import NavLink from './NavLink.vue';
    export default {
        components: {
            Link, NavLink
        }
    }
</script>

<style scoped>

</style>
