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
                                    <input type="text" v-model="tagName" id="product_name">
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
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'

    export default defineComponent({
        components: {
            JetApplicationLogo,
        },
        data(){
            return{
                tagName: '',
            }
        },
        created(){
            if(this.$page.props.hasOwnProperty('tagToEdit')){
                this.tagName = this.$page.props.tagToEdit.name
            }
        },
        methods: {
            registerProduct(){
                let url = '/save-tag'
                let payload = reactive({
                    name: this.tagName,
                })

                if(this.$page.props.hasOwnProperty('tagToEdit')){
                    url = '/update-tag'
                    payload = {...payload, id: this.$page.props.tagToEdit.id}
                }

                Inertia.post(url, payload)
            }
        },
        computed:{
            buttonLabel(){
                return this.$page.props.hasOwnProperty('tagToEdit') ? 'Editar' : 'Cadastrar'
            },
            
        }
    })
</script>
<style src="@vueform/multiselect/themes/default.css"></style>