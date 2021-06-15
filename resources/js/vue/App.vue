<template>
  <div v-if="isLoaded" class="">
    <Nav />
    <router-view />
    <Footer />
  </div>
</template>
<script>
import Nav from "./components/nav/Nav";
import Login from "./components/auth/Login";
import Footer from "./components/footer/FooterApp";
import { mapGetters } from "vuex";
import BASE_URL from "./axios";

export default {
  name: "App",
  components: { Nav, Login, Footer },
  computed: {
    ...mapGetters(["user"]),
  },
  data() {
    return {
      isLoaded: false,
    };
  },
  methods: {
    getUser() {
      axios
        .get(BASE_URL + "api/user")
        .then((res) => {
          this.$store.dispatch("user", res.data);
          console.log(res.data);
          this.setIsLoaded();
          //console.log(this.$store.getters.user);
        })
        .catch((err) => {
          this.setIsLoaded();
          this.$router.push("/login");
          console.log(err);
        });
    },
    setIsLoaded() {
      this.isLoaded = true;
    },
  },
  created() {
    this.getUser();
  },
};
</script>
