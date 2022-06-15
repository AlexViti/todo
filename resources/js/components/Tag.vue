<template>
    <div>
        <p :style="[{backgroundColor: color}]" v-if="!edit">{{ tag.name }}</p>
        <input v-else @keydown.enter="update" class="text-3xl mr-auto w-full" :style="[color ? {backgroundColor: color, color: '#fff'} : {}]" type="text" :disabled="!edit" v-model="tag.name" />
        <input v-if="edit" type="color" v-model="color" />
        <button v-if="!edit" @click="edit = true" class="text-gray-600">Edit</button>
        <button v-else @click="update" class="text-gray-600">Done</button>
        <button v-if="edit" @click="edit = false" class="text-gray-600">Cancel</button>
        <button class="bg-red-600 text-white" @click="deleteTag" >X</button>
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
    computed: {
        colorNumb() {
            if (this.color) {
                return Number(`0x${this.color.substring(1)}`)
            } else {
                return null
            }
        }
    },
    methods: {
        toHex(number) {
            if(number) return '#' + number.toString(16);
            else return null
        },
        update() {
            axios.put('/api/tags/' + this.tag.id, {
                name: this.tag.name,
                color: this.colorNumb,
            }).then(() => {
                this.edit = false
            })
        },
        deleteTag() {
            axios.delete('/api/tags/' + this.tag.id).then(() => {
                this.$emit('refresh')
            })
        }
    },
    created() {
        this.color = this.toHex(this.tag.color)
    }
}
</script>

<style>

</style>
