<template>
     <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <form class="card-body" v-if="editing" @submit.prevent="update">
                    <div class="card-title">
                        <input type="text" class="form-control form-control-lg" v-model="title">
                    </div>
                    <hr>
                    <div class="media">
                       <div class="media-body">
                             <div class="form-group">
                                <textarea v-model="body" rows="10" class="form-control"></textarea>
                            </div>
                            <button class="btn btn-primary" :disabled="isInvalid"> Update </button>
                            <button class="btn btn-outline-secondary" @click="cancel" type="button"> Cancel </button>
                        </div> <!--/* end media-body class -->
                    </div> <!--\* end media class -->
                </form><!--\* end card-body for editing class -->
                
                <div class="card-body" v-else>
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1> {{ title }}</h1>
                            <div class="ml-auto">
                                <a href="/questions" class="btn btn-outline-secondary"> Back to All Questions </a>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="media">
                        <div class="d-fex flex-column vote-controls">    
                           <vote :model="question" :name="'question'"></vote>                           
                        </div>

                        <div class="media-body">
                            <div v-html="bodyHtml"></div>
                            <div class="row">
                                <div class="col-4">
                                <a v-if="authorize('modify', question)" @click.prevent="edit" class="btn btn-outline-secondary mr-2" >Edit</a>
                                <button v-if="authorize('deleteQuestion', question)" class="btn btn-outline-danger" type="submit" @click="destroy"> Delete </button>

                                </div>
                                <div class="col-4"></div>
                                <div class="col-4">
                                    <user-info :model="question" label="Asked"></user-info>
                                </div>
                            </div>
                        </div> <!--/* end media-body class -->
                    </div> <!--\* end media class -->
                </div><!--\* end card-body class -->
            </div><!--\* end card class -->
        </div><!--\* end col-md -->
    </div><!--\* end row class -->
</template>

<script>

import Vote from './Vote.vue';
import UserInfo from './UserInfo.vue';
import modification from '../mixins/modification';

export default {
    components: {
        Vote, UserInfo
    },
    mixins: [modification],

    props: ['question'],
    data(){
        return{
            title: this.question.title,
            body: this.question.body,
            bodyHtml: this.question.body_html,
            id: this.question.id,
            beforeEditCache: {}
        }
    },

    computed: {
        isInvalid(){
            return this.body.length < 10 || this.title.length < 10;
        },
        endpoint(){
            return `/questions/${this.id}`;
        }
    },

    methods:{
        setEditCache(){
            this.beforeEditCache = {
                body: this.body,
                title: this.title
            };
        },

        restoreFromCache(){
            this.body = this.beforeEditCache.body;
            this.title = this.beforeEditCache.title;
        },
        payload() {
            return {
                body: this.body,
                title: this.title
            }  
        },
        delete(){
            axios.delete(this.endpoint)
            .then(({data}) => {
                this.$toast.success(data.message, 'success', {timeout:2000});
            });

            setTimeout(() =>{
                window.location.href= "/questions";
            }, 3000);
        }
    }
    
}
</script>