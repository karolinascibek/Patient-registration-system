<template>
  <div>
    <form @submit.prevent>
      <div class="form-row">
        <div class="col-md-12 mb-3">
          <label for="validationDefault01">Treść wydarzenia</label>
          <input
            type="text"
            class="form-control"
            id="validationDefault01"
            value="Mark"
            name="contains"
            v-model="form.contents"
          />
        </div>
      </div>
       <ErrorInput v-if="errors" :message="errors.contents[0]" />
      <div class="form-row">
        <div class="col-md-2 mb-3">
          <label for="validationDefault03">dzień</label>
          <input
            type="number"
            class="form-control"
            id="validationDefault03"
            name="day"
            v-model="form.day"
          />
        </div>
        <div class="col-md-2 mb-3">
          <label for="validationDefault03">miesiąc</label>
          <input
            type="number"
            class="form-control"
            id="validationDefault03"
            name="month"
            v-model="form.month"
          />
        </div>

        <div class="col-md-2 mb-3">
          <label for="validationDefault03">rok</label>
          <input
            type="number"
            class="form-control"
            id="validationDefault03"
            name="year"
            v-model="form.year"
          />
        </div>
      </div>

       <ErrorInput v-if="errors" :message="errors.day[0]" />
       <ErrorInput v-if="errors" :message="errors.month[0]" />
       <ErrorInput v-if="errors" :message="errors.year[0]" />

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
            v-model="form.hour_start"
          />
        </div>
        <div class="col-md-2 mb-3">
          <label for="validationDefault03">minuty</label>
          <input
            type="number"
            class="form-control"
            id="validationDefault03"
            name="minutes_start"
            v-model="form.minutes_start"
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
            v-model="form.hour_end"
          />
        </div>
        <div class="col-md-2 mb-3">
          <label for="validationDefault03">minuty</label>
          <input
            type="number"
            class="form-control"
            id="validationDefault03"
            name="minutes_end"
            v-model="form.minutes_end"
          />
        </div>
      </div>
      <ErrorInput v-if="errors" :message="errors.hour_start[0]" />
      <ErrorInput v-if="errors" :message="errors.minutes_start[0]" />
      <ErrorInput v-if="errors" :message="errors.hour_end[0]" />
      <ErrorInput v-if="errors" :message="errors.minutes_end[0]" />
      <button @click="addEvent" class="btn btn-primary" type="submit">Dodaj</button>
    </form>

  </div>
</template>


<script>
import BASE_URL from "../../axios";
import ErrorInput from "../errors/ErrorInput"

export default {

  name: "calendar-component",
  components:{
      ErrorInput,
  },
  data() {
    return {
      status: false,
      form: {
        contents: "",
        day: "",
        month: "",
        year: "",
        hour_start: "",
        minutes_start: "",
        hour_end: "",
        minutes_end: "",
      },
      errors:null,
    };
  },
  methods: {
    reloadEvents() {
      console.log("add Event");
      if (this.status == false) {
        this.status = true;
      } else {
        this.status = false;
      }
      this.$emit("clicked", this.status);
    },
    setEmptyValue(){
        this.form = {};
    },
    addEvent() {
        axios.post(BASE_URL+"api/calendar/"+this.$route.params.id+"/event/create",this.form)
        .then(res=>{
            this.errors=res.data.errors;
            if(this.errors){
                this.form = res.data.form;
            }
            else{
                this.setEmptyValue();
            }
            this.reloadEvents();
        }).catch(err=>{
            console.log(err)
        })
    },
  },
};
</script>
