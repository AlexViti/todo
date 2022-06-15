<template>
    <div>
        <p v-if="!edit">{{ tag.name }}</p>
        <input v-else @keydown.enter="submit" class="text-3xl mr-auto w-full" :style="[color ? {backgroundColor: color, color: '#fff'} : {}]" type="text" :disabled="!edit" v-model="tag.name" />
        <input v-if="edit" type="color" v-model="color" />
        <button v-if="!edit" @click="edit = true" class="text-gray-600">Edit</button>
        <button v-else  class="text-gray-600">Done</button>
        <button v-if="edit" @click="edit = false" class="text-gray-600">Cancel</button>
        <button class="bg-red-600 text-white" >X</button>
    </div>
</template>

<script>
export default {
    name: 'Tag',
    props: ['tag'],
    data() {
        return {
            edit: false,
            color: null,
        }
    },
    methods: {
        toHex() {
            this.color = '#' + this.tag.color.toString(16)
        }
    },
    created() {
        this.toHex()
    }
}
</script>

<style>

</style>
