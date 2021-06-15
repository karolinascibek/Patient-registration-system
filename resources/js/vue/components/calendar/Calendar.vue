<template>
  <div class="bg-light py-4 rounded-lg shadow-sm border-bottom border-top">
    <CalendarNav @clicked="setCurrentDate" />
    <CalendarContainer
      :currentDate="currentDate"
      :isAddEvent="isAddEvent"
      :events="events"
      @updateEvent="updateEvent"
      @deletedEvent="deletedEvent"
    />
  </div>
</template>
<script>
import CalendarNav from "./CalendarNav";
import CalendarContainer from "./CalendarContainer";
import BASE_URL from "../../axios";

export default {
  name: "calendar-component",
  components: {
    CalendarNav,
    CalendarContainer,
  },
  props: ["isAddEvent"],
  data() {
    return {
      currentDate: null,
      events: [],
    };
  },
  mounted() {
    // Echo.channel(`event-added`).listen("EventAdded", (e) => {
    //   this.events = e.events;
    //   console.log("event nasłuch ");
    //   console.log(e);
    // });
  },
  methods: {
    deletedEvent(value) {
      this.getEvents(this.currentDate);
    },
    updateEvent(value) {
      //   console.log("Calendar Component xD -------------------------------");
      this.$emit("updateEvent", value);
    },
    setCurrentDate(value) {
      this.currentDate = value;
      this.getEvents(this.currentDate);
    },
    setDay(date, value) {
      return new Date(date.getFullYear(), date.getMonth() + 1, date.getDate() + value);
    },
    setMonth(date, value) {
      return new Date(date.getFullYear(), date.getMonth() + value, date.getDate());
    },
    formtDate(date) {
      return date.getFullYear() + "-" + date.getMonth() + "-" + date.getDate();
    },
    getEvents(date) {
      let data = {
        date_start: this.formtDate(this.setMonth(date, 1)),
        date_end: this.formtDate(this.setDay(date, 6)),
      };
      axios
        .post(BASE_URL + "api/calendar/" + this.$route.params.id + "/events", data)
        .then((res) => {
          console.log("Pobrano wydarzenia");
          this.events = res.data.events;
          console.log(this.events);
          this.$emit("currentDate", this.currentDate);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  updated() {
    // console.log("CALENDER UPDATE");
  },
  created() {
    this.currentDate = new Date(Date.now());
    // console.log("CREATED CALENDAR === "+this.currentDate)
    this.getEvents(this.currentDate);
  },
};
</script>
