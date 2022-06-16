<template>
    <ul class="p-2">
        <to-do v-for="(todo, i) in toDoList.todos" :key="i" :todo="todo" />
        <button v-if="!addTodo" @click="addTodo = true" class="rounded bg-blue-600 text-white">New Task</button>
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
