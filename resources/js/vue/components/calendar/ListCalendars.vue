<template>
  <div class="row mb-4">
    <div class="col">
      <div  class="list-group list-group-flush border-bottom">
        <h6 href="#" class="list-group-item list-group-item-action list-group-item-light active m-0" aria-current="true">{{listName}}</h6>
        <ItemListCalendar v-for="cal in calendars" :key="cal.id" :item="cal" class="list-group-item list-group-item-action" />
      </div>
    </div>
  </div>
</template>

<script>
import ItemListCalendar from "./ItemListCalendars";

export default {
  name: "listCalendars",
  props: ["calendars", 'listName'],
  components: {
    ItemListCalendar,
  },
  data() {
      return {

      }
  },

  methods: {

  },
  created() {
  },
};
</script>

<style>
.list-calendars {
  margin-bottom: 4em;
  margin-top: 1em;
  padding: 20px;
  border-top: 1px solid rgb(204, 203, 203);
}
</style>
