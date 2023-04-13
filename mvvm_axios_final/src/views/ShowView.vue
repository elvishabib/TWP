<template>
          <!--MODIFICATION-->
<div id="container"> 
<div>
    <div class="container" >

<fieldset>
    <legend>Ajouter des commentaires</legend>

    <div class="form-group">
        <label class="form-label mt-4">Auteur name:</label>
        <input type="text" class="form-control" placeholder="Super auteur" v-model="this.newAuthor">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1" class="form-label mt-4">Auteur Mail :</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Votre adresse mail" v-model="this.newEmail">
    </div>

    <div class="form-group">
        <label for="exampleTextarea" class="form-label mt-4">Contenu</label>
        <textarea class="form-control" id="exampleTextarea" rows="3" v-model="this.newContent"></textarea>
    </div>

    <br>

    <button type="submit" class="btn btn-primary" v-on:click="this.submit()">Valider</button>
</fieldset>
</div> 
</div>
      <br><div class="cool">
         <div class="card" style="max-width: 60rem;">
            <div class="card-header"><h3>Carte</h3></div>
            <div class="card-body">
                <h4 class="card-title cardData" v-html="this.title"></h4>
                <p class="card-text" v-html="this.content"></p>
            </div>
        </div>
        <div v-for="comment in this.comments" :key="comment.id">
            <div id="comment">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1" v-html="comment.author"></h5>
                    <small class="text-muted" v-html="comment.date"></small>
                </div>
                <p class="mb-1" v-html="comment.content"></p>
            </div>
        </div>
        </div>
        </div>
 </template>

<script>
import axios from 'axios'

export default {

    data: function () {
        return {
            title: "",
            content: "",
            comments: [],
            newAuthor: "",
            newContent: "",
            newEmail: ""
        }
    },

    methods: {
        getCard() {
            let request = "http://localhost:3000/wp-json/wp/v2/posts/" + this.$route.params.id;

            axios
                .get(request)
                .then((response) => {
                    this.title = response.data.title.rendered;
                    this.content = response.data.content.rendered;
                });
        },

        getComments() {
            this.comments = [];

            let request = "http://localhost:3000/wp-json/wp/v2/comments";

            axios
                .get(request)
                .then((response) => {

                    for (let comment of response.data) {
                        if (comment.post == this.$route.params.id) {
                            this.comments.push({
                                author: comment.author_name,
                                content: comment.content.rendered,
                                date: comment.date,
                            });

                            console.log(comment);
                        }
                    }
                });
        },

        submit() {
            let request = "http://localhost:3000/wp-json/wp/v2/comments";

            const headers = {
                'Authorization': 'Bearer ' + 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjMwMDAiLCJpYXQiOjE2ODAwOTc2OTgsIm5iZiI6MTY4MDA5NzY5OCwiZXhwIjoxNjgwNzAyNDk4LCJkYXRhIjp7InVzZXIiOnsiaWQiOjEsImRldmljZSI6IiIsInBhc3MiOiJhOThjY2RjYTQ4ZmU5ZDkwNmUyMmRiM2M2NDk2N2E5YSJ9fX0.e9Fm2-Tc7nuy9STigBm_eFMv1xiYc_BdvNcjv_KMyV0'
            };

            axios.post(request,
                {
                    author_name: this.newAuthor,
                    author_url: "http://localhost:3000",
                    author_email: this.newEmail,
                    content: this.newContent,
                    post: this.$route.params.id,
                    status: "approved",
                },
                { headers }).then(() => {

                    this.getComments();

                });
        }
    },

    mounted() {
        this.getCard();
        this.getComments();
    }
}
</script>

 <style scoped>
 
 /* #cardDetail {
    display: flex;
    border-style:solid;
    background-color: rgb(232, 245, 236);
    border:5px;
    width: 50%;
  } */
#container {
    display: flex;
    justify-content: space-between;
    }
    .container {
        background-color: rgb(227, 235, 235);
        margin-top: 35%;
     }
     .cool{
        margin-left: 10%;
      }
#comment {
     width: 100%;
    border: solid 1px;
    border-radius: 5px;
    border-color: rgb(26, 24, 24);
    margin-bottom: 10px;
    background-color:whitesmoke;
    margin-top: 3%;
} 
.card .card-header {
    background-color: aqua;
}
</style>