<template>
    <div class="container">
        <div>
            <fieldset>
                <legend>Nouvelle carte</legend>

                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label mt-4">Titre</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        placeholder="Entrez le titre de la carte" v-model="this.title" />
                </div>

                <div class="form-group">
                    <label for="exampleTextarea" class="form-label mt-4">Contenu</label>
                    <textarea class="form-control" id="exampleTextarea" rows="3" v-model="this.content"></textarea>
                </div>

                <br>

                <button class="btn btn-primary" v-on:click="this.submit()">Valider</button>
            </fieldset>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data: function () {
        return {
            title: "Votre titre ici",
            content: "Votre contenu ici"
        }
    },

    methods: {
        submit() {

            const headers = {
                'Authorization': 'Bearer ' + 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjMwMDAiLCJpYXQiOjE2ODAwOTc2OTgsIm5iZiI6MTY4MDA5NzY5OCwiZXhwIjoxNjgwNzAyNDk4LCJkYXRhIjp7InVzZXIiOnsiaWQiOjEsImRldmljZSI6IiIsInBhc3MiOiJhOThjY2RjYTQ4ZmU5ZDkwNmUyMmRiM2M2NDk2N2E5YSJ9fX0.e9Fm2-Tc7nuy9STigBm_eFMv1xiYc_BdvNcjv_KMyV0'
            };

            axios.post('http://localhost:3000/wp-json/wp/v2/posts',
                {
                    title: this.title,
                    status: "publish",
                    categories: this.$route.params.idCat,
                    comment_status: "open",
                    content: this.content,
                    excerpt: "Content"
                }, { headers })
                .then(() => {
                    this.$router.push("/");
                });
        }
    }
}
</script>
 