<template>
    <form @submit.prevent="addList">
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" v-model="name">
        <input type="color" v-model="colorHex" />
        <button :disabled="!name" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Add List
        </button>
    </form>
</template>

<script>
export default {
    name: 'AddList',
    data() {
        return {
            name: '',
            colorHex: null
        }
    },
    computed: {
        color() {
            if (this.colorHex) {
                return Number(`0x${this.colorHex.substring(1)}`)
            } else {
                return null
            }
        }
    },
    props: ['user'],
    methods: {
        addList() {
            axios.post('/api/todo-lists', {
                name: this.name,
                user_id: this.user.id,
                color: this.color
            }).then(() => {
                this.$router.push({ name: "Home" })
            })
        }
    }
}
</script>

<style>

</style>
