<template>
  <div class="row justify-center p-3">
      <div class="col-md-4">
          <form @submit.prevent >
            <div class="mb-3">
            <input
                type="email"
                class="form-control"
                placeholder="email"
                aria-describedby="emailHelp"
                name='email'
                v-model="form.email"
            />
            </div>
            <div class="mb-3">
            <input name='password'
                v-model="form.password" type="password" class="form-control" placeholder="hasło" />
            </div>
            <button type="submit"  @click="userLogin" class="btn btn-primary">Zaloguj</button>
        </form>
      </div>
  </div>
</template>

<script>

export default {
  name: "Login",
  data() {
    return {
      message: "Log in",
      form:{
          email:"",
          password:"",
          device_name:"web",
      }
    };
  },
  methods:{
      userLogin(){

          axios.get('/sanctum/csrf-cookie').then(response => {
              axios.post('api/login', this.form).then(res =>{

                localStorage.setItem('token', res.data.token);
                axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;


                this.$store.dispatch('user', res.data.user);
                this.$router.push('/dashboard');
              }).catch(err=>{
                  console.log(err);
              });
        });
      },
    checkAuth(){
        console.log(this.$store.getters.user)
        if(this.$store.getters.user){
            this.$router.push('/dashboard');
        }
    }
  },
  created() {
      this.checkAuth();
  },

};
</script>
