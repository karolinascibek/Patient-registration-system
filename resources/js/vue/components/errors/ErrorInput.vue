<template>
  <div class="form-row">
    <div class="form-group text-info col-md-12 p-2  m-1 rounded">
        {{message}}
    </div>
  </div>
</template>

<script>
export default {
  name: "ErrorInput",
  props:['message']
};
</script>
