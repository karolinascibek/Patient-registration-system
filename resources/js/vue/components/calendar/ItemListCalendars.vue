<template>
  <div>
    <router-link :to="{ name:'calendar', params:{id:item.id} }" class="item-list-router">
      {{ item.name }}
    </router-link>
  </div>
</template>

<script>
export default {
  name: "item",
  props: ["item"],
};
</script>
<style>
.item-list-router:hover {
  text-decoration: none;
}
</style>
