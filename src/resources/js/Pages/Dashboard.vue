<template>
    <app-layout title="Dashboard">
        <template #header>
            <div class="flex justify-between">
                <a href="/see-tags" class="font-semibold text-xl text-blue-700 leading-tight">
                    Ver todas as tags
                </a>
                <a href="/create-tag" class="font-semibold text-xl text-blue-700 leading-tight">
                    Criar nova tag
                </a>
                <a href="/create-product" class="font-semibold text-xl text-blue-700 leading-tight">
                    Criar novo produto
                </a>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   <products-table />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import ProductsTable from '@/Jetstream/ProductsTable.vue'

    export default defineComponent({
        components: {
            AppLayout,
            ProductsTable,
        },
    })
</script>
