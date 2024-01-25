<template>
  <div class="board__list">
    <div class="board__list-header">
      <h2 class="board__list-title">{{ title }}</h2>
      <button class="delete-list-btn" @click="deleteList">X</button>
    </div>
    <draggable class="card-container" v-model="listItem.cards" group="shared-cards" @start="onstart" @end="onEnd">
      <card v-for="card in listItem.cards" :card="card" :key="card.id" @cardClick="showCardDetails"/>
    </draggable>

    <button class="add-list-btn" @click="addCard">Add Card</button>

    <card-details :card="selectedCard" v-if="showModal" :showModal="showModal" @close="showModal=false"
                  @save="saveData"/>
    <crete-card :show-modal="showCreateModal" v-if="showCreateModal" @close="showCreateModal=false" @create="createCard"/>
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
      showCreateModal: false
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
    },
    addCard() {
     this.showCreateModal = true;
    },
    createCard(data) {
      httpClient.post('cards', {...data, list_id: this.listItem.id})
          .then(({data: {data}}) => {
            console.log(data);
            this.listItem.cards.push(data);
            this.showCreateModal= false;
          })
          .catch(error => {
            console.log(error);
          });
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
