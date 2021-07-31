<template>
    <div class="container mt-4">
        <!-- login section -->
        <form novalidate>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    name="email"
                    v-model="email"
                />

                <small
                    v-text="checkEmail"
                    id="emailHelp"
                    class="form-text text-denger"
                ></small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="exampleInputPassword1"
                    name="password"
                    v-model="password"
                />
                <small
                    v-text="checkPassword"
                    id="password"
                    class="form-text text-denger"
                ></small>
            </div>
            <button :disabled="!isVlidForm" @click.prevent="submitButton" type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- /login section -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: "",
            password: ""
        };
    }, //end of data
    computed: {
        checkEmail() {
            if (this.email.length>0 && !(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(this.email))) {
                return "your email must containes @ and then dot(.)";
            }
        }, //end of check eamil
        checkPassword() {
            if (this.password.length > 0 && this.password.length < 8) {
                return "password length must be over 8";
            }
        }, //end of checkPassword
        isVlidForm(){
            if(
                (this.password.length > 0 && this.password.length >= 8)&&
                (this.email.length > 0 && (/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(this.email)))
            ){
                return 'Ok'
            }
        },//end of isValidForm
    },//end of computed
    methods:{
        submitButton(){
            console.log ('button login is working')
            let payload = {
                email: this.email,
                password: this.password,
            };
            this.$store.dispatch('loginUser', payload)
        }
    },
};
</script>
