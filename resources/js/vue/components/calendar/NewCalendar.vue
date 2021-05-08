<template>
  <div>
    <h4>Stwórz nowy</h4>

    <form @submit.prevent="onSubmit">
        <ErrorInput v-if="errors" :message="errors.name[0]"/>
      <div class="form-row">
        <div class="form-group col-md-6">
          <input type="text" class="form-control" id="inputName" placeholder="Nazwa" name='name' v-model="form.name" />
        </div>
      </div>
      <ErrorInput v-if="errors" :message="errors.year[0]"/>
      <div class="form-row">
        <div class="form-group col-md-4">
          <input type="text" class="form-control" id="inputRok" placeholder="rok" name='year' v-model="form.year" />
        </div>
        <div class="form-group col-md-2">
          <button class="btn btn-primary btn-block" type="submit">Nowy</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import ErrorInput from '../errors/ErrorInput';

export default {
    components:{
      ErrorInput,
    },
  name: "newCalendar",
  data() {
      return {
          errors:"",
          form:{
              name:"",
              year:"",
          }
      }
  },
  methods:{
      onSubmit(){
          axios.post('api/calendar/create', this.form).then(res =>{
                this.form.name = "";
                this.form.year = "";
                if(res.data.errors){
                    this.errors = res.data.errors;
                }
                this.$emit("reloadlist");

              }).catch(err=>{
                  console.log(err);
              });
      }
  }
};
</script>

<style>
form {
  margin-bottom: 4em;
  margin-top: 1em;
  padding: 20px;
  border-top: 1px solid rgb(204, 203, 203);
}

h4 {
  padding-left: 20px;
}
</style>
