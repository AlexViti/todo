
<template>
    <div>
        <router-link :to="{name: 'Home'}">Home</router-link>
        <router-link :to="{name: 'About'}">Blog</router-link>
        <router-link :to="{name: 'Login'}">About</router-link>
        <router-link :to="{name: 'Register'}">Contact us</router-link>
    </div>
</template>

<script>
export default {
    name: 'HeaderMain'
}
</script>

<style>
</style>
