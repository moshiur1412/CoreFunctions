<template>
    <table class="table">
        <thead>
            <th scope="col"> ID </th>
            <th scope="col"> Title </th>
            <th scope="col"> Priority </th>
            <th scope="col"> Actions </th>
        </thead>
        <tbody>
            <tr v-for="task in task_list" :key="task.id">
                <th scope="row"> {{ task.id }} </th>
                <th> {{ task.title }} </th>
                <th> {{ task.priority }} </th>
                <th> Edit | Remove </th>
            </tr>
        </tbody>
    </table>


</template>
<script>
export default {
    props: ['tasks'],
    data(){
        return {
            id: this.tasks.data.id,
            task_list: this.tasks.data,
            title: this.task
        }
    },
    computed: {
        titlem(){
            return 
                this.tasks.id;
        }
    }
    
}
</script>