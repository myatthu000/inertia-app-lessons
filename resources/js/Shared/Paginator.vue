<template>
    <div>
        <Component :is="link.url ? 'Link':'span' "
                   v-for="link in links"
                   class="p-2 border"
                   :class="{'bg-blue-600': link.active, 'text-gray-300': !link.url }"
                   :href="link.url"
                   v-html="link.label" />
    </div>

</template>

<script>
    export default {
        props: {
            links: Array,
        },
    }
</script>

<style scoped>

</style>
