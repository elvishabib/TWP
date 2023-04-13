<template>
    <div class="container">
        <fieldset>
            <legend>Post n° {{ this.$route.params.id }}</legend>

            <div class="form-group">
                <label class="form-label mt-4">Titre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer un titre"
                    v-model="this.title" />
            </div>

            <div class="form-group">
                <label for="exampleTextarea" class="form-label mt-4">Contenu</label>
                <textarea class="form-control" id="exampleTextarea" rows="3" v-model="this.content"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleSelect1" class="form-label mt-4">A mettre dans la catégorie :</label>
                <select class="form-select" id="exampleSelect1" v-model="this.newCatId">
                    <option :value="cat.id" v-for="cat in this.categories" :key="cat.name">{{ cat.name }}</option>
                </select>
            </div>

            <br>

            <div class="list-group">
                <div class="list-group-item list-group-item-action" v-for="comment in this.comments" :key="comment.date">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Auteur : {{ comment.author }}</h5>
                        <small>{{ comment.date }}</small>
                    </div>
                    <p class="mb-1" v-html="comment.content.rendered"></p>
                    <div class="delEditComment">
                        <button v-on:click="this.delete(comment.id)"><img src="../assets/trash.svg" alt="Supprimer"
                                style="height: 20px; width: auto;"></button>
                        <button v-on:click="this.edit(comment.id)"><img src="../assets/pencil-square.svg" alt="Editer"
                                style="height: 20px; width: auto;"></button>
                    </div>
                </div>
            </div>

            <br>

            <button type="submit" class="btn btn-primary" v-on:click="this.submit()">Valider</button>
        </fieldset>

        <br>

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
            categories: [],
            newCatId: this.$route.params.idCat,
        }
    },

    methods:
    {
        getPost() {

            let request = "http://localhost:3000/wp-json/wp/v2/posts/" + this.$route.params.id;

            axios
                .get(request)
                .then((response) => {
                    this.title = response.data.title.rendered;
                    this.content = response.data.content.rendered;
                });
        },

        getCategories() {
            let request = "http://localhost:3000/wp-json/wp/v2/categories/";

            axios
                .get(request)
                .then((response) => {
                    this.categories = response.data;
                });
        },

        getComments() {
            let request = "http://localhost:3000/wp-json/wp/v2/comments/";

            axios
                .get(request)
                .then((response) => {
                    for (let comment of response.data) {
                        if (comment.post == this.$route.params.id) {
                            this.comments.push(
                                {
                                    id: comment.id,
                                    author: comment.author_name,
                                    date: comment.date,
                                    content: comment.content,
                                    post: comment.post,
                                });
                        }
                    }
                });
        },

        submit() {
            const headers = {
                'Authorization': 'Bearer ' + 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjMwMDAiLCJpYXQiOjE2ODAwOTc2OTgsIm5iZiI6MTY4MDA5NzY5OCwiZXhwIjoxNjgwNzAyNDk4LCJkYXRhIjp7InVzZXIiOnsiaWQiOjEsImRldmljZSI6IiIsInBhc3MiOiJhOThjY2RjYTQ4ZmU5ZDkwNmUyMmRiM2M2NDk2N2E5YSJ9fX0.e9Fm2-Tc7nuy9STigBm_eFMv1xiYc_BdvNcjv_KMyV0'
            };

            axios.post('http://localhost:3000/wp-json/wp/v2/posts/' + this.$route.params.id,
                {
                    title: this.title,
                    status: "publish",
                    categories: this.newCatId,
                    comment_status: "open",
                    content: this.content,
                    excerpt: "Content"
                }, { headers })
                .then(() => {
                    this.$router.push("/");
                });
        },

        delete(comment_id) {
            this.$router.push({ name: 'deleteComment', params: { id: comment_id, post_id: this.$route.params.id } });
        },

        edit(comment_id) {
            this.$router.push({ name: 'editComment', params: { id: comment_id, post_id: this.$route.params.id } });
        }
    },

    mounted() {
        this.getPost();
        this.getComments();
        this.getCategories();
    }
}
</script>