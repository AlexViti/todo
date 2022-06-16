<template>
        
    <div class="mb-5 border-2 rounded rounded-xl" :style="[toDoList.color ? {borderColor: toHex(toDoList.color), color: '#000'} : {}]">
        <div class="p-2 flex items-center" :style="[toDoList.color ? {backgroundColor: toHex(toDoList.color), color: '#fff'} : {}]">
            <h3 v-if="!edit" class="text-3xl mr-auto w-full" :style="[toDoList.color ? {backgroundColor: toHex(toDoList.color), color: '#fff'} : {}]">
                {{toDoList.name}}
            </h3>

            <input v-else @keydown.enter="submit" class="text-3xl mr-auto w-full" :style="[color ? {backgroundColor: color, color: '#fff'} : {}]" type="text" :disabled="!edit" v-model="toDoList.name" />
            <input v-if="edit" type="color" v-model="color" class="colorpicker ml-3"/>
            
            <button v-if="!edit" @click="edit = true" class="ml-3 rounded-full bg-blue-600 text-white">
                <i class="fa-solid fa-pencil p-5"></i>
            </button>

            <button v-else @click="submit" class="ml-3 rounded-full bg-green-600 text-white">
                <i class="fa-solid fa-check w-10 h-10 p-3"></i>
            </button>
            <button v-if="edit" @click="edit = false" class="ml-3 rounded-full bg-red-600 text-white">
                <i class="fa-solid fa-xmark  w-10 h-10 p-3"></i>
            </button>
            
            <button class="ml-3 rounded-full bg-red-600 text-white" @click="deleteList">
                <i class="fa-solid fa-trash p-5"></i>
            </button>
        </div>


        <todos :toDoList="toDoList" @added="addedTodo" />
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
.colorpiker{
    border-radius: 50%;
}
</style>
