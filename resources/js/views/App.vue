<template>
<main>
    <div class="flex bg-gray-100 border-b border-gray-300 py-4">
        <div class="container mx-auto flex justify-between">
            <div class="flex">
                <router-link class="mr-4" to='/' exact>Home</router-link>
                <router-link to='/about'>About</router-link>
            </div>
            <div v-if="!user" class="flex">
                <router-link class="mr-4" to='/login' exact>Login</router-link>
                <router-link to='/register'>Register</router-link>
            </div>
            <div v-else class="flex">
                <router-link class="mr-4" to='/dashboard' exact>{{user.name}}</router-link>
            </div>
        </div>
    </div>
    <div class="container mx-auto py-2">
        <router-view :user="user" @logout="loggedOut" @login="loggedIn"></router-view>
    </div>
</main>
</template>

<script>
export default {
    name: 'App',
    data() {
        return {
            user: null,
        }
    },
    methods: {
        getUser() {
            axios.get('/api/user').then(res => {
                this.user = res.data
            });
        },
        loggedOut() {
            this.user = null
        },
        loggedIn() {
            this.getUser()
        }
    },
    mounted() {
        this.getUser()
    }
}
</script>

<style>

</style>
