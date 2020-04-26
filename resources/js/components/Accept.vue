<template>
    <div>

        <a v-if="canAccept ==true" 
            title="Mark this as a best answer" :class="{ classes }">
            <i class="fas fa-check fa-2x"></i>
        </a>
        <a v-if="canAccept == false" title="This is the best answer" :class="{classes }"> <i class="fas fa-check fa-2x"></i> </a>

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
        endpoint(){
            return `answers/${this.id}/accept`;
        },
        classes(){
            return [
                this.status, 'mt-4'
            ]
        }
    }
}
</script>