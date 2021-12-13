<template>
    <div class="flex flex-row py-5 pl-5 bg-yellow-500">
        <div class="flex flex-col ml-5">
            <span class="font-bold text-red-800 text-xl m-auto mr-10"> JOFFER </span>
        </div>
        <div v-for='link in Links' :key='link.code' 
            @click='goTo(link)' class='flex-col mr-8 cursor-pointer px-3 py-2 bg-blue-200 rounded-md font-bold'>
            {{ link.label }}
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            Links:[
                {
                    code:"list_offers",
                    label:"List"
                },
                {
                    code:"insert_offer",
                    label:"Create"
                }
            ]
        }
    },
    methods:{
        goTo(link){
            this.$router.push({
                name:link.code
            })
        }
    }
}
</script>