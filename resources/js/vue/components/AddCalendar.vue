<template>
  <div>
    <h4>Doołącz do kalendarza</h4>

    <form>
      <div class="form-row">
        <div class="form-group col-md-4">
          <input type="text" class="form-control" placeholder="Kod" />
        </div>
        <div class="form-group col-md-2">
          <button class="btn btn-primary btn-block"> Dołącz</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "addCalendar",
};
</script>


<style >
    form{
        margin-bottom: 4em;
        margin-top: 1em;
        padding: 20px;
        border-top: 1px solid rgb(204, 203, 203);
        background-color: #f7f7f7;
    }

    h4{
        padding-left: 20px;
    }

</style>

