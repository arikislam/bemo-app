<template>
  <div class="board">
    <draggable class="board__draggable" v-model="lists" group="lists" @start="onstart" @end="onEnd" @update-cards="handleCardUpdate">
      <list-item v-for="listItem in lists" :listItem="listItem" :key="listItem.id"/>
      <div class="board__list" :draggable="false">
        <button class="add-list-btn" @click="addList">Add List</button>
      </div>
    </draggable>

  </div>
</template>

<script>
import draggable from 'vuedraggable';
import ListItem from '../components/application/Column.vue';
import Card from "../components/application/Card.vue";

export default {
  name: "Board",
  components: {
    Card,
    ListItem,
    draggable
  },
  data() {
    return {
      drag: false,
      lists: [
        {
          "id": 1,
          "title": "List 1",
          "order": 0,
          "cards": [
            {
              "id": 1,
              "title": "List 1 Card 1",
              "details": "Card details 1",
              "order": 0
            },
            {
              "id": 2,
              "title": "List 1 Card 2",
              "details": "Card details 2",
              "order": 1
            }
          ]
        },
        {
          "id": 2,
          "title": "List 2",
          "order": 1,
          "cards": [
            {
              "id": 1,
              "title": "List 2 Card 1",
              "details": "Card details 1",
              "order": 0
            },
            {
              "id": 2,
              "title": "List 2 Card 2",
              "details": "Card details 2",
              "order": 1
            }
          ]
        },
        {
          "id": 3,
          "title": "List 3",
          "order": 2,
          "cards": [
            {
              "id": 1,
              "title": "List 3 Card 1",
              "details": "Card details 1",
              "order": 0
            },
            {
              "id": 2,
              "title": "List 3 Card 2",
              "details": "Card details 2",
              "order": 1
            }
          ]
        },
        {
          "id": 4,
          "title": "List 4",
          "order": 3,
          "cards": [
            {
              "id": 1,
              "title": "List 4 Card 1",
              "details": "Card details 1",
              "order": 0
            },
            {
              "id": 2,
              "title": "List 4 Card 2",
              "details": "Card details 2",
              "order": 1
            }
          ]
        },
        {
          "id": 5,
          "title": "List 5",
          "order": 4,
          "cards": [
            {
              "id": 1,
              "title": "List 5 Card 1",
              "details": "Card details 1",
              "order": 0
            },
            {
              "id": 2,
              "title": "List 5 Card 2",
              "details": "Card details 2",
              "order": 1
            }
          ]
        }
      ]
    }
  },
  methods: {
    addList() {
      console.log('add list')
    },
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

      console.log(this.lists)
    },
    updateListOrder() {
      this.lists.forEach((list, index) => {
        list.order = index;
      });
    },
    handleCardUpdate({ listId, cards }) {
      const listToUpdate = this.lists.find(list => list.id === listId);
      if (listToUpdate) {
        listToUpdate.cards = cards;
      }
    }

  }
}
</script>

<style lang="scss">
.board {
  display: flex;
  flex-wrap: nowrap;
  padding: 20px 30px;
  background-color: #e2e4e6;
  gap: 10px;
  overflow-x: auto;
  min-height: 700px;


  &__draggable {
    display: flex;
    flex-wrap: nowrap;
    gap: 10px;
    width: 100%;
  }

  &.dragging {
    background-color: lighten(#e2e4e6, 10%);
  }

  &__list {
    background-color: white;
    flex: 0 0 300px;
    padding: 10px;
    border-radius: 3px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
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
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
  }
}

.add-list-btn {
  /* Style for your Add List button */
  cursor: pointer;
  background-color: #4CAF50; /* Example style */
  color: white;
  border: none;
  border-radius: 4px;
  padding: 8px 16px;
  margin: 20px 0;
  width: 100%;
}

@media (max-width: 768px) {
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
