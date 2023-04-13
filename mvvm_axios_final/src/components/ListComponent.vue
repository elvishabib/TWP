<template>
    <div class="list-group">
        <h2> <span id="po">{{ name }}</span>
        <span class="delEdit">
            <router-link :to="{ name: 'deleteList', params: { id: this.id } }"><img src="../assets/trash.svg" alt="Supprimer"
                    style="height: 20px; width: auto;"></router-link>
            <router-link :to="{ name: 'editList', params: { id: this.id } }"><img src="../assets/pencil-square.svg" alt="Editer"
                    style="height: 20px; width: auto;"></router-link>
        </span> </h2>
        <div  v-for="card in cards" :key="card.id">
            <div id="uni" class="list-group-item list-group-item-action active">
                <CardComponent :id="card.id" :title="card.title.rendered" :content="card.content.rendered"
                    :idCat="this.id" />
            </div>
        </div>
        <br>
        <ButtonNewCardComponent :idCat="this.id" />
    </div>
</template>

<script>
import CardComponent from "../components/CardComponent.vue"
import ButtonNewCardComponent from "../components/ButtonNewCardComponent.vue"
import axios from 'axios'

export default {
    name: "ListComponent",

    components: {
        CardComponent,
        ButtonNewCardComponent
    },

    props: ['id', 'name'],

    data: function () {
        return {
            cards: []
        }
    },

    methods: {
        getPosts() {
            let request = "http://localhost:3000/wp-json/wp/v2/posts?categories=" + this.id;
            axios
                .get(request)
                .then((response) => {
                    this.cards = response.data;
                });
        }
    },

    mounted() {
        this.getPosts()
    }
}
</script>

<style scoped>
#po {
    float:left   
}
.delEdit {
    float: right;
}
#uni {
    background-color: rgb(18, 17, 17);
}
/* #uni:nth-child(3n + 1) {
  background-color: rgb(0, 255, 153);
}
#uni:nth-child(2n+1) {
  background-color: rgb(229, 223, 43);
} */

 
</style>