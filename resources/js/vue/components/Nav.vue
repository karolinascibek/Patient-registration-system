<template>
    <div class='my-4'>
        <ul class="nav justify-content-center">
            <li class="border-right nav-item ">
                <router-link :to="{name:'home'}" class="nav-link btn btn-link">Home</router-link>
            </li>
            <li class="border-right nav-item " v-if="!user">
                <router-link :to="{name:'login'}" class="nav-link btn btn-link ">Login</router-link>
            </li>
            <li class="border-right nav-item " v-if="!user">
                <router-link :to="{name:'signup'}" class="nav-link btn btn-link" >SignUp</router-link>
            </li>
            <li class=" nav-item ">
                <router-link :to="{name:'home'}" class="nav-link btn btn-link">Check Visit</router-link>
            </li>
            <li class=" nav-item  border-left" v-if="user">
                <a href="javascript:void(0)" @click="handelClick" class="nav-link btn btn-link" >Logout</a>
            </li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';
import { mapGetters } from 'vuex';

export default {
    name:'Nav',
    computed: {
        ...mapGetters([
            'user',
        ])
    },
    data() {
        return {
        }
    },
    methods:{
         handelClick(){
            //  localStorage.removeItem('token')
            //  this.$router.push("/login");
            console.log(localStorage.getItem('token'))
            axios.post('api/logout',{}).then(res=>{
                localStorage.removeItem('token');
                this.$store.dispatch('user',null );
                this.$router.push("/login");
            }).catch(err=>{
                console.log(err);
            })
        }
    },
}
</script>

<style scoped>
.btn:focus{
    border: 0px solid white;
    box-shadow: 0 0 0 white;
    border-radius: 0;
    border-bottom: 2px solid green;
}
.color{
     border-bottom: 2px solid green;
}
.nav-link:focus{
    border-bottom: 2px solid green;
}

</style>
