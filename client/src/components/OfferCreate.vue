<template>
    <div>
        <h1 class="flex flex-row justify-center text-3xl font-bold mt-5" v-if="isEdit==true">
            Update your Offer
        </h1>
        <h1 class="flex flex-row justify-center text-3xl font-bold mt-5" v-if="isEdit==false">
            Insert a new Offer
        </h1>
        <div class="flex ml-10">
            <div class="flex flex-col mt-10">
                <div v-for="field in forms" :key="field.code" class="grid grid-cols-2 gap-1 pt-5">
                    <label>
                        {{field.label}}<span class='font-bold text-red-600' v-if="!newOffer[field.code]">*</span>
                    </label>
                    <div v-if="field.type == 'text'">
                        <input type="text" :placeholder="field.placeholder" :name="field.code" v-model="newOffer[field.code]" />
                    </div>
                    <div v-if="field.type == 'number'">
                        <input type="number" :placeholder="field.placeholder" :name="field.code" v-model="newOffer[field.code]" />
                    </div>
                    <div v-if="field.type == 'select'">
                        <select :name="field.code" v-model="newOffer[field.code]" class="bg-white w-full">
                            <option v-for="opt in field.options" :key="opt.value" :value="opt.value">
                                {{opt.label}}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-row mt-10" v-if="isEdit==false">
                    <button @click="saveOffer(newOffer)" :disabled="!isFormComplete" class="bg-white hover:bg-yellow-200 cursor-pointer px-3 py-2 rounded-md"> Save </button>
                </div>
                <div class="flex flex-row mt-10" v-if="isEdit==true">
                    <button @click="confUpdate()" :disabled="!isFormComplete" class="bg-white hover:bg-yellow-200 cursor-pointer px-3 py-2 rounded-md"> Save Update </button>
                </div>
                <div class="flex mt-5 font-bold" v-if="conf == true">
                    <div class='flex-col bg-white px-2 py-1'>
                        <span class='flex flex-row justify-center'>Are you sure ?</span>
                        <button class='flex flex-row justify-center bg-black text-white px-2 py-1 mt-2' @click='saveOffer()'>UPDATE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return{
            isEdit:false,
            conf:false,
            newOffer:{
                program_language:"",
                icon:"",
                company:"",
                ral:0,
                experience:"",
                location:"",
                description:""
            },
            forms:[
                {
                    code:"program_language",
                    type:"select",
                    label:"Program Language",
                    placeholder:"program language",
                    required:true,
                    options:[
                        {
                            value:"Python",
                            label:"Python"
                        },
                        {
                            value:"Java",
                            label:"Java"
                        },
                        {
                            value:"PHP",
                            label:"PHP"
                        },
                    ]
                },
                {
                    code:"icon",
                    type:"text",
                    label:"Icon's Language",
                    palceholder:"icon's language",
                    required:true
                },
                {
                    code:"company",
                    type:"text",
                    label:"Company",
                    palceholder:"company",
                    required:true
                },
                {
                    code:"ral",
                    type:"number",
                    label:"RAL",
                    palceholder:"ral",
                    required:true
                },
                {
                    code:"experience",
                    type:"select",
                    label:"Experience",
                    placeholder:"experience",
                    required:true,
                    options:[
                        {
                            value:"Junior",
                            label:"Junior"
                        },
                        {
                            value:"Senior",
                            label:"Senior"
                        }
                    ]
                },
                {
                    code:"location",
                    type:"select",
                    label:"Location",
                    placeholder:"location",
                    required:true,
                    options:[
                        {
                            value:"Remota",
                            label:"Remota"
                        },
                        {
                            value:"Presenza",
                            label:"Presenza"
                        }
                    ]
                },
                {
                    code:"description",
                    type:"text",
                    label:"Description",
                    palceholder:"description",
                    required:true
                }
            ]
        }
    },
    async mounted(){
        if(this.$route.name == "update_offer"){
            this.isEdit = true;
            let id = this.$route.params.id;
            let response = await axios.get("http://localhost:8000/api/detail/"+id);
            this.newOffer = response.data;
        }
    },
    methods:{
        async saveOffer(){
            let response;
            let id;
            if(this.isEdit == true){
                id = this.$route.params.id;
                response = await axios.put("http://localhost:8000/api/update/"+id,this.newOffer);
                this.newOffer = response.data;
                this.$router.push({
                    name:"list_offers"
                });
            }else{
                response = await axios.post("http://localhost:8000/api/insert",this.newOffer);
                this.newOffer = response.data;
                this.$router.push({
                    name:"list_offers"
                });
            }
        },
        confUpdate(){
            this.conf = true;
        }
    },
    computed:{
        isFormComplete(){
            let form = true;
            this.forms.forEach(field =>{
                if(field.required){
                    form = form && !!this.newOffer[field.code];
                }
            });
            return form;
        }
    }
}
</script>