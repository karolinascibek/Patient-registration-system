<template>
  <div class="d-flex justify-content-around bg-light py-3">
    <div v-for="(weekDay, index) in 7" :key="index">
      <WeekDay  :index="index" :currentDate="currentDate" />
    </div>
  </div>
</template>
<script>
import WeekDay from "./WeekDay";
export default {
  name: "calendar-component",
  components: {
    WeekDay,
  },
  props: [ "currentDate"],
  data() {
    return {
        date:this.currentDate,
    };
  },
  methods: {
  },
  created() {},
};
</script>
