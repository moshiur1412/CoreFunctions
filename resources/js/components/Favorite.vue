<template>
    <a onclick="event.preventDefault(); document.getElementById('favorite-form-{{$question->id}}').submit();" title="Click to mark as favorite question (Click again to undo)" 
        class="favorite mt-2 {{$question->isFavorite() > 0 ? 'favorited' : 'off'  }}">  <i class="fas fa-star fa-2x"></i>
        <span class="favorites-count"> {{ $question->favorite_count }} </span>
    </a>

   
</template>
<script>
export default {
    props: ['questions'],

    data(){
        return {
            count: this.question.favorite_count,
            

        }
    }
}
</script>