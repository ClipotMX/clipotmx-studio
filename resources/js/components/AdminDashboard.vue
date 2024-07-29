<template>
    <div>
        <h1>Admin Dashboard</h1>
        <p>Welcome to the admin dashboard!</p>

        {{ info }}
        
    </div>
</template>

<script>
export default {
    name: 'AdminDashboard',

    data() {
        return {
           info: "Aclaracion!", 
           clients: {
            "land4fun": "Land 4 Fun",
            "coffeebreak": "CoffeeBreak"

           }
        };

    },

    methods: {
        checkURL() {
            const getClientURL = this.$route.params.name;
            alert(getClientURL);
        }
    },
    mounted() {
        this.checkURL()
    }
};
</script>

<style scoped>
/* Tus estilos aquí */
</style>
