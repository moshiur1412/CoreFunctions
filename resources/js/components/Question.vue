<template>
     <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
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
                                <div class="col-4"></div>
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
export default {
    props: ['question'],
    data(){
        return{
            title: this.question.title,
            body: this.question.body,
            bodyHtml: this.question.body_html
        }
    }
}
</script>