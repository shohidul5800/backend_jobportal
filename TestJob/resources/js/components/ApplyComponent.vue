<template>
    <div>
        <form @submit="DataSubmit">
            <button v-if="show" type="submit" class="btn btn-success btn-block">Apply</button>
            <div v-else class="alert alert-success">
                Apply Successfully
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props:['jobId'],
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                'show': true
            }
        },
        methods:{
            DataSubmit(e){
                e.preventDefault();
                axios.post('/application/'+this.jobId,{

                }).then((response)=>{
                    this.show=false
                })
            }
        }
    }
</script>
