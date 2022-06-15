<template>
    <ul class="bg-blue-400">
        <to-do v-for="(todo, i) in toDoList.todos" :key="i" :todo="todo" />
        <button v-if="!addTodo" @click="addTodo = true" class="bg-blue-600 text-white">Add todo</button>
        <add-todo v-if="addTodo" @added="addedToDo" :toDoList="toDoList" />
    </ul>
</template>

<script>
import AddTodo from './AddTodo.vue'
import ToDo from './ToDo.vue'
export default {
    name: 'Todos',
    components: { ToDo, AddTodo },
    data() {
        return {
            addTodo: false
        }
    },
    props: {
        toDoList: {
            type: Object,
            required: true
        }
    },
    methods: {
        addedToDo() {
            this.addTodo = false
            this.$emit('added')
        }
    }
}
</script>

<style>

</style>
