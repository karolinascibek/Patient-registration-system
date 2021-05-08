<template>
  <div>
    <form>
      <div class="form-row">
        <div class="col-md-12 mb-3">
          <label for="validationDefault01">Treść wydarzenia</label>
          <input
            type="text"
            class="form-control"
            id="validationDefault01"
            value="Mark"
            required
          />
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-2 mb-3">
          <label for="validationDefault03">dzień</label>
          <input type="number" class="form-control" id="validationDefault03" required />
        </div>
        <div class="col-md-2 mb-3">
          <label for="validationDefault03">miesiąc</label>
          <input type="number" class="form-control" id="validationDefault03" required />
        </div>
        <div class="col-md-2 mb-3">
          <label for="validationDefault03">rok</label>
          <input type="number" class="form-control" id="validationDefault03" required />
        </div>
      </div>
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
          <input type="number" class="form-control" id="validationDefault03" required />
        </div>
        <div class="col-md-2 mb-3">
          <label for="validationDefault03">minuty</label>
          <input type="number" class="form-control" id="validationDefault03" required />
        </div>

        <div class="col-md-2 mb-3"></div>
        <div class="col-md-2 mb-3"></div>

        <div class="col-md-2 mb-3">
          <label for="validationDefault03">godzina</label>
          <input type="number" class="form-control" id="validationDefault03" required />
        </div>
        <div class="col-md-2 mb-3">
          <label for="validationDefault03">minuty</label>
          <input type="number" class="form-control" id="validationDefault03" required />
        </div>
      </div>
      <button class="btn btn-primary" type="submit">Dodaj</button>
    </form>
  </div>
</template>
<script>
export default {
  name: "calendar-component",
};
</script>
