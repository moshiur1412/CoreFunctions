<template>
    <a title="Click to mark as favorite question (Click again to undo)"
        @click.prevent="toggle" 
        :class="classes"> <i class="fas fa-star fa-2x"></i>
        <span class="favorites-count"> {{ count }} </span>
    </a>

   
</template>
<script>
export default {
    props: ['question'],

    data(){
        return {
            count: this.question.favorites_count,
            isFavorite: this.question.is_favorited,
            id: this.question.id
        }
    },

    computed: {
        classes(){
            return ['favorite', 'mt-2',
            ! this.signedIn ? 'off' : (this.isFavorite > 0 ? 'favorited' : '') 
            ]
        },
        endpoint(){
            return `/questions/${this.id}/favorite`;
        }
    },
    methods: {
        toggle(){
            if(! this.signedIn){
                this.$toast.warning("Please login for the favorite", "warning", {
                    timeout: 3000,
                    position: 'bottomLeft'
                });
                return;
            }
           this.isFavorite ? this.delete() : this.create();
        },
        delete(){
            axios.delete(this.endpoint)
            .then(res =>{
                this.count--;
                this.isFavorite = false;
            });
            
        },
        create() {
            axios.post(this.endpoint)
            .then(res => {
                this.count++;
                this.isFavorite = true;
            });
        }
    }
}
</script>