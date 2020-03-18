<template> 
<v-content>
      <v-container fluid fill-height >
        <v-layout align-center justify-center >
          <v-flex xs12 sm8 md6
          >
  <v-data-table
    :headers="headers"
    :items="desserts"
    sort-by="id"
    sort-desc=true
    :loading="loading"
    class="elevation-1"
  >
    <template v-slot:top>
      <v-toolbar flat color="white">
        <v-toolbar-title>My CRUD</v-toolbar-title>
        <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
        <v-spacer></v-spacer>
        <v-dialog v-model="dialog" max-width="500px">
          <template v-slot:activator="{ on }">
            <v-btn color="primary" dark class="mb-2" v-on="on">New Item</v-btn>
          </template>
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>
              <v-container>
                <v-row>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.name" label="Dessert name"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.calories" label="Calories"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.fat" label="Fat (g)"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.carbs" label="Carbs (g)"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.protein" label="Protein (g)"></v-text-field>
                  </v-col>
                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
              <v-btn color="blue darken-1" text @click="save">Save</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-toolbar>
    </template>
    <template v-slot:item.actions="{ item }">
      <v-icon
        small
        class="mr-2"
        @click="editItem(item)"
      >
        mdi-pencil
      </v-icon>
      <v-icon
        small
        @click="deleteItem(item)"
      >
        mdi-delete
      </v-icon>
    </template>
    <template v-slot:no-data>
      <v-btn color="primary" @click="initialize">Reset</v-btn>
    </template>
  </v-data-table>
    </v-flex>
        </v-layout>
      </v-container>
  </v-content>
</template>

<script>
  export default {
    data: () => ({
       
      dialog: false,
      loading: true,
      headers: [
        { text: '#',  align: 'start', value: 'id', class: 'hidden' },
        { text: 'Dessert (100g serving)', sortable: true, value: 'name' },
        { text: 'Calories',     value: 'calories' },
        { text: 'Fat (g)',      value: 'fat' },
        { text: 'Carbs (g)',    value: 'carbs' },
        { text: 'Protein (g)',  value: 'protein' },
        { text: 'Actions',      value: 'actions', sortable: false },
      ],
      desserts: [],
      singleItem: '',
      editedIndex: -1,
      editedItem: { 
        name: '',
        calories: 0,
        fat: 0,
        carbs: 0,
        protein: 0, 
      },
      defaultItem: { 
        name: '',
        calories: 0,
        fat: 0,
        carbs: 0,
        protein: 0,
        
      },
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
      },
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
    },

    created () {
      this.initialize()
    },

    methods: {
      initialize () {
          axios.get('/products')  
            .then(response => {                  
                  let idItem = [];
                  let newData = [];
                  response.data.forEach(function(i,o){ 
                      let newItem = {};
                      
                      idItem[o] = i.id; 
                      newItem = JSON.parse(i.contents);  
                      newItem['id'] =  i.id; 
                      newData[o] = newItem;
                  }); 
                
                  this.desserts = newData; 
                  this.loading = false;
            }).catch(error => {
                console.log(error);
            });
      },

      editItem (item) {
        this.editedIndex = this.desserts.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
        this.singleItem = item;
      },

      deleteItem (item) {
            const index = this.desserts.indexOf(item)
            confirm('Are you sure you want to delete this item?') && this.desserts.splice(index, 1)
          console.log(this);
            
    //         axios.post('/products/remove/'+item.id)
    //             .then(response => { 
    //                 console.log(response);
    //             }).catch(error => { 
    //             console.log(error );
    //         });
      },

      close () {
        this.dialog = false
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        }, 300)
      },
        mounted(){
         // console.log(this.editedItem);
        },
      save () {
        if (this.editedIndex > -1) {

              // Call api update
              axios.post('/products/update/'+this.singleItem.id, this.editedItem)  
                .then(response => { 
                  console.log(response);
                    if(response.data){
                        Object.assign(this.desserts[this.editedIndex], this.editedItem)
                    }
                }).catch(error => { 
                    console.log(error );
                });
          
        } else {  

                // Call api create to insert new data
                axios.post('/products/create',this.editedItem)  
                .then(response => { 
                    if(response.data){
                        this.desserts.push(this.editedItem);
                    }
                }).catch(error => { 
                    console.log(error );
                });
        }

        this.close()
      },
    },
  }
</script>