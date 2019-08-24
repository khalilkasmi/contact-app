<template>
  <v-container fluid grid-list-md>
    <v-layout  >
     <v-flex >
        <v-text-field hint="e.g: khalilkasmi@gmail.com"  placeholder="search for" v-model="search_item" @keyup="search"></v-text-field>
        <div v-if="loading">
          <p class="text-lowercase small " style="color:red">searching ... </p>
        </div>
     </v-flex>
    </v-layout>
    <v-layout row wrap>
      <v-flex class="d-flex flex-wrap" center >
        <div v-if="contacts.length === 0 ">
          <p class="text-lowercase small " style="color:red">Nothing Found</p>
        </div>
        <div v-else v-for="contact in contacts" >
          <contactsComponent  :contact="contact"></contactsComponent>
        </div>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
    import contactsComponent from './ContactsComponent';
    export default {
        data() {
            return {
                search_item: '',
                loading: this.$store.state.loading
            }
        },
        computed: {
            contacts(){
                return this.$store.getters.getContacts;
            }
        },
        methods: {
            async search(){
                this.loading = true;
                this.$store.commit('SEARCH_CONTACT',this.search_item);
                this.loading = false;
            }
        },
        components: {
            contactsComponent
        }
    }
</script>
