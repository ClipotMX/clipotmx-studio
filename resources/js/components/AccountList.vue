<template>
    <div>
        <h1>Your Accounts Vue</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Account Name</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="account in accounts" :key="account.id">
                    <td>{{ account.account_name }}</td>
                    <td>{{ account.balance }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            accounts: []
        }
    },
    mounted() {
        axios.get('/api/accounts')
            .then(response => {
                this.accounts = response.data;
            })
            .catch(error => {
                console.error('Error fetching accounts:', error);
            });
    }
}
</script>

<style scoped>
.table {
    margin-top: 20px;
}
</style>
