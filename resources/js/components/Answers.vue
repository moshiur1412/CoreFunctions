<template>
    <div>
        <div class="row mt-5" v-cloak v-if="count">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mt-2">
                            <h2> {{ title }}</h2>
                        </div>
                    </div>
                    
                     <answer v-for="answer in answers" :answer="answer" :key="answer.id"></answer>
                  
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import Answer from './Answer';

export default {
    props: ['answers', 'count'],
   
    computed: {
        title(){
            return this.count + " " + (this.count > 1 ? "Answers" : "Answer");
        }
    },
    components:{
        Answer
    }
}
</script>