<template>
        <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2> Answer The Question</h2>
                </div>

                <div class="card-body">
                    <form>
                        
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
    data(){
        return {
            body: ''
        }
    },
    computed: {
        isInvalid (){
            return !this.signedIn || this.body.length < 10;
        }
    }
}
</script>