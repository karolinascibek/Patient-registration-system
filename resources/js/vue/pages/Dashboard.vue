<template>
    <div class="container-fluid border-top">

        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <AddCalendar />
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <NewCalendar />
                </div>
            </div>


            <div class="row ">
                <div class="col">
                    <ListCalendars />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import AddCalendar from "../components/AddCalendar";
import NewCalendar from "../components/NewCalendar";
import ListCalendars from "../components/ListCalendars";

export default {
    components:{
        AddCalendar, NewCalendar, ListCalendars
    },
    name:'dashboard',
    computed: {
        ...mapGetters([
            'user',
        ])
    },
    async created() {
        const response = await axios.get('api/user')
        this.$store.dispatch('user', response.data);
        console.log("dash")
        console.log(localStorage.getItem('token'))

    },
}
</script>


