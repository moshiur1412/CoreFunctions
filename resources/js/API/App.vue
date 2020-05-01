<template>
    <table class="table table-bordered">
        <thead>
            <th scope="col"> ID </th>
            <th scope="col"> Title </th>
            <th scope="col"> Priority </th>
            <th scope="col"> Actions </th>
        </thead>
        <tbody>

            <task-component v-for="task in task_list" :key="task.id" :task="task" @delete="remove" @edit="update"></task-component>

          
            <!-- Spinner loading  -->
            <tr v-if="isLoading">
                <td colspan="4"> 
                    <div class="d-flex justify-content-center">
                        <Stretch></Stretch>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4"><button v-if="nextUrl" @click="loadData(nextUrl)" class="form-control btn btn-outline-secondary"> More data load... </button></td>
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

import {Stretch} from 'vue-loading-spinner';

export default {
    components: {
        TaskComponent, Stretch
    },
    data(){
        return {
            task_list: [],
            nextUrl: null,
            task: {  title: '', priority: ''},
            isLoading: false
           
        }
    },
    
   methods: {
       getTask(){
           axios.get('/api/tasks')
           .then(({data}) =>{
                this.nextUrl = data.next_page_url;
                data.data.forEach(task => {
                   this.task_list.push(task)
                  
                });
           });
       },


       loadData(nextUrl){
           this.isLoading = true;
           window.axios.get(this.nextUrl)
           .then(({data}) =>{
               this.nextUrl = data.next_page_url;
               data.data.forEach(task =>{
                   this.task_list.push(task);
                   this.isLoading =false;
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
       update(id){
           let index = this.task_list.findIndex($editIndex=> task.id === id);
            console.log(this.task_list.splice(index, 1));
            // console.log(id);

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