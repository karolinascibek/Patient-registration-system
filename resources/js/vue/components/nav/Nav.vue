<template>
  <div class="border-bottom bg-white">
    <ul class="nav justify-content-end py-3">
      <!-- <li class="border-right nav-item ">
                <router-link :to="{name:'home'}" class="nav-link btn btn-link">Home</router-link>
            </li> -->
      <li class="border-right nav-item" v-if="!user">
        <router-link :to="{ name: 'login' }" class="nav-link btn btn-link"
          >Zaloguj się</router-link
        >
      </li>
      <li class="nav-item" v-if="!user">
        <router-link :to="{ name: 'signup' }" class="nav-link btn btn-link"
          >Zarejestruj się</router-link
        >
      </li>
      <!-- <li class=" nav-item ">
                <router-link :to="{name:'home'}" class="nav-link btn btn-link">Check Visit</router-link>
            </li> -->
      <li class="nav-item" v-if="user">
        <a v-if="user" class="nav-link btn btn-link text-dark">{{ user.name }} {{ user.email }}</a>
      </li>
      <li class="nav-item" v-if="user">
        <a href="javascript:void(0)" @click="handelClick" class="nav-link btn btn-link"
          >Wyloguj</a
        >
      </li>
    </ul>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import BASE_URL from '../../axios';

export default {
  name: "Nav",
  props: ["auth"],
  computed: {
    ...mapGetters(["user"]),
  },
  data() {
    return {};
  },
  methods: {
    handelClick() {
      axios
        .post(BASE_URL+"api/logout", {})
        .then((res) => {
          localStorage.removeItem("token");
          this.$store.dispatch("user", null);

          this.$router.push("/login");
        })
        .catch((err) => {
          console.log(err);
        });
    },

    created() {
    },
  },
};
</script>

<style scoped>
.btn:focus {
  border: 0px solid white;
  box-shadow: 0 0 0 white;
  border-radius: 0;
  border-bottom: 2px solid green;
}
.color {
  border-bottom: 2px solid green;
}
.nav-link:focus {
  border-bottom: 2px solid green;
}
</style>
