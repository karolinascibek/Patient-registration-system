<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-10 py-2 px-4 bg-white">
        <Header :calendar="calendar" :owner="owner" />
        <AddEvent
          @clicked="getMessage"
          :currentEvent="currentEvent"
          @updateEvent="updateEvent"
        />
        <Calendar @updateEvent="updateEvent" :isAddEvent="isAddEvent" />
      </div>
      <div class="col-2">
        <UsersList />
      </div>
    </div>
  </div>
</template>

<script>
import BASE_URL from "../axios";
import Header from "../components/calendar/Header";
import Calendar from "../components/calendar/Calendar";
import AddEvent from "../components/calendar/AddEvent";
import UsersList from "../components/auth/UsersList";

export default {
  name: "calendar",
  props: ["id"],
  components: {
    Header,
    Calendar,
    AddEvent,
    UsersList,
  },
  data() {
    return {
      calendar: [],
      owner: [],
      eventsCalendar: ["hellow"],
      isAddEvent: false,
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
  },
};
</script>

<style>
.icon-style {
  font-size: 1.5em;
}
</style>
