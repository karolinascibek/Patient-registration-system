<template>
  <div class="container-fluid ">
    <div class="m-3 my-4">

      <div class="row">
        <div class="col-3">

          <div class="row">
            <div class="col">
              <ListCalendars :calendars="myCalendars" :listName="listMyCalendars" />
            </div>
          </div>

          <div class="row">
            <div class="col">
              <ListCalendars :calendars="calendars" :listName="listOtherCalendars"  />
            </div>
          </div>

        </div>

        <div class="col-9 ">

            <Forms v-on:reloadlist="getCalendars()"/>

        </div>
      </div>

    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import AddCalendar from "../components/calendar/AddCalendar";
import NewCalendar from "../components/calendar/NewCalendar";
import ListCalendars from "../components/calendar/ListCalendars";
import Forms from "../components/calendar/Forms";

export default {
  components: {
    AddCalendar,
    NewCalendar,
    ListCalendars,
    Forms
  },
  name: "dashboard",
  computed: {
    ...mapGetters(["user"]),
  },
  data() {
    return {
      myCalendars: [],
      calendars: [],
      listOtherCalendars:"Inne Kalendarze",
      listMyCalendars:"Moje Kalendarze",

    };
  },
  methods: {
    getUser() {
      axios
        .get("api/user")
        .then((res) => {
          this.$store.dispatch("user", res.data);

          // console.log(localStorage.getItem('token'))
        })
        .catch((err) => {
          this.$router.push("/login");
          console.log(err);
        });
    },

    getCalendars() {
      axios
        .get("api/calendars")
        .then((res) => {
          this.myCalendars = res.data.myCalendars;
          this.calendars = res.data.calendars;
          console.log(res.data);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  created() {

    this.getCalendars();
  },
};
</script>
