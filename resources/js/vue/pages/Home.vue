<template>
    <div class="row justify-content-center mt-4">
        <div class="col-4">
                Home
                <button @click="k">kl</button>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';


export default {
    name:"home",
    computed: {
        ...mapGetters([
            'user',
        ])
    },
    data() {
        return {
            message:"Log in",
        }
    },
    methods:{
        k(){
            console.log(localStorage.getItem('token'))
            console.log(this.$store.getters.user)
        }
    }
}
</script>
