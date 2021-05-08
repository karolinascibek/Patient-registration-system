<template>
  <div class="bg-light py-3 ">
    <CalendarNav @clicked="setCurrentDate"  />
    <CalendarContainer :currentDate="currentDate" />
  </div>
</template>
<script>
import CalendarNav from "./CalendarNav";
import CalendarContainer from "./CalendarContainer";
export default {
  name: "calendar-component",
  components: {
    CalendarNav,
    CalendarContainer,
  },
  data() {
      return {
          currentDate:null,
      }
  },
  methods: {
      setCurrentDate(value){
          this.currentDate = value;
      },
  },
};
</script>
