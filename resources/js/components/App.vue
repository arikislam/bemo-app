<template>
  <div class="container">
    <!-- Navigation -->
    <nav class="navbar">
      <div class="navbar__logo">MyApp</div>
      <ul class="navbar__menu">
        <li class="navbar__item"><a href="#">Home</a></li>
        <li class="navbar__item"><a href="#">About</a></li>
        <li class="navbar__item"><a href="#">Services</a></li>
        <li class="navbar__item"><a href="#">Contact</a></li>
      </ul>
    </nav>

    <!-- Board -->
    <div class="board">
      <!-- List 1 -->
      <div class="board__list">
        <h2 class="board__list-title">List 1</h2>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <div class="board__card">Card 2</div>
        <div class="board__card">Card 1</div>
        <!-- Add more cards here -->
      </div>

      <!-- List 2 -->
      <div class="board__list">
        <h2 class="board__list-title">List 2</h2>
        <div class="board__card">Card 1</div>
        <!-- Add more cards here -->
      </div>


      <!-- List 2 -->
      <div class="board__list">
        <h2 class="board__list-title">List 2</h2>
        <div class="board__card">Card 1</div>
        <!-- Add more cards here -->
      </div>


      <!-- List 2 -->
      <div class="board__list">
        <h2 class="board__list-title">List 2</h2>
        <div class="board__card">Card 1</div>
        <!-- Add more cards here -->
      </div>


      <!-- List 2 -->
      <div class="board__list">
        <h2 class="board__list-title">List 2</h2>
        <div class="board__card">Card 1</div>
        <!-- Add more cards here -->
      </div>


      <!-- List 2 -->
      <div class="board__list">
        <h2 class="board__list-title">List 2</h2>
        <div class="board__card">Card 1</div>
        <!-- Add more cards here -->
      </div>


      <!-- List 2 -->
      <div class="board__list">
        <h2 class="board__list-title">List 2</h2>
        <div class="board__card">Card 1</div>
        <!-- Add more cards here -->
      </div>


      <!-- List 2 -->
      <div class="board__list">
        <h2 class="board__list-title">List 2</h2>
        <div class="board__card">Card 1</div>
        <!-- Add more cards here -->
      </div>


      <!-- Add more lists here -->
    </div>
  </div>
</template>

<script>
export default {
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

.board {
  display: flex;
  flex-wrap: nowrap;
  padding: 20px 0;
  background-color: #e2e4e6;
  gap: 10px;
  overflow-x: auto;
  min-height: 700px;

  &__list {
    background-color: white;
    flex: 0 0 300px;
    padding: 10px;
    border-radius: 3px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.3);
    min-width: 300px;

    &-title {
      margin-bottom: 10px;
      color: #333;
    }
  }

  &__card {
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 6px 8px;
    margin-bottom: 10px;
    border-radius: 3px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.3);
  }
}

@media (max-width: 768px) {
  .navbar__menu {
    flex-direction: column;
    align-items: center;

    .navbar__item {
      margin-bottom: 10px;
    }
  }

  .board {
    flex-direction: column;
    flex-wrap: wrap;

    &__list {
      flex-basis: 100%;
      min-width: 0;
    }
  }
}
</style>

