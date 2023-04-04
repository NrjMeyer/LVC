<template>
    <div>
        <h3 class="text-center">Modifier</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateCommand">
                    <div class="form-group">
                        <label>Nom client</label>
                        <input type="text" class="form-control" v-model="command.nom_client">
                    </div>
                    <div class="form-group">
                        <label>Produit</label>
                        <input type="text" class="form-control" v-model="command.produit">
                    </div>
                    <div class="form-group">
                        <label>Quantité</label>
                        <input type="number" min="1" class="form-control" v-model="command.quantite">
                    </div>
                    <div class="form-group">
                        <label>Adresse livraison</label>
                        <input type="text" class="form-control" v-model="command.adresse_livraison">
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            command: {}
        }
    },
    created() {
        this.axios
            .get(`http://localhost:8000/api/command/edit/${this.$route.params.id}`)
            .then((response) => {
                this.command = response.data;
                // console.log(response.data);
            });
    },
    methods: {
        updateCommand() {
            this.axios
                .post(`http://localhost:8000/api/command/update/${this.$route.params.id}`, this.command)
                .then((response) => {
                    this.$router.push({name: 'home'});
                });
        }
    }
}
</script>
