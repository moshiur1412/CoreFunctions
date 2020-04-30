<template>
    <table class="table">
        <thead>
            <th scope="col"> ID </th>
            <th scope="col"> Title </th>
            <th scope="col"> Priority </th>
            <th scope="col"> Actions </th>
        </thead>
        <tbody>

            <task-component v-for="task in task_list" :key="task.id" :task="task" @delete="remove" @edit="updated"></task-component>
            
            <tr class="text-center">
                <td></td>
                <td colspan="2"><button v-if="nextUrl" @click="loadData(nextUrl)" class="form-control btn btn-outline-secondary"> More data load... </button></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" v-model="task.title" class="form-control" placeholder="Write your title here.."></td>
                <td>
                    <select v-model="task.priority" class="form-control">
                        <option> Low </option>
                        <option> Medium </option>
                        <option> High </option>
                    </select>
                </td>
                <td> <button @click="store" class=" form-control btn btn-outline-primary"> Submit </button></td>
            </tr>
        </tbody>
    </table>


</template>
<script>

import TaskComponent from './Task.vue';

export default {
    components: {
        TaskComponent
    },
    data(){
        return {
            task_list: [],
            nextUrl: null,
            task: {  title: '', priority: ''}
           
        }
    },
    
   methods: {
       getTask(){
           window.axios.get('/api/tasks')
           .then(({data}) =>{
                this.nextUrl = data.next_page_url;
                data.data.forEach(task => {
                   this.task_list.push(task)
                  
                });
           });
       },


       loadData(nextUrl){
           window.axios.get(this.nextUrl)
           .then(({data}) =>{
               this.nextUrl = data.next_page_url;
               data.data.forEach(task =>{
                   this.task_list.push(task);
               })
           });
       },

       store(){
           if(this.checkEmptyTask){
               this.$toast.warning("Please input the task title", "warning");
               return;
           }
           axios.post(`/api/tasks`, this.task)
           .then(res=>{
               this.$toast.success(res.data.message, 'success', {timeout:3000});
               this.task_list.push(res.data.task);
               this.task = '';
           });
        
       },
       remove(id){
            window.axios.delete(`/api/tasks/${id}`)
            .catch(err=>{
                console.log(err.response);
                this.$toast.error(err.response.status  + "\t"+ err.response.statusText, "Error");
            })
            .then(res=>{
                this.$toast.success(res.data.message, "Success");
                let index = this.task_list.findIndex(task=> task.id === id);
                this.task_list.splice(index, 1);

            });
       }
              
           
   },
   created(){
        this.getTask();
    },
    computed: {
        checkEmptyTask(){
            return !this.task.title || !this.task.priority;
        }
    }
    
}
</script>