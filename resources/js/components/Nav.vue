<template>
  <nav class="navbar">
    <div class="navbar__logo">BEMO App</div>
    <ul class="navbar__menu">
      <li class="navbar__item">
        <RouterLink :to="{name: 'home'}" class="navbar__item__link">Home</RouterLink>
      </li>
      <li class="navbar__item">
        <RouterLink :to="{name: 'manage-application'}" class="navbar__item__link">Manage Application</RouterLink>
      </li>
    </ul>
  </nav>
</template>
<script>
export default {
  name: "Nav"
}
</script>

<style scoped lang="scss">
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 0;

  &__logo {
    font-size: 24px;
    font-weight: bold;
  }

  &__menu {
    list-style: none;
    display: flex;

    &__item {
      margin-left: 20px;

      &__link {
        text-decoration: none;
        color: #333;
        transition: color 0.3s;

        &:hover {
          color: #555;
        }
      }
    }
  }
}
.navbar__item {
  margin-left: 20px;
}
@media (max-width: 768px) {
  .navbar__menu {
    flex-direction: column;
    align-items: center;

    .navbar__item {
      margin-bottom: 10px;
    }
  }
}
</style>
