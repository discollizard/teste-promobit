<template>
    <app-layout :title="pageLabel">
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{pageLabel}}
                </h2>
                <a href="/dashboard" class="font-semibold text-xl text-blue-700 leading-tight">
                    Voltar ao dashboard
                </a>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   <tag-form />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import TagForm from '@/Jetstream/TagForm.vue'

    export default defineComponent({
        components: {
            AppLayout,
            TagForm,
        },
        computed: {
            pageLabel(){
                return this.$page.props.hasOwnProperty('tagToEdit') ? 'Edição de tag': 'Criação de tag'
            }
        }
    })
</script>