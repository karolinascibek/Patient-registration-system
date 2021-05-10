<template>
  <div class="border rounded my-1 p-2 bg-white">
    <div>{{event.time_start}} - {{event.time_end}}</div>

    <div>{{event.contents}}</div>
  </div>
</template>
<script>
export default {
  name: "event-calendar",
  props: [ "currentDate", 'event'],
};
</script>
