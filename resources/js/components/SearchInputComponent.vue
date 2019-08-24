<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                    <!--<input type="text" >-->
                <h1>Search a contact by name,email,phone</h1>
                <div class="row">
                    <div class="col-11">
                        <div class="md-form mt-0">
                            <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="search_keywork" v-model="search_keyword" @keyup="search">
                        </div>
                    </div>
                    <div class="col-1">
                        <div v-if="!ready" class="spinner-grow" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
                    <!--<button type="submit" @click.prevent="search">search</button>-->
            </div>
        </div>
        <br>
        <div v-if="ready" class="row-">
            <div class="col">
                <div v-if="res" class="alert alert-warning" role="alert">
                    <span v-if="res"> {{res}} </span>
                </div>
                <table  class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">full name</th>
                        <th scope="col">email</th>
                        <th scope="col">phone</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="contact in contacts">
                            <th scope="col">{{ contact.id }}</th>
                            <th scope="col">{{ contact.name }}</th>
                            <th scope="col">{{ contact.email }}</th>
                            <th scope="col">{{ contact.phone }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                contacts: [],
                ready: false,
                search_keyword: '',
                err: '',
                res: ''
            }
        },
        methods: {
             async search(){
                const vm = this;
                 vm.ready = false;
                 axios.get('/api/search/'+this.search_keyword).
                    then(function (response){
                        vm.ready = false;
                        setTimeout(5000);
                        if(response.data.length === 0) {
                            vm.res = "nothing found, please try again "
                        }else{
                            vm.res = ''
                        }
                    vm.contacts = response.data;
                    vm.ready=true;
                }).catch((err) => {
                    vm.err = err
                });
            }
        },
        mounted() {

        }
    }
</script>
