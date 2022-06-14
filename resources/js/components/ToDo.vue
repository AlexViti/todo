<template>
    <li @contextmenu.prevent="deleteMenu = true">
        <div class="flex items-center">
            <h4 class="text-2xl" >{{todo.title}}</h4>
            <p class="ml-2 description">{{todo.description}}</p>
            <button class="ml-auto" @click="toggleTodo()">{{todo.completed ? '✓' : '✗'}}</button>
        </div>
        <button v-show="deleteMenu" class="fixed bg-red-600 text-white" @click="deleteTodo()">Delete</button>
    </li>
</template>

<script>
export default {
    name: 'ToDo',
    data() {
        return {
            deleteMenu: false
        }
    },
    props: {
        todo: {
            type: Object,
            required: true
        }
    },
    methods: {
        toggleTodo() {
            this.todo.completed = !this.todo.completed
            axios.put(`/api/todo-lists/${this.todo['todo_list_id']}/todos/${this.todo.id}`, {
                completed: this.todo.completed
            }).then(() => {
                this.$emit('update-list', this.toDoList)
            })
        }
    }
}
</script>

<style lang="scss" scoped>
    .description {
        display: none;

        li:hover & {
            display: block;
        }
    }
</style>
