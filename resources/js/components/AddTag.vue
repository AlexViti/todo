<template>
    <div>
        <div v-for="tag in arrTags" :key="tag.name">
            <p>{{ tag.name }}</p>
        </div>
        <button v-if="!addTag" @click="addTag = true">Add Tag</button>
        <form v-if="addTag" @submit.prevent="createTag()">
            <input type="text" v-model="tagName">
            <input type="color" v-model="tagColorHex" />
            <button>Confirm</button>
        </form>
    </div>
</template>

<script>
export default {
    name: 'AddTag',
    props: ['user'],
    data() {
        return {
            arrTags: [],
            addTag: false,
            tagName: '',
            tagColorHex: null,
        }
    },
    methods: {
        getTags() {
            axios.get('/api/tags')
                .then(response => {
                this.arrTags = response.data
            })
        },
        createTag() {
            axios.post('/api/tags', {
                name: this.tagName,
                color: this.color,
                user_id: this.user.id,
            }).then(() => {
                this.addTag = false
                this.getTags()
            })
        }
    },
    computed: {
        color() {
            if (this.tagColorHex) {
                return Number(`0x${this.tagColorHex.substring(1)}`)
            } else {
                return null
            }
        }
    },
    created() {
        this.getTags()
    }
}
</script>

<style>

</style>
