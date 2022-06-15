<template>
    <div class="text-gray-800 bg-blue-800">
        <to-do-list v-for="(toDoList, i) in toDoLists" :key="i" :toDoList="toDoList" @refresh="getTodoLists" />
        <router-link to="/add-list">Add list</router-link>
    </div>
</template>
<script>
import ToDoList from './ToDoList.vue';

export default {
  components: { ToDoList },
    name: 'Home',
    data() {
        return {
            toDoLists: [],
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
