<template>
    <div>
        <p>Welcome to the user dashboard!</p>    
        
        <ul>
          <li v-for="item in items" :key="item.id">{{ item.fields['Mes'] }} {{item.fields['Periodo'] }} {{ item.fields['Clientes'][0] }}</li>
        </ul>
       
    </div>
</template>

<script>
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';
DataTable.use(DataTablesCore);

export default {
    name: "UserDashboard",

    data() {
        return {
            items: [],
            clientes: [],
            recordsData: [],
            fieldsData: [],
            landforfun: [],
        };
    },
    created() {
    this.getUserData();
  },
    methods: {
      
async getUserData() {
 // Realizar la solicitud a la API cuando la página se carga
 fetch('https://api.airtable.com/v0/app2d0KLaKb23nJRV/Metricas?filterByFormula=AND({Mes}="Junio")?sort[0][field]=Cliente&[0][direction]=asc', {
          headers: {
            'Authorization': 'Bearer patIszOAsmdgSlBQf.1b4e2435b1d9246c9417ab0a2ab0a6e08d7badc46c86b4a1e34c7900f1d9553c'
          }
        })
          .then(response => response.json())
          .then(data => {
            this.items = data.records; // Almacena los datos de la API en el array 'records'
            //console.log(this.items[0].fields)
            for (let records = 0; records < this.items.length; records++) {
              this.recordsData = this.items[records];
              console.log(this.items)
            }

           
          })
          .then( () => {
            for (let items = 0; items < this.recordsData.length; items++) {
                
                this.fieldsData = this.recordsData[items];
                //console.log(items)
              }
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
