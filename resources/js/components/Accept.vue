<template>
    <div>
        <a v-if="isBest == false" @click="acceptedAnswer "
            title="Mark this as a best answer">
            <i class="fas fa-check fa-2x"></i>
        </a>
        <a v-if="isBest == true" title="This is the best answer" :class="classes"> <i class="fas fa-check fa-2x"></i> </a>

    </div>
</template>

<script>
export default {
    props: ['answer'],
    
    data(){
        return {
            status: this.answer.status,
            isBest: this.answer.is_best,
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
    },
    methods: {
        acceptedAnswer(){
            axios.post(this.endpoint)
            .then(res => {
                this.$toast.success("Answer has been accepted", "sussess", {
                    timeout:3000,
                    position: "bottomLeft"
                })
            });
        }
    }
}
</script>