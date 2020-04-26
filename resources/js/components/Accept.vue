<template>
    <div>
        @can('accept', $answer)
        <a onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $answer->id }}').submit()" 
            title="Mark this as a best answer" class="{{ $answer->status }} mt-4">
            <i class="fas fa-check fa-2x"></i>
        </a>
        @else
            @if($answer->is_best)
            <a title="This is the best answer" class="{{ $answer->status }} mt-4"> <i class="fas fa-check fa-2x"></i> </a>
            @endif
        @endcan
    </div>
</template>
<script>
export default {
    props: ['answer'],
    data(){
        return {
            status: this.answer.status,
            accepted: this.answer.is_best,
            canAccept: true,
            id: this.answer.id

        }
    },
    computed: {
        endpoint: `answers/${this.id}/accept `
    }
}
</script>