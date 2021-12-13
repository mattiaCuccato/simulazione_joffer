<template>
    <div>
        <h1 class="flex flex-row justify-center text-3xl font-bold mt-5">
            List of Offers
        </h1>
        <div class="flex ml-10 mt-10" v-for="(offer, index) in offers" :key="index">
            <div class="flex flex-col">
                <img :src="offer.icon" class="w-20 h-20 cursor-pointer" @click='detailOffer(offer)'>
            </div>
            <div class="flex flex-col ml-5">
                <div class="flex flex-row">
                    Language:&nbsp; <span class="font-bold">{{offer.program_language}}</span>
                </div>
                <div class="flex flex-row">
                    Company:&nbsp; <span class="font-bold">{{offer.company}}</span>
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
            offers:[]
        }
    },
    async mounted(){
        this.reload();
    },
    methods:{
        async reload(){
            let response = await axios.get("http://localhost:8000/api/list",this.offers);
            this.offers = response.data;
        },
        detailOffer(offer){
            this.$router.push('/detail/'+offer.id)
        },
    }
}
</script>