<template>
  <div class="">
    <div class="" v-for="(user, index) in list_users" :key="index">
      <div v-if="user.id != currentUser.id" class="border p-2 my-1 rounded">
        {{ user.name }}
      </div>
    </div>
  </div>
</template>

<script>
import BASE_URL from "../../axios";

export default {
  name: "users-list",

  data() {
    return {
      list_users: [],
      currentUser: null,
    };
  },
  mounted() {
    window.Echo.channel("active-users").listen("ActiveUsers", (e) => {
      console.log("aktywni uzytkownicy");
      this.currentUser = this.$store.getters.user;
        console.log(this.currentUser.name);
      this.list_users = e.users;
    });
  },
  methods: {
    getActiveUsers() {
      axios
        .get(BASE_URL + "api/usersList/" + this.$route.params.id)
        .then((res) => {
          this.list_users = res.data.users;
        })
        .catch((err) => {
          console.log("Nie powiodło się ");
        });
    },
  },

  created() {
    this.getActiveUsers();
  },
};
</script>
