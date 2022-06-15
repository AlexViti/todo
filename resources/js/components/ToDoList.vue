<template>
    <div>
        <div>
            <div class="flex">
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
        this.color = this.toDoList.color ? toHex(this.toDoList.color) : null
    },
    methods: {
        deleteList() {
            axios.delete(`/api/todo-lists/${this.toDoList.id}`).then(() => {
                this.$emit('refresh')
            })
        },
        submit() {
            if(this.color) this.toDoList.color = colorNumber(this.color);

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
