<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <router-link to="/" class="nav-item nav-link"><img src="https://cdn-icons-png.flaticon.com/512/6948/6948527.png" width="200" alt="commande"></router-link>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <router-link to="/add" class="nav-item nav-link">Ajouter une commande</router-link>
                </div>
            </div>
        </nav>
        <br/>
        <router-view></router-view>
    </div>
</template>

<script>
export default {}
</script>
