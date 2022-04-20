<template>
  <div>
    <Profile />
    <Ongoing />
  </div>
</template>
<script>
import Profile from "./Profile.vue";
import Ongoing from "./components/Ongoing.vue";

export default {
  components: {
    Profile,
    Ongoing,
  },
};
</script>
