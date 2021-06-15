<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-10 py-2 px-4 bg-white">
        <Header :calendar="calendar" :owner="owner" />
        <AddEvent
          @clicked="getMessage"
          :currentEvent="currentEvent"
          @updateEvent="updateEvent"
          :currentDate="currentDate"
        />
        <Calendar @updateEvent="updateEvent" :isAddEvent="isAddEvent" @currentDate="getCurrentDate" />
      </div>
    </div>
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
  components: {
    Header,
    Calendar,
    AddEvent,
  },
  data() {
    return {
      calendar: [],
      owner: [],
      eventsCalendar: ["hellow"],
      isAddEvent: false,
      currentDate: null,
      currentEvent: {
        id: "",
        user_id: "",
        calendar_id: "",
        contents: "",
        yea: "",
        month: "",
        day: "",
        hour_start: "",
        minutes_start: "",
        hour_end: "",
        minutes_end: "",
      },
    };
  },
  methods: {
    getCurrentDate(value){
        this.currentDate = value;
        console.log("CAlendar Page ------ ");
    },
    updateEvent(value) {
      //   console.log("CAlendar Page ------ ");
      this.currentEvent = value;
    },
    getMessage(value) {
      //   console.log("Odebraba 1 CAlendar Page");
      this.isAddEvent = value;
      console.log(value);
    },
    getCalendar() {
      axios
        .get(BASE_URL + "api/calendar/" + this.$route.params.id)
        .then((resp) => {
          this.calendar = resp.data.calendar;
          this.owner = resp.data.owner;
        })
        .catch((err) => {
          consol.log(err);
        });
    },
  },
  updated() {
    // console.log("CALENDER UPDATE");
    // console.log(this.eventToUpdate);
  },
  created() {
    this.getCalendar();
    this.currentDate = new Date(Date.now());
  },
};
</script>

<style>
.icon-style {
  font-size: 1.5em;
}
</style>
