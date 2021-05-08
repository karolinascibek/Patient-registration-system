<template>
  <div>
    <router-link :to="{ name: 'dashboard' }"
      ><span class="icon-style"><i class="fas fa-arrow-left"></i></span
    ></router-link>

    <div class=" p-2">
      <div class="bd-highlight p-2 px-4">
        <h3>{{ calendar.name }}</h3>
        <div class="d-flex flex-row bd-highlight text-center text-info">
          <h5>usuń</h5>
          <h5 class="pl-2">edytuj</h5>
        </div>
        <p class="text-secondary">created by: {{ owner.name }} {{ owner.last_name }}</p>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    name:'header-calendar-page',
    props:['calendar', 'owner']
}
</script>
