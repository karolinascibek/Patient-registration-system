<template>
  <div class="row">
    <div class="col-12">
      <router-link :to="{ name: 'dashboard' }"
        ><span class="icon-style"><i class="fas fa-arrow-left"></i></span
      ></router-link>

      <div class="p-2">
        <div class="bd-highlight p-2 px-4">
          <h3>{{ calendar.name }}</h3>
          <div v-if="owner.id == user.id" >
            <div class="d-flex flex-row bd-highlight text-center text-info">
              <h5>usuń</h5>
              <h5 class="pl-2">edytuj</h5>
            </div>
            <p class="text-secondary">
              Kod: {{ calendar.code }}
            </p>
          </div>
          <p class="text-secondary">created by: {{ owner.name }} {{ owner.last_name }}</p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "header-calendar-page",
  props: ["calendar", "owner"],
  data() {
    return {
      user: null,
    };
  },
  methods: {
    setUser() {
      this.user = this.$store.getters.user;
    },
  },
  created() {
    this.setUser();
  },
};
</script>
