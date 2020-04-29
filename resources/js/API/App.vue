<template>
    <table class="table">
        <thead>
            <th scope="col"> ID </th>
            <th scope="col"> Title </th>
            <th scope="col"> Priority </th>
            <th scope="col"> Actions </th>
        </thead>
        <tbody>
            <task-component v-for="task in task_list" :key="task.id" :task="task"></task-component>
            <tr>
                <td colspan="2"><input type="text" class="form-control" placeholder="Write your title here.."></td>
                <td>
                    <select name="priority" id="select" class="form-control">
                        <option value=""> Low </option>
                        <option value=""> Medium </option>
                        <option value=""> High </option>
                    </select>
                </td>
                <td> <button class=" form-control btn btn-outline-secondary"> Submit </button></td>
            </tr>
        </tbody>
    </table>


</template>
<script>

import TaskComponent from './Task';

export default {
    // props: ['tasks'],
    components: {
        TaskComponent
    },
    data(){
        return {
            // task_list: this.tasks.data,
            task_list: []
           
        }
    },
    
   methods: {
       getTask(){
           window.axios.get('/api/task_list')
           .then(({data}) =>{
               data.forEach(task => {
                   this.task_list.push(task)
               });
            //    console.log(data);
           });
       }
   },
   created(){
        this.getTask();
    }
    
}
</script>