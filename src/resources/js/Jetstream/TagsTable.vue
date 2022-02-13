<template>
    <div>
        <div class="p-4 flex justify-between sm:px-20 bg-white border-b border-gray-200">
            <div class="text-xl pt-2">
                <span>Todas as tags</span>
            </div>
        </div>

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tag</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Opções</th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="tag in $page.props.allTags" :key="tag.id">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{tag.name}}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                             <a :href="`/edit-tag/${tag.id}`" class="hover:text-blue-700">Editar</a> 
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a :href="`/delete-tag/${tag.id}`" class="text-red-600 hover:text-red-900">Deletar</a>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'

    export default defineComponent({
        components: {
            JetApplicationLogo,
        },
    })
</script>
