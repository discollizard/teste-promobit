<template>
    <Link :href="'/'">
        <img src="img/promobit.jfif" width="100" height="100" alt="Logo promobit">
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>
