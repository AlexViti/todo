<template>
    <div class="text-2xl text-gray-800">
        <div class="flex" v-for="(toDoList, i) in toDoLists" :key="i">
            <h3 :style="[toDoList.color ? {backgroundColor: toHex(toDoList.color), color: '#fff'} : {}]">{{toDoList.name}}</h3>
            <button class="bg-red-600 text-white" @click="deleteList(toDoList)">X</button>
        </div>
        <router-link to="/add-list">Add list</router-link>
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
        },
        toHex(number) {
            return '#' + number.toString(16)
        },
        deleteList(toDoList) {
            axios.delete(`/api/todo-lists/${toDoList.id}`).then(() => {
                this.getTodoLists()
            })
        }
    },
    mounted() {
        this.getTodoLists()
    }
}
</script>
