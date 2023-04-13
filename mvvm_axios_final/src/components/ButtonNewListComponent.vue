<template>
    <div>
        <button id="bu" type="button" class="btn btn-outline-primary" v-on:click="this.newList()">Nouvelle liste</button>
    </div>
</template>

<script>

export default {
    name: "ButtonNewListComponent",

    methods: {
        newList() {
            this.$router.push("/newList");
        }
    }
}
</script>

<style>
#bu{
    height: 70px;
    margin-top: 13px; 
    }
</style>