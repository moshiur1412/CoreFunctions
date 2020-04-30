<template>
    <tr>
        <th scope="row"> {{ task.id }} </th>
        <th> {{ task.title }} </th>
        <th> {{ task.priority }} </th>
        <th> 
            <button @click="show"> <i class="fas fa-eye"></i>  </button>
            <button @click="edit"> <i class="fas fa-edit "></i>  </button>
            <button @click="remove"> <i class="fas fa-trash-alt"></i>  </button>
        </th>
    </tr>
</template>
<script>


export default {
    props: ['task'],
    methods:{
        show(){
            this.$emit('Show', this.task.id);
            console.log(this.task.id);
        },
        edit(){
            this.$emit("Edit", this.task.id);
            console.log(this.task.id);
        },
        remove(){
            this.$emit('Delete');
        }
    }
    
}
</script>