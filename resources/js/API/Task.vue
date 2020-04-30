<template>
    <tr>
        <th scope="row"> {{ task.id }} </th>
        <th> {{ task.title }} </th>
        <th> {{ task.priority }} </th>
        <th> Edit | Remove </th>
    </tr>
</template>
<script>


export default {
    props: ['task'],
    
}
</script>