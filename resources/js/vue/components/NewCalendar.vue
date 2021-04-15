<template>
  <div>
    <h4>Stwórz nowy</h4>

    <form>
      <div class="form-row">
        <div class="form-group col-md-6">
          <input type="text" class="form-control" id="inputName" placeholder="Nazwa" />
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <input type="text" class="form-control" id="inputRok" placeholder="rok" />
        </div>
        <div class="form-group col-md-2">
          <button class="btn btn-primary btn-block">Nowy</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "newCalendar",
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
