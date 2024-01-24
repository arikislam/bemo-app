<template>
  <div class="board__card">{{card.title}}</div>
</template>

<script>

export default {
  name: "Card",
  props: {
    card: {
      type: Object,
      required: true
    }
  }
}
</script>
<style scoped lang="scss">

</style>
