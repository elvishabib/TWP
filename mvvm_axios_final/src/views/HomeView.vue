<template>
      <h2> EL-JU-RE MVVM PROJECT</h2>

  <div>
    <div id="Lists">
      <div v-for="list in lists" :key="list.id" class="list">
        <ListComponent :name="list.name" :id="list.id" />
      </div>
      <ButtonNewListComponent />

    </div>
  </div>
</template>

<script>
import ListComponent from '@/components/ListComponent.vue'
import ButtonNewListComponent from "../components/ButtonNewListComponent.vue"
import axios from 'axios'

export default {
  name: 'HomeView',
  components: {
    ListComponent,
    ButtonNewListComponent
  },

  data: function () {
    return {
      lists: []
    }
  },

  methods: {
    getLists() {
      let request = "http://localhost:3000/wp-json/wp/v2/categories";

      axios
        .get(request)
        .then((response) => {
          this.lists = response.data.filter((val) => val.id !== 1);
        });
    }
  },

  mounted() {
    this.getLists()
  }
}
</script>

<style scoped>
#Lists {
  display: flex;
justify-content: space-between;
}
.list {
  min-height: 10vh;
  border: 1px solid black;
  margin: 1%;
  background-color: rgb(154, 155, 157);
  border-radius: 6px;
}
.list:nth-child(2n + 1) {
  background-color: rgb(0, 255, 153);
}
.list:nth-child(3n) {
  background-color: rgb(229, 223, 43);
}
</style>