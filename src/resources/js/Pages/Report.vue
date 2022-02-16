<template>
    <app-layout title="Relatório de relevância dos produtos">
        <template #header>
            <div class="flex justify-between">
                <a href="/dashboard" class="font-semibold text-xl text-blue-700 leading-tight">
                    Voltar ao dashboard
                </a>
            </div>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   <report-table />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import ReportTable from '@/Jetstream/ReportTable.vue'

    export default defineComponent({
        components: {
            AppLayout,
            ReportTable,
        },
    })
</script>
