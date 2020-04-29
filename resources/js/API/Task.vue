<template>
    <table class="table">
        <thead>
            <th scope="col"> ID </th>
            <th scope="col"> Title </th>
            <th scope="col"> Priority </th>
            <th scope="col"> Actions </th>
        </thead>
        <tbody>
            <tr>
                <th scope="row"> 1 </th>
                <th> your title </th>
                <th> lopw </th>
                <th> Edit | Remove </th>
            </tr>
        </tbody>
    </table>
</template>
<script>
export default {
    props: ['tasks'],
    
    
}
</script>