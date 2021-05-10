<template>
  <div class="d-flex justify-content-around bg-light py-3">
    <div v-for="(weekDay, index) in 7" :key="index">
      <WeekDay
        :currentDate="setDate(currentDate, index)"
        :index="index"
        :isAddEvent="isAddEvent"
        :events="events"
      />
      <div>{{ isAddEvent }} + calendar Container</div>
    </div>
  </div>
</template>

<script>
import WeekDay from "./WeekDay";
import BASE_URL from "../../axios";

export default {
  name: "calendar-component",
  components: {
    WeekDay,
  },
  props: ["currentDate", "isAddEvent",'events'],
  data() {
    return {
      date: this.currentDate,
    };
  },
  methods: {
    setDate(date, value) {
      let newDate = this.addDay(date, value);
      return newDate;
    },
    addDay(date, value) {
      let d = new Date(date.getFullYear(), date.getMonth(), date.getDate() + value);
      return d;
    },

  },
  updated() {
    console.log("odebrane 2 Calendar container" + this.date);

    console.log(" updated " + this.date);
  },
  created() {
  },
};
</script>
