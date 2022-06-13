<template>
    <div>
        Dashboard <br>
        <div v-if="user">
            Name: {{user.name}} <br>
            Email: {{user.email}}<br><br>
            <button @click.prevent="logout">Logout</button>

            <div v-for="(todoList, i) in todoLists" :key="i">
                <h3>{{todoList.name}}</h3>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            user: null,
            todoLists: []
        }
    },
    methods:{
        logout(){
            axios.post('/api/logout').then(()=>{
                this.$router.push({ name: "Home"})
            })
        },
        getTodoLists(){
            axios.get('/api/todo-lists').then(response => {
                this.todoLists = response.data
            })
        }
    },
    mounted(){
        axios.get('/api/user').then(res => {
            console.log(res);
            this.user = res.data

        }),
        this.getTodoLists()
    }
}
</script>
