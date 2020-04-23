<template>
    <a title="Click to mark as favorite question (Click again to undo)" 
        :class="classes"> <i class="fas fa-star fa-2x"></i>
        <span class="favorites-count"> {{ count }} </span>
    </a>

   
</template>
<script>
export default {
    props: ['question'],

    data(){
        return {
            count: this.question.favorite_count,
            isFavorite: this.question.is_favorited,
            signedIn: false
        }
    },

    computed: {
        classes(){
            return ['favorite', 'mt-2',
            ! this.signedIn ? 'off' : (this.isFavorite ? 'favorited' : '') 
            ]
        }
    }
}
</script>