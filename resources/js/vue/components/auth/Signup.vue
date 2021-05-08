<template>
<div class="row justify-center p-3">
      <div class="col-md-4">
          <form v-on:submit.prevent >
            <div class="mb-3">
                 <input type="text" class="form-control" name="name" placeholder="Imie" v-model="user.name" />
                <p class="text-danger" v-text="errors.name"></p>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="last_name"  placeholder="Nazwisko" v-model="user.last_name" />
                <p class="text-danger" v-text="errors.last_name"></p>
            </div>
            <div class="mb-3">
                <input
                    type="Email"
                    class="form-control"
                    placeholder="email"
                    aria-describedby="emailHelp"
                    v-model="user.email"
                    name="email"

                />
                <p class="text-danger" v-text="errors.email"></p>
            </div>
            <div class="mb-3">
                <input type="password" name="password"  class="form-control"  placeholder="Hasło" v-model="user.password" />
                <p class="text-danger" v-text="errors.password"></p>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password_confirmation"  placeholder="Powtórz hasło" v-model="user.password_confirmation" />
                <p class="text-danger" v-text="errors.password_confirmation"></p>
            </div>
            <button @click="registerUser" class="btn btn-primary">Zarejestruj się</button>
        </form>
      </div>
</div>

</template>

<script>
export default {
  name: "signup",
  data() {
    return {
      message: "Log in",
      user:{
          name:"",
          last_name:"",
          password:"",
          password_confirmation:"",
          email:""
      },
      errors:{ },
    };
  },
  methods:{
      registerUser(){
          axios.post('api/register', this.user)
          .then((response)=>{
            if(response.data.errors){
                this.errors = response.data.errors;
            }
            else{
            //   this.user.name = "";
            //   this.user.last_name = '';
            //   this.user.password = '';
            //   this.user.confirmPassword = '';
            //   this.user.email = "";
            //   this.errors = {};
            this.$router.push("/login");
            }
          })
          .catch( err=>{
              this.errors = err
              console.log(err)
          });
      }
  },
};
</script>
