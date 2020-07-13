<template>
        <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2> Answer The Question</h2>
                </div>

                <div class="card-body">
                    <form @submit.prevent="create">
                        
                        <div class="form-group">
                            <label for="body">Your Answer:</label>
                            <textarea name="body" id="body" cols="30" rows="10" v-model="body" class="form-control"> </textarea>
                          
                        </div>

                        <div class="form-group">
                            <button type="submit" :disabled="isInvalid" class="btn btn-outline-secondary">Submit </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['questionId'],
    data(){
        return {
            body: ''
        }
    },
    computed: {
        isInvalid (){
            return !this.signedIn || this.body.length < 10;
        }
    },
    methods:{
        create(){
            axios.post(`/questions/${this.questionId}/answers`, {
                body: this.body
            })
            .catch(err => {
                this.$toast.error(err.data.message, "Error");
            })
            .then(({data}) =>{
                this.$toast.success(data.message, "success");
                this.body = '';
                this.$emit('created', data.answer);
            })
        }
    }
}
</script>