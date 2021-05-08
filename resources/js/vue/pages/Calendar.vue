<template>
  <div class="py-2 px-4 ">
    <Header :calendar="calendar" :owner='owner' />
    <AddEvent />
    <Calendar  />

  </div>
</template>

<script>
import BASE_URL from "../axios";
import Header from "../components/calendar/Header";
import Calendar from "../components/calendar/Calendar";
import AddEvent from "../components/calendar/AddEvent";

export default {
  name: "calendar",
  props: ["id"],
  components:{
      Header,
      Calendar,
      AddEvent,
  },
  data() {
    return {
      calendar: [],
      owner: [],
      eventsCalendar:['hellow'],

    };
  },
  methods: {
    getCalendar() {
      axios
        .get(BASE_URL + "api/calendar/"+this.$route.params.id)
        .then((resp) => {
          this.calendar = resp.data.calendar;
          this.owner = resp.data.owner;
        })
        .catch((err) => {
          consol.log(err);
        });
    },
  },
  created() {
    this.getCalendar();
  },
};
</script>

<style>
.icon-style {
  font-size: 1.5em;
}
</style>
