<template>
    <div class="container mt-auto">
        <!-- registarion scetion  -->
        <form action="" method="POST" nonvalidate>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    name="name"
                    v-model="name"
                />
                <small id="emailHelp" v-text="checkName" class="form-text text-muted"></small>
            </div>
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
                 <small id="emailHelp" v-text="checkEmail" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    v-model="password"
                />
                <small id="password" v-text="checkPassword" class="form-text text-muted"></small>
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="exampleInputPassword1"
                    name="confirm_password"
                    v-model="confirm_password"
                />
                <small id="emailHelp" v-text="confirmPassword" class="form-text text-muted"></small>
            </div>

            <button type="submit" :disabled="!isValidForm" @click="submitButton" class="btn btn-primary">Sign UP</button>
        </form>
        <!-- /registarion scetion -->
    </div>
</template>

<script>
export default {
    data(){
        return{
            name:'',
            email:'',
            password:'',
            confirm_password:'',
        }
    },//end of data
    computed:{
        checkName(){
            if(this.name.length>0 && this.name.length<2){
                return 'your name is very short'
            }
        },//end of checkName
        checkEmail() {
            console.log("working ...");
            if (this.email.length>0 && !(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(this.email))) {
                return "your email must containes @ and then dot(.) ";
            }
        }, //end of check eamil

        checkPassword(){
            if(this.password.length>0 &&this.password.length<8){
                return 'your password is very short must be over 8 digits'
            }
        },//end of checkPassword

        confirmPassword(){
            if ((this.password.length>=8)&&(this.password !== this.confirm_password)){
                return 'the passwords do not match'
            }
        },//end of checkPassword

        isValidForm(){
            if (
                (this.name.length>0 && this.name.length>2)&&
                (this.email.length>0 && (/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(this.email)))&&
                ((this.password.length>=8)&&(this.password === this.confirm_password))
            ){
                return 'Ok'
            }
        }
    },//end of computed

    methods:{
        submitButton(e){
            e.preventDefault();
            console.log('working ...')
        }
    }
};
// end of export default
</script>
