<template>
    <app-layout title="Dashboard">
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Criação de produtos
                </h2>
                <a href="/dashboard" class="font-semibold text-xl text-blue-700 leading-tight">
                    Voltar ao dashboard
                </a>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   <product-form />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import ProductForm from '@/Jetstream/ProductForm.vue'

    export default defineComponent({
        components: {
            AppLayout,
            ProductForm,
        },
    })
</script>

