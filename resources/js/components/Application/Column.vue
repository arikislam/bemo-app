<template>
  <div class="board__list">
    <h2 class="board__list-title">{{title}}</h2>
    <draggable class="card-container" v-model="listItem.cards"group="shared-cards" @start="onstart" @end="onEnd">
      <card v-for="card in listItem.cards" :card="card" :key="card.id" />
    </draggable>
  </div>
</template>

<script>
import draggable from 'vuedraggable';
import Card from "./Card.vue";
  export default {
    components: {
      Card,
      draggable
    },
    props: {
      listItem: {
        type: Object,
        required: true
      }
    },
    data() {
      return {
        drag: false
      }
    },
    computed : {
      title() {
        return this.listItem.title
      },
    },
    methods: {
      onstart(event) {
        this.drag = true
        console.log('Drag started')
        // Handle the start of the dragging
      },
      onEnd(event) {
        this.drag = false
        console.log('Drag ended')
        // Handle the end of the dragging
        this.updateListOrder();

        console.log(this.listItem.cards);
      },
      updateListOrder() {
        this.listItem.cards.forEach((card, index) => {
          card.order = index;
        });
      }
    }
  }
</script>
<style scoped lang="scss">
</style>
