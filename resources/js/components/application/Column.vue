<template>
  <div class="board__list">
    <div class="board__list-header">
      <h2 class="board__list-title">{{ title }}</h2>
      <button class="delete-list-btn" @click="deleteList">X</button>
    </div>
    <draggable class="card-container" v-model="listItem.cards" group="shared-cards" @start="onstart" @end="onEnd">
      <card v-for="card in listItem.cards" :card="card" :key="card.id" @cardClick="showCardDetails"/>
    </draggable>

    <card-details :card="selectedCard" v-if="showModal" :showModal="showModal" @close="showModal=false"
                  @save="saveData"/>
  </div>

</template>

<script>
import draggable from 'vuedraggable';
import Card from "./Card.vue";
import CardDetails from "./modals/CardDetails.vue";
import httpClient from "../../client";

export default {
  components: {
    Card,
    draggable,
    CardDetails
  },
  props: {
    listItem: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      drag: false,
      showModal: false,
      selectedCard: null
    }
  },
  computed: {
    title() {
      return this.listItem.title
    },
  },
  methods: {
    deleteList() {
      httpClient.delete(`/lists/${this.listItem.id}`)
          .then(({data: {data}}) => {
            this.$emit('delete-list', data);
          })
          .catch(error => {
            console.log(error);
          });
    },
    onstart(event) {
      this.drag = true
      console.log('Drag started')
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
    },

    showCardDetails(card) {
      this.selectedCard = card;
      this.showModal = true;
    },
    saveData(data) {
      console.log(data);
    }

  }
}
</script>
<style scoped lang="scss">
.board__list-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.delete-list-btn {
  /* Style your button */
  cursor: pointer;
  background-color: red;
  color: white;
  border: none;
  border-radius: 4px;
  padding: 5px 10px;
  margin-left: 10px;
}

</style>
