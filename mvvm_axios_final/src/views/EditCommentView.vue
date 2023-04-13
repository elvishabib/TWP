<template>
    <div>
        <fieldset>
            <legend>Commentaire n° {{ this.$route.params.id }}</legend>

            <div class="form-group">
                <label for="exampleTextarea" class="form-label mt-4">Contenu</label>
                <textarea class="form-control" id="exampleTextarea" rows="3" v-model="this.content"
                    v-html="this.content"></textarea>
            </div>

            <br>

            <button type="submit" class="btn btn-primary" v-on:click="update()">Valider</button>
        </fieldset>
    </div>
</template>

<script>
import axios from 'axios'

export default
    {
        data: function () {
            return {
                content: "",
            }
        },

        methods:
        {
            getComment() {
                let request = "http://localhost:3000/wp-json/wp/v2/comments/" + this.$route.params.id;

                axios
                    .get(request)
                    .then((response) => {
                        this.content = response.data.content.rendered;
                    });
            },

            update() {

                let request = "http://localhost:3000/wp-json/wp/v2/comments/" + this.$route.params.id;

                const headers = {
                    'Authorization': 'Bearer ' + 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjMwMDAiLCJpYXQiOjE2ODAwOTc2OTgsIm5iZiI6MTY4MDA5NzY5OCwiZXhwIjoxNjgwNzAyNDk4LCJkYXRhIjp7InVzZXIiOnsiaWQiOjEsImRldmljZSI6IiIsInBhc3MiOiJhOThjY2RjYTQ4ZmU5ZDkwNmUyMmRiM2M2NDk2N2E5YSJ9fX0.e9Fm2-Tc7nuy9STigBm_eFMv1xiYc_BdvNcjv_KMyV0'
                };

                axios.post(request,
                    {
                        content: this.content,
                    },
                    { headers }).then(() => {
                        this.$router.push({ name: 'edit', params: { id: this.$route.params.post_id } });
                    });
            }
        },

        mounted() {
            this.getComment();
        }
    }
</script>
