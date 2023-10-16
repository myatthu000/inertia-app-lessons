<template>
    <Head title="Users" />
    <div>
<!--        <h3>Users</h3>-->
<!--        <p>The current time is {{ time }} </p>-->
<!--        <Link href="/users" class="text-blue-500" preserve-scroll>refresh</Link>-->
        <div class="flex justify-between items-center">
            <NavLink v-if="can.createUser" class="" href="/users/create" :active="$page.component === 'Settings' ">Create</NavLink>

            <input type="search"
                   class="my-3 border p-2 rounded-md"
                   placeholder="Search ..."
                   v-model="search"
            >
        </div>
        <div class="">
            <table class="min-w-full">
                <tbody class="bg-white">
                <tr v-for="user in users.data" :key="user.id">
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                        <div class="text-sm leading-5 text-blue-900">{{ user.name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                        <Link v-if="user.can.edit" :href="`/users/${user.id}/edit`" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">
                            Edit
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
<!--        paginator -->
        <div class="mt-6">
            <Paginator :links="users.links"></Paginator>
        </div>
    </div>
</template>

<script>
    import NavLink from "../../Shared/NavLink";
    import Layout from "../../Shared/Layout";
    import Paginator from "../../Shared/Paginator";
    import { Inertia } from "@inertiajs/inertia";
    import throttle from "lodash/throttle";
    import debounce from "lodash/debounce";

    export default {
        layout: Layout,
        data() {
            return {
                search: this.filters.search
            }
        },
        components: {
            Paginator, NavLink
        },
        props: {
            filters: Object,
            users: Object,
            time: String,
            can: Object,
        },
        watch: {
            search(newSearch,oldSearch) {
                this.throttleFetch(newSearch, oldSearch);
            },
        },
        created() {
            this.throttleFetch = debounce((newSearch,oldSearch) => {
                // console.log('throttle');
                Inertia.get('/users', {search: newSearch}, {
                    preserveState: true,
                    replace: true,
                })
                // console.log('new Search, value: ',newSearch)
            },300);
        }
    }
</script>

<style scoped>

</style>
