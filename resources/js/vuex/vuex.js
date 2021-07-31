import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios';

Vue.use(Vuex)

const store=new Vuex.Store({
    state:{
        setToken:''
    },//end of state

    getters:{
        getToken(state){
            if(state.setToken){
                return true
            }else{
                return false
            }//end of if
        },//end of getToken function
    },//end of getters

    mutations:{
        setUserToke(state,token){
            state.setToken=JSON.stringify(token)
            axios.defaults.headers.common.Authorization='bearar'+$(token)
        },//end of setUserToken function

        removeUserToke(state){
            state.setToken=""
        },//end of removeUserToken function
    },//end of mutations

    actions:{
        regesterUser({commit},pylocad){
            console.log(pylocad)
            axios.post('/api/signup',pylocad)
            .then(res=>{
                console.log('registartion successfly')
                commit('setUserToke',{token:res.token})
                // console.log(state.setToken)
            })
            .catch(err=>{
                console.log(err)
            })
        },//end of regesterUser

        loginUser({commit},pylocad){
            console.log(pylocad)
            axios.post('/api/login',pylocad)
            .then(res=>{

                if(!!res.token){
                    commit('setUserToke',{token:res.data.token})
                }
                console.log(res.data.token)
            })
            .catch(err=>{
                console.log(err)
            })
        }//end of loginUser
    }//end of actions

});//end of Vuex Objecet

export default store
