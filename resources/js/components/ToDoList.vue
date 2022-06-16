<template>
    <div>
        <div>
            <div class="flex bg-blue-600">
                <h3 v-if="!edit" class="text-3xl mr-auto w-full"
                    :style="[toDoList.color ? {backgroundColor: toHex(toDoList.color), color: '#fff'} : {}]"
                >
                    {{toDoList.name}}
                </h3>

                <input v-else @keydown.enter="submit" class="text-3xl mr-auto w-full" :style="[color ? {backgroundColor: color, color: '#fff'} : {}]" type="text" :disabled="!edit" v-model="toDoList.name" />
                <input v-if="edit" type="color" v-model="color" />
                <button v-if="!edit" @click="edit = true" class="text-gray-600">Edit</button>
                <button v-else @click="submit" class="text-gray-600">Done</button>
                <button v-if="edit" @click="edit = false" class="text-gray-600">Cancel</button>
                <button class="bg-red-600 text-white" @click="deleteList">X</button>

                <div class="flex justify-center content-center p-2 bg-white rounded-full w-10 h-10 cursor-pointer">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>

                <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Dropdown button <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                        </li>
                    </ul>
                </div>
            </div>
            <todos :toDoList="toDoList" @added="addedTodo" />
        </div>
    </div>
</template>

<script>
import ToDo from './ToDo.vue'
import Todos from './Todos.vue'
export default {
  components: { ToDo, Todos },
    name: 'ToDoList',
    data() {
        return {
            edit: false,
            color: null
        }
    },
    props: {
        toDoList: {
            type: Object,
            required: true
        }
    },
    created() {
        this.color = this.toDoList.color ? this.toHex(this.toDoList.color) : null
    },
    methods: {
        toHex(number) {
            return '#' + number.toString(16)
        },
        deleteList() {
            axios.delete(`/api/todo-lists/${this.toDoList.id}`).then(() => {
                this.$emit('refresh')
            })
        },
        submit() {
            if(this.color) this.toDoList.color = Number(`0x${this.color.substring(1)}`);

            axios.put(`/api/todo-lists/${this.toDoList.id}`, this.toDoList).then(() => {
                this.$emit('refresh')
            }).then(() => {
                this.edit = false
            })
        },
        addedTodo() {
            this.$emit('refresh');
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
