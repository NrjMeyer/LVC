<template>
    <div>
        <h3 class="text-center">Ajouter une commande</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addCommand">
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
                        <input type="number" class="form-control" min="1" v-model="command.quantite">
                    </div>
                    <div class="form-group">
                        <label>Adresse livraison</label>
                        <input type="text" class="form-control" v-model="command.adresse_livraison">
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
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
    methods: {
        addCommand() {

            this.axios
                .post('http://localhost:8000/api/command/add', this.command)
                .then(response => (
                    this.$router.push({name: 'home'})
                    // console.log(response.data)
                ))
                .catch(error => console.log(error))
                .finally(() => this.loading = false)
        }
    }
}
</script>
