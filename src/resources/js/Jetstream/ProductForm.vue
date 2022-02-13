<template>
    <div>
        <div class="p-4 flex justify-start sm:px-20 bg-white border-b border-gray-200">
            <div>
                <jet-application-logo class="block h-12 w-auto" />
            </div>
        </div>
        
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden flex justify-around border-b border-gray-200 py-6 px-4 sm:rounded-lg">
                            <main>
                                <div class="mb-6">
                                    <span class="text-red-700" v-if="this.$page.props.errors.name">{{this.$page.props.errors.name}}</span><br>
                                    <label for="product_name">Nome: </label><br>
                                    <input type="text" v-model="productName" id="product_name">
                                </div>
                                <div class="mb-6">
                                    <span class="text-red-700" v-if="this.$page.props.errors.tags">{{this.$page.props.errors.tags}}</span><br>
                                    <label for="tags">Tags: </label><br>
                                    <Multiselect v-model="tagsToRegister" :options="options" mode="multiple" ></Multiselect>
                                </div>
                                <div class="flex justify-center">
                                    <button @click="registerProduct()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        {{buttonLabel}}
                                    </button>
                                </div>
                            </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent, reactive } from 'vue'
    import { Inertia } from '@inertiajs/inertia'
    import Multiselect from '@vueform/multiselect'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'

    export default defineComponent({
        components: {
            JetApplicationLogo,
            Multiselect,
        },
        data(){
            return{
                options: this.$page.props.tags,
                tagsToRegister: [],
                productName: '',
            }
        },
        created(){
            if(this.$page.props.hasOwnProperty('productToEdit')){
                this.productName = this.$page.props.productToEdit.name
                this.tagsToRegister = this.$page.props.productToEdit.tags
            }
        },
        methods: {
            registerProduct(){
                let url = '/save-product'
                let payload = reactive({
                    name: this.productName,
                    tags: this.tagsToRegister
                })

                if(this.$page.props.hasOwnProperty('productToEdit')){
                    url = '/update-product'
                    payload = {...payload, id: this.$page.props.productToEdit.id}
                }

                Inertia.post(url, payload)
            }
        },
        computed:{
            buttonLabel(){
                return this.$page.props.hasOwnProperty('productToEdit') ? 'Editar' : 'Cadastrar'
            },
            
        }
    })
</script>
<style src="@vueform/multiselect/themes/default.css"></style>