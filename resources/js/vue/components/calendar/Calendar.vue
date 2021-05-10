<template>
  <div class="bg-light py-3">
    <CalendarNav @clicked="setCurrentDate" />
    <CalendarContainer
      :currentDate="currentDate"
      :isAddEvent="isAddEvent"
      :events="events"
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
  methods: {
    setCurrentDate(value) {
      this.currentDate = value;
      console.log("ser curretn date +++++++")
      this.getEvents(this.currentDate);
    },
    setDay(date, value) {
      return new Date(date.getFullYear(), date.getMonth() + 1, date.getDate() + value);
    },
    setMonth(date, value) {
      return new Date(date.getFullYear(), date.getMonth() + value, date.getDate());
    },
    getEvents(date) {
      let data = {
        date_start: this.formtDate(this.setMonth(date, 1)),
        date_end: this.formtDate(this.setDay(date, 6)),
      };
      axios
        .post(BASE_URL + "api/calendar/" + this.$route.params.id + "/events", data)
        .then((res) => {
          console.log("Pobrano Events");
          this.events = res.data.events;
          console.log(this.events);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    formtDate(date) {
      return date.getFullYear() + "-" + date.getMonth() + "-" + date.getDate();
    },
  },
  updated() {
    console.log("CALENDER UPDATE");
  },
  created() {
    this.currentDate = new Date(Date.now());
    console.log("CREATED CALENDAR === "+this.currentDate)
    this.getEvents(this.currentDate);
  },
};
</script>
