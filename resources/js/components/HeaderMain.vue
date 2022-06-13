
<template>
    <div>
        <router-link :to="{name: 'Home'}">Home</router-link>
        <router-link :to="{name: 'About'}">About</router-link>
        <router-link :to="{name: 'Login'}">Login</router-link>
        <router-link :to="{name: 'Register'}">Register</router-link>
    </div>
</template>

<script>
export default {
    name: 'HeaderMain'
}
</script>

<style>
</style>
