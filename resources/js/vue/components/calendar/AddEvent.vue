<template>
  <div
    class="d-flex justify-content-center bg-light mb-4 border-top border-bottom  rounded-bottom shadow-sm"
  >
    <form @submit.prevent class="bg-light">
      <div class="form-row">
        <div class="col-md-12 mb-3">
          <label for="validationDefault01">Treść wydarzenia</label>
          <input
            type="text"
            class="form-control"
            id="validationDefault01"
            value="Mark"
            name="contains"
            v-model="event.contents"
          />
        </div>
      </div>
      <ErrorInput v-if="errors" :message="getErrors(errors.contents)" />
      <div class="form-row">
        <div class="col-md-2 mb-3">
          <label for="validationDefault03">dzień</label>
          <input
            type="number"
            class="form-control"
            id="validationDefault03"
            name="day"
            v-model="event.day"
          />
        </div>
        <div class="col-md-2 mb-3">
          <label for="validationDefault03">miesiąc</label>
          <input
            type="number"
            class="form-control"
            id="validationDefault03"
            name="month"
            v-model="event.month"
          />
        </div>

        <div class="col-md-2 mb-3">
          <label for="validationDefault03">rok</label>
          <input
            type="number"
            class="form-control"
            id="validationDefault03"
            name="year"
            v-model="event.year"
          />
        </div>
      </div>

      <ErrorInput v-if="errors" :message="getErrors(errors.day)" />
      <ErrorInput v-if="errors" :message="getErrors(errors.month)" />
      <ErrorInput v-if="errors" :message="getErrors(errors.year)" />

      <div class="form-row justify-content-between border-bottom py-2">
        <div class="col-3">
          <label for="validationDefault03">Godzina rozpoczęcia</label>
        </div>
        <div class="col-3 text-right">
          <label for="validationDefault03">Godzina zakończenia</label>
        </div>
      </div>

      <div class="form-row pt-2">
        <div class="col-md-2 mb-3">
          <label for="validationDefault03">godzina</label>
          <input
            type="number"
            class="form-control"
            id="validationDefault03"
            name="hour_start"
            v-model="event.hour_start"
          />
        </div>
        <div class="col-md-2 mb-3">
          <label for="validationDefault03">minuty</label>
          <input
            type="number"
            class="form-control"
            id="validationDefault03"
            name="minutes_start"
            v-model="event.minutes_start"
          />
        </div>

        <div class="col-md-2 mb-3"></div>
        <div class="col-md-2 mb-3"></div>

        <div class="col-md-2 mb-3">
          <label for="validationDefault03">godzina</label>
          <input
            type="number"
            class="form-control"
            id="validationDefault03"
            name="hour_end"
            v-model="event.hour_end"
          />
        </div>
        <div class="col-md-2 mb-3">
          <label for="validationDefault03">minuty</label>
          <input
            type="number"
            class="form-control"
            id="validationDefault03"
            name="minutes_end"
            v-model="event.minutes_end"
          />
        </div>
      </div>
      <ErrorInput v-if="errors" :message="getErrors(errors.hour_start)" />
      <ErrorInput v-if="errors" :message="getErrors(errors.minutes_start)" />
      <ErrorInput v-if="errors" :message="getErrors(errors.hour_end)" />
      <ErrorInput v-if="errors" :message="getErrors(errors.minutes_end)" />
      <div
        v-if="event.id == '' || event.id == null"
        class="d-flex flex-row justify-content-end"
      >
        <button @click="addEvent" class="btn btn-primary btn-lg" type="submit">
          Dodaj
        </button>
      </div>
      <div v-else class="d-flex flex-row justify-content-end">
        <button @click="canceledEvent" class="btn btn-primary mr-2 btn-lg" type="submit">
          Anuluj
        </button>
        <button @click="updatedEvent" class="btn btn-primary btn-lg" type="submit">
          Edytuj
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import BASE_URL from "../../axios";
import ErrorInput from "../errors/ErrorInput";

export default {
  name: "calendar-component",
  components: {
    ErrorInput,
  },
  props: ["currentEvent"],
  data() {
    return {
      event: this.currentEvent,
      errors: null,
    };
  },
  watch: {
    currentEvent(val, oldVal) {
      this.event = this.currentEvent;
      console.log("watch ");
    },
  },
  methods: {
    canceledEvent() {
      this.errors = null;
      this.setEmptyEvnet();
      this.emitMessageTo("updateEvent", {});
    },
    updatedEvent() {
      if (!this.checkDate()) {
        this.errors = ["Data zakończenia nie może byc mniejsza od daty rozpoczęcia."];
        return;
      }
      axios
        .post(BASE_URL + "api/event/update", this.event)
        .then((res) => {
          console.log("przesłane dane event update");
          console.log(res.data);
          this.setErrors(res);
        })
        .catch((err) => {
          console.log(err);
        });
      this.setEmptyEvnet();
      this.emitMessageTo("updateEvent", {});
    },
    emitMessageTo(message, value) {
      this.$emit(message, value);
    },

    getErrors(error) {
      console.log(error);
      if (error != undefined) {
        return error[0];
      }
    },
    setErrors(res) {
      this.errors = res.data.errors;
      if (this.errors) {
        this.event = res.data.form;
      } else {
        this.setEmptyEvnet();
      }
    },
    checkDate() {
      let start = new Date(Date.now());
      start.setHours(this.currentEvent.hour_start, this.currentEvent.minutes_start);

      let end = new Date(Date.now());
      end.setHours(this.currentEvent.hour_end, this.currentEvent.minutes_end);

      if (start > end) {
        return false;
      }
      return true;
    },
    addEvent() {
      let form = this.event;
      this.errors = null;

      if (!this.checkDate()) {
        console.log("Data zakończenia nie może byc mniejsza od daty rozpoczęcia.")
        return;
      }
      axios
        .post(BASE_URL + "api/calendar/" + this.$route.params.id + "/event/create", form)
        .then((res) => {
          this.setErrors(res);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    setEmptyEvnet() {
      this.event = {
        id: "",
        user_id: "",
        calendar_id: "",
        contents: "",
        yea: "",
        month: "",
        day: "",
        hour_start: "",
        minutes_start: "",
        hour_end: "",
        minutes_end: "",
      };
    },
  },
  updated() {
    // console.log("ADD EVEnt updated");
    // console.log(this.event);
    //this.setFormToUpdate();
  },
  mounted() {
    // console.log("mounted");
  },
  created() {},
};
</script>
