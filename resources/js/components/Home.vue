<template>
    <div class="text-2xl text-gray-800">
        <div class="flex" v-for="(toDoList, i) in toDoLists" :key="i">
            <input :disabled="!toDoList.edit" type="text" :key="toDoList.refresh" v-model="toDoList.name">
            <input type="color" />
            <!-- <h3 v-if="!toDoList.edit" :style="[toDoList.color ? {backgroundColor: toHex(toDoList.color), color: '#fff'} : {}]">{{toDoList.name}}</h3> -->
            <button class="ml-auto" @click.prevent="edit(toDoList)">Edit</button>
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
            toDoLists: [],
        }
    },
    methods: {
        getTodoLists() {
            axios.get('/api/todo-lists').then(response => {
                this.toDoLists = response.data
                this.toDoLists.map(list => {
                    list.edit = false,
                    list.refresh = 0
                })
            })
        },
        toHex(number) {
            return '#' + number.toString(16)
        },
        deleteList(toDoList) {
            axios.delete(`/api/todo-lists/${toDoList.id}`).then(() => {
                this.getTodoLists()
            })
        },
        edit(toDoList) {
            toDoList.edit = !toDoList.edit;
            toDoList.refresh++
        }
    },
    mounted() {
        this.getTodoLists()
    }
}
</script>
