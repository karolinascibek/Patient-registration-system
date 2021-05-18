<template>
  <div class="row justify-content-center ">
    <div class="col-9">
      <div class="d-flex justify-content-around py-3">
        <button @click="previouslyWeek" class="btn btn-primary rounded-circle btn-lg">
          <i class="fas fa-arrow-left"></i>
        </button>

        <h3>{{ setMonth(currentDate.getMonth()) }} {{ currentDate.getFullYear() }}</h3>

        <button @click="nextWeek" class="btn btn-primary rounded-circle btn-lg">
          <i class="fas fa-arrow-right"></i>
        </button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "calendar-component",
  data() {
    return {
      currentDate: null,
      months: [
        "Styczeń",
        "Luty",
        "Marzec",
        "Kwiecień",
        "Maj",
        "Czerwiec",
        "Lipiec",
        "Sierpień",
        "Wrzesień",
        "Październik",
        "Listopad",
        "Grudzień",
      ],
    };
  },
  methods: {
    setMonth(index) {
      return this.months[index];
    },
    setDay(newDay) {
      let day = newDay;
      let month = this.currentDate.getMonth();
      let year = this.currentDate.getFullYear();
      this.currentDate = new Date(year, month, day);
    },
    sendFromNavToCalendar(event) {
      this.$emit("clicked", this.currentDate);
    },
    previouslyWeek(event) {
      let day = this.currentDate.getDate() - 7;
      this.setDay(day);
      this.sendFromNavToCalendar();
    },
    nextWeek(event) {
      let day = this.currentDate.getDate() + 7;
      this.setDay(day);
      this.sendFromNavToCalendar();
    },
  },
  created() {
    this.currentDate = new Date(Date.now());
  },
};
</script>
