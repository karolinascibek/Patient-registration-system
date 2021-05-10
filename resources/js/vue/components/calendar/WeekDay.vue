<template>
  <div class="">
    <div v-bind:class="{ active: iscurrentDay, 'text-success': iscurrentDay }">
      <h4  class="px-0">{{ currentDate.getDate() }}</h4>
      <h5>{{ setWeekDay(index) }}</h5>
    </div>

    <div v-for="(event, i) in events" :key="i">
      <EventCalendar v-if="isSentEvents(event)" :currentDate="currentDate" :event="event" />
    </div>
  </div>
</template>

<script>
import EventCalendar from "./EventCalendar";
import BASE_URL from "../../axios";

export default {
  name: "week-day",
  components: {
    EventCalendar,
  },
  props: ["index", "currentDate", "isAddEvent", "events"],
  data() {
    return {
      weekday: null,
      date: this.currentDate,

      reloadEvent: this.isAddEvent,

      currentWeekDay: null,
      iscurrentDay: false,
      weekdays: ["Nd", "Pon", "Wt", "Sr", "Cz", "Pt", "So"],
    };
  },
  methods: {
    isSentEvents(event){
        let newDate = new Date(event.date);
        newDate = this.getDate(newDate);
        let c_date = this.getDate(this.currentDate);
        if(newDate.year == c_date.year && newDate.month == c_date.month && newDate.day == c_date.day){
            return true;
        }
        return false;
    },
    setDate(date, value) {
      let newDate = this.addDay(date, value);
      return newDate;
    },
    addDay(date, value) {
      let d = new Date(date.getFullYear(), date.getMonth(), date.getDate() + value);
      return d;
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
      let d = this.getDate(this.currentDate);
      let now = new Date(Date.now());
      let dn = this.getDate(now);
      console.log("nasz dzień" + this.weekday +" == "+this.index);
      if (
        this.index == 0 &&
        d.year == dn.year &&
        d.month == dn.month &&
        d.day == dn.day
      ) {
        this.iscurrentDay = true;
      } else {
        this.iscurrentDay = false;
      }
    },
    setCurrentDate(newDate) {
      this.date = newDate;
    },
  },
  updated() {
    this.date = this.currentDate
    this.checkCurentDay();
    //let newdate = this.addDay(this.currentDate, this.index);
    //this.getEventsForDay(newdate);
    console.log(this.isAddEvent + "metod update new Add ewent");
  },
  created() {
    this.setCurrentDate(this.currentDate);
    this.weekday = this.currentDate.getDay();
    this.currentWeekDay = this.date.getDay();
    this.checkCurentDay();
    //this.getEventsForDay(date);
  },
};
</script>
