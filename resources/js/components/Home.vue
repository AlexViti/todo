<template>
    <div class="text-2xl text-gray-800">
        <div v-for="(toDoList, i) in toDoLists" :key="i">
            <h3>{{toDoList.name}}</h3>
        </div>
    </div>
</template>
<script>
export default {
    name: 'Home',
    data() {
        return {
            toDoLists: []
        }
    },
    methods: {
        getTodoLists() {
            axios.get('/api/todo-lists').then(response => {
                this.toDoLists = response.data
            })
        }
    },
    mounted() {
        this.getTodoLists()
    }
}
</script>
