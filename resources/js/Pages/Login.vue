<template>
     <div class="flex flex-wrap w-full justify-center items-center pt-56">
        <div class="flex flex-wrap max-w-xl">
            <div class="p-2 text-2xl text-gray-800 font-semibold"><h1>Login to your account</h1></div>
            <div class="p-2 w-full">
                <label for="email">Your e-mail</label>
                <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Email" type="email" v-model="form.email">
            </div>
            <div class="p-2 w-full">
                <label for="password">Password</label>
                <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Password" type="password" v-model="form.password" name="password">
            </div>
            <div class="p-2 w-full mt-4">
                <button @click.prevent="loginUser" type="submit" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Login</button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            form:{
                email: '',
                password: '',
            },
            errors: [],
            baseUrl: ''
        }
    },
    methods:{
         loginUser(){

            axios.get('sanctum/csrf-cookie').then(response => {
                axios.get('api/login', this.form).then(() =>{
                    this.$router.push({ name: "Dashboard"});
                }).catch(() => {});
            });


            // axios.get('/sanctum/csrf-cookie').then(response => {
            // axios.post('api/login', this.form).then(res =>{
            // if(res.data.status === 200){
            //     localStorage.setItem('auth_token', res.data.token);
            //     localStorage.setItem('auth_name', res.data.username);
            //     swal("Success", res.data.message,"success");
            //     console.log(res.data.username);
            //     history.push('/');

            // }
            // else if(res.data.status === 401){
            //     swal("Warning", res.data.message,"warning");
            // }
            // else{
            //     setLogin({...loginInput,error_list:res.data.validation_errors});
            // }
//     });
// });
            }

    }
}
</script>

