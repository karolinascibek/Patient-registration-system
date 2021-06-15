<template>
  <div class="border rounded my-2 rounded-lg shadow-sm p-2 py-3 bg-white">
    <div v-if="edit(event)" class="d-flex flex-row mb-2 justify-content-end">
      <button @click="upadateEvent()" class="btn-light text-dark mr-1">edit</button>
      <button @click="deleteEvent()" class="btn-light text-danger">usuń</button>
    </div>
    <div>{{ event.time_start }} - {{ event.time_end }}</div>

    <div>{{ event.contents }}</div>
  </div>
</template>

<script>
import BASE_URL from "../../axios";

export default {
  name: "event-calendar",
  props: ["currentDate", "event"],
  data() {
    return {
      time: null,
      user_id: null,
    };
  },
  methods: {
    edit(event){
        if(event.user_id == this.user_id || event.owner == this.user_id ){
            return true;
        }
        return false;
    },
    deleteEvent(){

        axios.delete(BASE_URL+"api/event/"+this.event.id+"/delete", {}).then(res=>{
            console.log("Usunięto")
            let deletedEvent = true;
            this.$emit("deletedEvent", deletedEvent);
        }).catch(err=>{
            console.log(err)
        })
    },
    upadateEvent() {
      let date = this.event.date.split("-");
      let time_start = this.event.time_start.split(":");
      let time_end = this.event.time_end.split(":");

        let evetToUpdate={
            id: this.event.id,
            user_id: this.event.user_id,
            calendar_id: this.event.calendar_id,

            contents: this.event.contents,
            year: date[0],
            month: date[1],
            day: date[2],
            hour_start: time_start[0],
            minutes_start: time_start[1],
            hour_end: time_end[0],
            minutes_end: time_end[1],
        }
      //   console.log("Event Calendar xD -------------------------------");
      this.$emit("updateEvent", evetToUpdate);
    },
  },
  updated() {
    // console.log("Event Update component xD -------------------------------");
  },
  created() {
    this.user_id = this.$store.getters.user.id;
  },
};
</script>
