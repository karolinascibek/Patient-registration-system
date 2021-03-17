<template>
    <div>
        User page
        <h4 v-if="user">{{user.name}} {{user.email}}</h4>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    name:'dashboard',
    computed: {
        ...mapGetters([
            'user',
        ])
    },
    // async created() {
    //     console.log(localStorage.getItem('token'))
    //     const response = await axios.get('api/user')
    //     console.log(response)
    // },

}
</script>
