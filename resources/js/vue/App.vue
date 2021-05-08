<template>
  <div>
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
import BASE_URL from'./axios';

export default {
  name: "App",
  components: { Nav, Login, Footer },
  computed: {
    ...mapGetters(["user"]),
  },
  data() {
    return {};
  },
  methods: {
    getUser() {
      axios
        .get(BASE_URL+"api/user")
        .then((res) => {
          this.$store.dispatch("user", res.data);
          console.log(res.data)
          //console.log(this.$store.getters.user);
        })
        .catch((err) => {
          this.$router.push("/login");
          console.log(err);
        });
    },

  },
  created() {
    this.getUser();
  },
};
</script>
