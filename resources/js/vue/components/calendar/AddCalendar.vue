<template>
  <div>
    <h4>Dołącz do kalendarza</h4>

    <form @submit.prevent="addCalendar">
      <ErrorInput v-if="error" :message="error"/>
      <div class="form-row">
        <div class="form-group col-md-4">
          <input
            type="text"
            class="form-control"
            placeholder="Kod"
            name="code"
            v-model="addCalendarForm.code"
          />
        </div>
        <div class="form-group col-md-2">
          <button class="btn btn-primary btn-block" type="submit">Dołącz</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import ErrorInput from "../errors/ErrorInput";

export default {
  name: "addCalendar",
  components: {
    ErrorInput,
  },
  data() {
    return {
      error: "",
      addCalendarForm: {
        code: "",
      },
    };
  },
  methods: {
    addCalendar() {
      axios
        .post("api/calendar/add", this.addCalendarForm)
        .then((resp) => {
          console.log(resp.data);
          let data = resp.data;
          if (data.message) {
            this.setError(data.message);
          }

          this.$emit("reloadlist");
        })
        .catch((err) => {
          console.log(err);
        });
    },
    setError(value) {
      this.error = value;
    },
  },
};
</script>

<style>
form {
  margin-bottom: 4em;
  margin-top: 1em;
  padding: 20px;
  border-top: 1px solid rgb(204, 203, 203);
  background-color: #f7f7f7;
}

h4 {
  padding-left: 20px;
}
</style>
