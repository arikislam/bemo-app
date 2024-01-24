<template>
  <div class="container">
    <nav-bar/>
    <RouterView/>
  </div>
</template>

<script>

const NavBar = require('./Nav.vue').default
export default {
  components: {
    NavBar
  }
  // Component logic
}
</script>

<style scoped lang="scss">
$scrollbar-color: #888;
$scrollbar-hover-color: #555;
$scrollbar-width: 8px;

* {
  scrollbar-width: thin;
  scrollbar-color: $scrollbar-color transparent;
}

/* For Webkit browsers */
*::-webkit-scrollbar {
  width: $scrollbar-width;
  height: $scrollbar-width;
}

*::-webkit-scrollbar-track {
  background: transparent;
}

*::-webkit-scrollbar-thumb {
  background-color: $scrollbar-color;
  border-radius: 10px;
  border: 3px solid transparent;
}

*::-webkit-scrollbar-thumb:hover {
  background-color: $scrollbar-hover-color;
}

.container {
  max-width: 1200px;
  margin: auto;
  padding: 0 15px;
  height: 100vh;
  overflow-y: auto;
}
</style>

