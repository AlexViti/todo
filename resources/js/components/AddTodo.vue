<template>
    <form class="flex flex-col items-start" @submit.prevent="addTodo">
        <input class="bg-gray-600 mt-2" type="text" v-model="title" />
        <input class="bg-gray-600 mt-2" type="text" v-model="description" />
        <button class="bg-blue-600 text-white mt-2">Add todo</button>
    </form>
</template>

<script>
export default {
    name: 'AddTodo',
    data() {
        return {
            title: '',
            description: '',
            completed: false
        }
    },
    props: {
        toDoList: {
            type: Object,
            required: true
        }
    },
    methods: {
        addTodo() {
            axios.post(`/api/todo-lists/${this.toDoList.id}/todos`, {
                title: this.title,
                description: this.description,
                completed: this.completed
            }).then(() => {
                this.$emit('added')
            })
        }
    }
}
</script>

<style>

</style>
