<template>
    <div class="container">
        <div class="row">
            <div class="col" v-if="users && users.length">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Surname</th>
                            <th scope="col" class="text-center">Phone Number</th>
                            <th scope="col" class="text-center">Address</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(user, index) in users">
                            <th scope="row">{{user.id}}</th>
                            <td>{{user.name}}</td>
                            <td>{{user.surname}}</td>
                            <td>{{user.phoneNumber}}</td>
                            <td>
                                <span class="row">{{user.address.street}} {{user.address.number}}</span>
                                <span class="row">{{user.address.code}} {{user.address.city}}</span>
                            </td>
                            <td class="text-center">
                                <a href="#" class="btn btn-danger" @click="remove(index, user.id)">Remove</a>
                                <a v-bind:href="editUrl(user.id)" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--<div class="col" v-if="!users || !users.length">-->
                <!--<new-user></new-user>-->
            <!--</div>-->
        </div>
    </div>
</template>

<script>
    import Routing from './../../Routing';
    import axios from 'axios';
    import swal from 'sweetalert';
    import NewUser from './New';

    export default {
        name: "user-list",
        data() {
            return {
                users: [],
                errors: [],
            }
        },
        created() {
            axios.get(Routing.generate('api_user_list'))
                .then(response => {
                    this.users = JSON.parse(response.data.users);
                })
                .catch(e => {
                    this.errors.push(e)
                })

        },
        methods: {
            remove(index, id) {
                axios.delete(Routing.generate('api_user_delete', {'id': id}));
                swal('User has been remove!');
                this.users.splice(index, 1);
            },
            editUrl(id) {
                return Routing.generate('user_edit', {'id': id});
            }
        },
        components: {
            NewUser
        }
    }
</script>