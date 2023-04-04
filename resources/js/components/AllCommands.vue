<template>
    <div>
        <h3 class="text-center">Toutes les commandes</h3><br/>

        <table class="table table-bordered" id="datatable">
            <thead>
            <tr>
                <th></th>
                <th>Nom client</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Adresse livraison</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(command,index) in commands" :key="command.id">
                <td>{{ index + 1}}</td>
                <td>{{ command.nom_client }}</td>
                <td>{{ command.produit }}</td>
                <td>{{ command.quantite }}</td>
                <td>{{ command.adresse_livraison }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: command.id }}" class="btn btn-primary">Modifier
                        </router-link>
                        <button class="btn btn-danger" @click="deleteCommand(command.id)">Supprimer</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import "jquery/dist/jquery.min.js";
import "bootstrap/dist/css/bootstrap.min.css";
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from "jquery";
export default {
    mounted() {
        this.axios
            .get('http://localhost:8000/api/commands')
            .then(response => {
                this.commands = response.data;
                setTimeout(
                    function()
                    {
                        $("#datatable").DataTable();
                    }, 500);

            });
    },
    data() {
        return {
            commands: []
        }
    },
    methods: {
        deleteCommand(id) {
            this.axios
                .delete(`http://localhost:8000/api/command/delete/${id}`)
                .then(response => {
                    let i = this.commands.map(item => item.id).indexOf(id); // find index of your object
                    this.commands.splice(i, 1);
                });
        }
    }
}
</script>
