<template>
  <div>
      <Nav />
      <button >kl</button>
    <router-view />
  </div>
</template>
<script>
import Nav from './components/Nav';
import Login from './components/Login';
import { mapGetters } from 'vuex';


export default {
    name:"App",
    components:{ Nav, Login },
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

    },
    async created() {
        const response = await axios.get('api/user')
        this.$store.dispatch('user', response.data);
        //console.log(response.data)
    },

};
</script>
