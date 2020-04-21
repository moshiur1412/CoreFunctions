
<script>
export default {
    props: ['answer'],

    data(){
        return {
            editing: false,
            body: this.answer.body,
            bodyHtml: this.answer.body_html,
            id: this.answer.id,
            questionId: this.answer.question_id
        }
    },

    methods: {
        update(){
            axios.patch(route('questions.answers.edit', [$this.id, $this.questionId]), {
                body: this.body

            })
            .then(res => {
                console.log(res);
                this.editing = false;
            })
            .catch(err =>{
                console.log("Somethings wrong!");
            });
        }
    }
}
</script>