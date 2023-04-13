<template>
    <div>
        <div class="alert alert-dismissible alert-danger">
            Voulez-vous supprimer cette carte ?<br>
            <button type="button" class="btn btn-outline-danger" style="margin-right: 10px" v-on:click="this.delete()">Oui</button>
            <button type="button" class="btn btn-outline-info" style="margin-left: 10px" v-on:click="this.redirect()">Non</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    methods: {
        delete()
        {
            let request = 'http://localhost:3000/wp-json/wp/v2/posts/' + this.$route.params.id + '?force=true';
            
            const headers = { 
                'Authorization': 'Bearer ' + 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjMwMDAiLCJpYXQiOjE2ODAwOTc2OTgsIm5iZiI6MTY4MDA5NzY5OCwiZXhwIjoxNjgwNzAyNDk4LCJkYXRhIjp7InVzZXIiOnsiaWQiOjEsImRldmljZSI6IiIsInBhc3MiOiJhOThjY2RjYTQ4ZmU5ZDkwNmUyMmRiM2M2NDk2N2E5YSJ9fX0.e9Fm2-Tc7nuy9STigBm_eFMv1xiYc_BdvNcjv_KMyV0'
            };

            axios.delete(request, { headers }).then(()=> {
               this.$router.push("/");
            });
        },

        redirect()
        {
            this.$router.push("/");
        }
    }
}
</script>

<style>

</style>