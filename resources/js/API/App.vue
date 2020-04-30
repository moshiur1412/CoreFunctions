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
            
            
            <tr class="text-center">
                <td></td>
                <td colspan="2"><button v-if="nextUrl" @click="loadData(nextUrl)" class="form-control btn btn-outline-secondary"> More data load... </button></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" v-model="title" class="form-control" placeholder="Write your title here.."></td>
                <td>
                    <select v-model="priority" id="select" class="form-control">
                        <option value=""> Low </option>
                        <option value=""> Medium </option>
                        <option value=""> High </option>
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
            title: '',
            priority: ''
           
        }
    },
    
   methods: {
       getTask(){
           window.axios.get('/api/tasks')
           .then(({data}) =>{
                console.log(data);
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
               console.log(data);
               data.data.forEach(task =>{
                   this.task_list.push(task);
               })
                // this.task_list.push(...data.data.task)
            //    console.log(data);
           });
       },

       store(){
           console.log(this.title);
       }
              
           
   },
   created(){
        this.getTask();
    }
    
}
</script>