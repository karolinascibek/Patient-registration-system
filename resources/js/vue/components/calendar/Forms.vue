<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-11">
              <AddCalendar v-on:reloadlist="sendTo()" />
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-11">
              <NewCalendar v-on:reloadlist="sendTo()" />
            </div>
          </div>
    </div>
</template>

<script>

import AddCalendar from "./AddCalendar";
import NewCalendar from "./NewCalendar";

export default {
name:'forms',
components: {
    AddCalendar,
    NewCalendar,
  },
methods:{
    sendTo(){
         this.$emit("reloadlist");
    }
}
}


</script>
<style >

</style>
