<template>
    <p>
        {{DPost}}
    </p>
</template>

<script>
export default {
    data(){
        return{
            DPost:[]
        }
    },created(){
       this.getPost()
    },methods: {
       getPost(){
           axios.get('/api/posts/'+this.$route.params.id)
           .then(res=>{
               this. DPost=res.data
           })
           .catch(err=>{
               console.error(err);
           })
       }//end of getPost
    }
}
</script>
