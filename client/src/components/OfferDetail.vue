<template>
    <div>
        <h1 class="flex flex-row justify-center text-3xl font-bold mt-5">
            Detail of the Offer
        </h1>
        <div class="flex ml-10 mt-10">
            <button @click="$router.go(-1)" class="bg-white px-3 py-1 rounded-md">Back</button>
        </div>
        <div class="flex ml-10 mt-5">
            <div class="flex flex-col">
                <img :src="offer.icon" class="w-44 h-44 cursor-pointer">
            </div>
            <div class="flex flex-col ml-5 m-auto">
                <div class="flex flex-row">
                    Language:&nbsp; <span class="font-bold">{{offer.program_language}}</span>
                </div>
                <div class="flex flex-row pt-1">
                    Company:&nbsp; <span class="font-bold">{{offer.company}}</span>
                </div>
                <div class="flex flex-row pt-1">
                    RAL:&nbsp; <span class="font-bold">{{offer.ral}} €</span>
                </div>
                <div class="flex flex-row pt-1">
                    Experience:&nbsp; <span class="font-bold">{{offer.experience}}</span>
                </div>
                <div class="flex flex-row pt-1">
                    Location:&nbsp; <span class="font-bold">{{offer.location}}</span>
                </div>
                <div class="flex flex-row pt-1">
                    Description:&nbsp; <span class="font-bold">{{offer.description}}</span>
                </div>
            </div>
        </div>
        <div class="flex ml-10 mt-5 text-white font-bold">
            <button class="bg-blue-600 hover:bg-blue-400 px-2 py-1 rounded-md mr-3" @click="goToUpdate()">Update</button>
            <button class="bg-red-600 hover:bg-red-400 px-2 py-1 rounded-md" @click="confDelete()">Delete</button>
        </div>
        <div class="flex ml-10 mt-5 font-bold" v-if="conf == true">
            <div class='flex-col bg-white px-2 py-1'>
                <span class='flex flex-row justify-center'>Are you sure ?</span>
                <button class='flex flex-row justify-center bg-black text-white px-2 py-1 mt-2' @click='cancella()'>DELETE</button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios"
export default {
    data(){
        return{
            offer:null,
            id:null,
            conf:false
        }
    },
    async mounted(){
        this.reload();
    },
    methods:{
        async reload(){
            this.id = this.$route.params.id;
            let response = await axios.get("http://localhost:8000/api/detail/"+this.id);
            this.offer = response.data;
        },
        confDelete(){
            this.conf = true;
        },
        async cancella(){
            this.id = this.$route.params.id;
            await axios.delete('http://localhost:8000/api/delete/'+this.id);
            this.$router.push({
                name:"list_offers",
            });
            this.reload();
        },
        goToUpdate(){
            this.id = this.$route.params.id;
            this.$router.push({
                name:"update_offer",
                params:{
                    id: this.id
                }
            });
        }
    }
}
</script>