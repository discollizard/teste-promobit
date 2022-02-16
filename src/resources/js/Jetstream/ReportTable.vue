<template>
    <div>
        <div class="p-4 flex justify-between sm:px-20 bg-white border-b border-gray-200">
            <div class="text-xl pt-2">
                <span>Relatório de relevância dos produtos</span>
            </div>
        </div>

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produto</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Relevância (quantidade de tags)</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="(product, index) in $page.props.relevanceData" :key="index">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{product.product_name}}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap flex flex-wrap grow justify-between">
                                <span>{{product.relevance}}</span>
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
