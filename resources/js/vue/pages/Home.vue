<template>
  <div class="row justify-content-center mt-4">
    <div class="col-4">dfsd</div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "home",
  computed: {
    ...mapGetters(["user"]),
  },
  data() {
    return {
      message: "Log in",
    };
  },
  methods: {

  },

};
</script>
