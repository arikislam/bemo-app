<template>
  <div class="board__list">
    <div class="board__list-header">
      <h2 class="board__list-title">{{ title }} {{ listItem.id }}</h2>
      <button class="delete-list-btn" @click="deleteList">X</button>
    </div>
    <draggable class="card-container" v-model="listItem.cards" group="shared-cards" @start="onstart" @end="onEnd"
               @change="onMoved">
      <card v-for="card in listItem.cards" :card="card" :key="card.id" @cardClick="showCardDetails"/>
    </draggable>

    <button class="add-list-btn" @click="addCard">Add Card</button>

    <card-details :card="selectedCard"
                  v-if="showModal"
                  :showModal="showModal"
                  @close="showModal=false"
                  @update="saveData"/>
    <crete-card :show-modal="showCreateModal"
                v-if="showCreateModal"
                @close="showCreateModal=false"
                @create="createCard"/>
  </div>

</template>

<script>
import draggable from 'vuedraggable';
import Card from "./Card.vue";
import CardDetails from "./modals/CardDetails.vue";
import httpClient from "../../client";
import CreteCard from "./modals/CreateCard.vue";

export default {
  components: {
    CreteCard,
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
      selectedCard: null,
      showCreateModal: false,
      draggedCard: null
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
      this.drag = true;
    },
    onEnd(event) {
      this.drag = false
      this.updateListOrder();
    },
    updateListOrder() {
      this.listItem.cards.forEach((card, index) => {
        card.order = index;
      });
      const data = this.listItem.cards.map(card => {
        return {
          id: card.id,
          order: card.order
        }
      });

      httpClient.post(`lists/${this.listItem.id}/cards/order-update`, {data})
          .then(({data: {data}}) => {
            this.listItem.cards = data;
          })
          .catch(error => {
            console.log(error);
          });
    },

    showCardDetails(card) {
      this.selectedCard = card;
      this.showModal = true;
    },
    saveData(data) {
      httpClient.patch(`lists/${this.listItem.id}/cards/${data.id}`, data)
          .then(({data: {data : updatedCard}}) => {

            this.listItem.cards = this.listItem.cards.map(card => {
              if (card.id === updatedCard.id) {
                card.title = updatedCard.title;
                card.details = updatedCard.details;
              }
              return card;
            });
            this.showModal = false;
          })
          .catch(error => {
            console.log(error);
          });
      this.showModal = false;
    },
    addCard() {
      this.showCreateModal = true;
    },
    createCard(data) {
      httpClient.post(`lists/${this.listItem.id}/cards`, data)
          .then(({data: {data}}) => {
            this.listItem.cards.push(data);
            this.showCreateModal = false;
          })
          .catch(error => {
            console.log(error);
          });
    },
    onMoved({added}) {
      if (!added) {
        return;
      }
      const card = added.element;
      const newOrder = added.newIndex;

      httpClient.post(`lists/${this.listItem.id}/cards/${card.id}/move`, {order: newOrder})
          .then(({data: {data}}) => {
            this.$emit('fetch-lists');
          })
          .catch(error => {
            console.log(error);
          });
    },

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
