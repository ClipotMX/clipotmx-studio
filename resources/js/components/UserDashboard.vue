<template>
    <div>
        <p>Welcome to the user dashboard!</p>     
        
        <table id="dataTable" class="table">
          <tr>
            <th>Mensajes Entrantes</th>
            <th>Leads Vigentes</th>
            <th>Leads Sin Respuesta</th>
            <th>Whatsapp</th>
            <th>Periodo</th>
            <th>Mes</th>
          </tr>
          
        </table>
      
    </div>
</template>

<script>

export default {
    name: "UserDashboard",

    data() {
        return {
          apikey: process.env.AIRTABLE_API_KEY,
            items: [],
            clientes: [],

            landforfun: [],

        };
    },
    created() {
    this.getUserData();
  },
    methods: {
      
async getUserData() {
 // Realizar la solicitud a la API cuando la página se carga
 fetch('https://api.airtable.com/v0/app2d0KLaKb23nJRV/Metricas', {
          headers: {
            'Authorization': `Bearer ${apikey}`
          }
        })
          .then(response => response.json())
          .then(data => {
            this.items = data.records; // Almacena los datos de la API en el array 'records'

               $('#dataTable').DataTable( {
    info: false,
    ordering: false,
    paging: false,
    data: data.items,
});
        table
          })
          .catch(error => {
            console.error('Error al obtener datos de la API:', error);
          });
        },
    },

    mounted() {
        //this.getUserData();
    },
};
</script>

<style scoped>
/* Tus estilos aquí */
</style>
