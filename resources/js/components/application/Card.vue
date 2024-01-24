<template>
  <div>
    <div class="board__card" @click="showCardDetails">{{card.title}}</div>

  </div>

</template>

<script>
export default {
  name: "Card",

  data() {
    return {
      showModal: false
    }
  },
  props: {
    card: {
      type: Object,
      required: true
    }
  },
  methods: {
    showCardDetails() {
      this.$emit('cardClick', this.card)
    }
  }
}
</script>
<style scoped lang="scss">

</style>
