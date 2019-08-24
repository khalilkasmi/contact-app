<template>
  <v-container >
    <v-layout>
      <v-flex>
        <v-card max-width='300' >
            <v-card-title >{{contact.name}}</v-card-title>
          <v-card-actions>
            <v-btn text><a href="tel:{contact.phone}">Call</a></v-btn>
            <v-btn text><a href="mailto:{contact.email}">Email</a></v-btn>
          </v-card-actions>
        </v-card>

      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
    export default {
        data(){
            return {
                flat: false,
                media: true,
                loading: false,
                actions: true,
                outlined: false,
                elevation: undefined,
                raised: false,
                width: 350
            }
        },
        props: [
            'contact'
        ]
        ,
        mounted() {
            console.log('mounted')
        }
    }
</script>
