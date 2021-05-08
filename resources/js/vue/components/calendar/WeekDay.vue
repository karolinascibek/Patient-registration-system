<template>
  <div class="">

    <div v-bind:class="{ active: iscurrentDay, 'text-success': iscurrentDay,}">
      <h4 v-if="!currentDate" class='px-0'>{{ setDate(date, index) }} </h4>
      <h4 v-else class='px-0'>{{ setDate(currentDate, index) }}  </h4>
      <h5>{{setWeekDay(indexWeekDays)}}</h5>
    </div>

    <div v-for="i in 4" :key="i">
      <EventCalendar />
    </div>

  </div>
</template>

<script>
import EventCalendar from "./EventCalendar";

export default {
  name: "week-day",
  components: {
    EventCalendar,
  },
  props: [ "index", "currentDate"],
  data() {
    return {
      day: null,
      date: this.currentDate,

      currentWeekDay: null,
      indexWeekDays: null,
      iscurrentDay: false,
      weekdays: ["Nd", "Pon", "Wt", "Sr", "Cz", "Pt", "So"],
    };
  },
  methods: {
    setDate(date, value) {
      let newDate = new Date(
        date.getFullYear(),
        date.getMonth(),
        date.getDate() + value
      );
      this.indexWeekDays = newDate.getDay();
      return newDate.getDate();
    },
    setWeekDay(index) {
      return this.weekdays[index];
    },
    getDate(date) {
      let y = date.getFullYear();
      let m = date.getMonth();
      let d = date.getDate();

      return { year: y, month: m, day: d };
    },
    checkCurentDay() {
      let d = this.getDate(this.date);
      let now = new Date(Date.now());
      let dn = this.getDate(now);
      if (
        this.index == this.currentWeekDay &&
        d.year == dn.year &&
        d.month == dn.month &&
        d.day == dn.day

      ) {
          console.log("nasz dzień"+this.date)

        this.iscurrentDay = true;
      } else {
        this.iscurrentDay = false;
      }
    },
    setCurrentDate(newDate) {
      this.date = newDate;
      this.day = newDate.getDate();
    },
  },
  updated() {
    if (this.date != null) {
      this.setCurrentDate(this.currentDate);
    }
    this.checkCurentDay();
  },
  created() {
    this.setCurrentDate(new Date(Date.now()));
    this.currentWeekDay = this.date.getDay();
    this.checkCurentDay();
  },
};
</script>
