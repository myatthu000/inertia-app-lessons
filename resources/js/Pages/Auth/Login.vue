<template>
    <Header title="Login"></Header>
    <h1 class="text-3xl">Login</h1>
    <div>
        <form @submit.prevent="login" action="" method="POST" class="max-w-md mx-auto mt-6">
            <div class="mb-6">
                <label for="email">Email</label>
                <input type="email"
                       name="email"
                       id="email"
                       class="border border-gray-400 p-2 w-full"
                       v-model="form.email">
                <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
            </div>

            <div class="mb-6">
                <label for="password">Password</label>
                <input type="password"
                       name="password"
                       id="password"
                       class="border border-gray-400 p-2 w-full"
                       v-model="form.password">
                <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>

            </div>
            <div class="mb-6">
                <button class="p-2 rounded-md bg-blue-600 text-white"
                        :class="{'bg-blue-300' : processing}"
                        type="submit"
                        :disabled="form.processing"
                >Submit</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        layout: null,
    }
</script>

<script setup>
    import { reactive, ref } from  'vue';
    import {Inertia} from '@inertiajs/inertia';
    import { useForm } from '@inertiajs/inertia-vue3';


    defineProps({
        errors: Object,
    });

    let form = useForm({
        name: '',
        email: '',
        password: '',
    });

    // let processing = ref(false);

    let login = () => {
        form.post('/login/store')
    }

</script>

<style scoped>

</style>
