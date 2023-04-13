<template>
    <div class="container">
        <div id="contact">
        <label for="exampleInputEmail1" class="form-label mt-4"><h3>Choisir un nom pour cette liste</h3></label>
        <input type="text" class="form-control" aria-describedby="emailHelp" v-model="this.name">
        <br>
        <button type="submit" class="btn btn-primary" v-on:click="setList()">Valider</button>

        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data: function () {
        return {
            name: ""
        }
    },

    methods:
    {
        getList() {
            let request = "http://localhost:3000/wp-json/wp/v2/categories/" + this.$route.params.id;

            axios
                .get(request)
                .then((response) => {
                    this.name = response.data.name;
                });
        },

        setList() {

            const headers = {
                'Authorization': 'Bearer ' + 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjMwMDAiLCJpYXQiOjE2ODAwOTc2OTgsIm5iZiI6MTY4MDA5NzY5OCwiZXhwIjoxNjgwNzAyNDk4LCJkYXRhIjp7InVzZXIiOnsiaWQiOjEsImRldmljZSI6IiIsInBhc3MiOiJhOThjY2RjYTQ4ZmU5ZDkwNmUyMmRiM2M2NDk2N2E5YSJ9fX0.e9Fm2-Tc7nuy9STigBm_eFMv1xiYc_BdvNcjv_KMyV0'
            };

            axios.post('http://localhost:3000/wp-json/wp/v2/categories/' + this.$route.params.id,
                {
                    name: this.name,
                    status: "publish",
                    excerpt: "Content"
                }, { headers })
                .then(() => {
                    this.$router.push("/");
                });
        }
    },

    mounted() {
        this.getList();
    }
}
</script>