<template>
    <span id="btn">
        <button type="button" class="btn btn-outline-primary" v-on:click="this.redirection()">Nouvelle carte</button>
    </span>
</template>

<script>

export default {
    props: ['idCat'],

    methods: {
        redirection()
        {
            this.$router.push({ name: 'newCard', params: { idCat: this.idCat }});
        }
    }
}
</script>

<style>
 
</style>