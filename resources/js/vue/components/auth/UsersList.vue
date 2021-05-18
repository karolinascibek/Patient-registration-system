<template>
  <div class="">
    <div class="border bg-info p-2 my-1 rounded text-white"  v-for="(user, index) in list_users" :key="index">
        {{user.name}}
    </div>
  </div>
</template>

<script>

import BASE_URL from "../../axios";

export default {
  name: "users-list",

  data() {
      return {
          list_users:[],
      }
  },

  created() {
      axios.get(BASE_URL+"api/usersList/"+this.$route.params.id).then(
          res=>{
              console.log(res.data)
              this.list_users = res.data.users;
          }
      ).catch(err=>{
          console.log("Nie powiodło się ")
      })
  },
};
</script>
