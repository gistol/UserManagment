<template>
    <form name="user" @submit.prevent="onSubmit">
        <div class="form-group">
            <label class="form-control-label required"> Name </label>
            <input type="text" v-model="user.name" required="required" class="form-control">
        </div>
        <div class="form-group">
            <label class="form-control-label required" for="user_surname">Surname</label>
            <input type="text" id="user_surname" name="user[surname]" required="required" class="form-control">
        </div>
        <div class="form-group">
            <label class="form-control-label required" for="user_phoneNumber">Phone number</label>
            <input type="tel" id="user_phoneNumber" name="user[phoneNumber]" required="required" class="form-control">
        </div>
        <small class="form-text text-muted">Format: +48 111 111 111</small>
        <hr>
        <span class="col-form-legend required">Address</span>
        <hr>
        <div class="row">
            <div class="col-10">
                <div class="form-group">
                    <label class="form-control-label required" for="user_address_street">Street</label>
                    <input type="text" id="user_address_street" name="user[address][street]" required="required"
                           class="form-control">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label class="form-control-label required" for="user_address_number">Number</label>
                    <input type="text"
                           id="user_address_number"
                           name="user[address][number]"
                           required="required"
                           class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label class="form-control-label required">Code</label>
                    <input type="text"
                           id="user_address_code"
                           name="user[address][code]"
                           required="required"
                           pattern="\d{2}-\d{3}"
                           class="form-control">
                </div>
                <small class="form-text text-muted">Format: XX-XXX</small>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label class="form-control-label required" for="user_address_city">City</label>
                    <input type="text"
                           id="user_address_city"
                           name="user[address][city]"
                           required="required"
                           class="form-control">
                </div>
            </div>
        </div>
        <div class="col text-center">
            <button class="btn btn-primary" type="submit">Add</button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "new",
        data() {
            return {
                user: {
                    name: '',
                    surname: '',
                    phoneNumber: '',
                    address: {
                        code: '',
                        city: '',
                        street: '',
                        number: ''
                    }
                },
                errors: [],
            }
        },
        methods: {
            onSubmit() {
                console.log(this.user);
            },
        }
    }
</script>