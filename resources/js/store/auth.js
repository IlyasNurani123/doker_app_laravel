import Axios from "../util/axiosDefault";
// import {
//   SERVER_URL_LOCAL,
//   SERVER_URL_LOCAL_ADMIN
// } from '../apiUrl/urlConstant';
// import router from 'vue-router';
export default {
  namespaced: true,
  state: {
    token: null,
    user: [],
    auth_error: null,
    isAuthenticated: false,
    loader: false,
    drawer: true
  },
  getters: {

        },
  mutations: {
      LOGIN_SUCCESS(state,payload){
        state.token = payload.token;
        state.user ={
            name:payload.name,
            email:payload.email
        }
        state.isAuthenticated = true;
        state.auth_error = null
      },
      LOGIN_FAILED(state, payload){
        state.isAuthenticated = false;
        state.user = null;
        state.token = null;
        state.auth_error = payload;
      }
      },
  actions: {

    async login({commit},data){
    //     return new Promise((resolve, reject) => {
    //         Axios.post(`/login`,data)
    //       .then(response => {
    //         const data = response.data.data;
    //         console.log(data);
    //         commit("LOGIN_SUCCESS", data);
    //         const token = data.token;
    //         if (!localStorage.token) {
    //           localStorage.setItem("token", token);
    //         }
    //         commit("LOGIN_SUCCESS", data);
    //         resolve(response);
    //       })
    //       .catch(error => {
    //           const message = error.errors;
    //           console.log("this is error message",message);
    //           commit("LOGIN_FAILED",error)
    //           reject(error);
    //       });
    //     });
        try{
            const response = await Axios.post('/login',data);
            const res = response.data;
            const token = res.token;
            if (!localStorage.token) {
                localStorage.setItem("token", token);
              }
              console.log("Login successfully",res);
              commit("LOGIN_SUCCESS", res);
        }catch(error){
            const errors = error;
            console.log("errors on login@@@@@@ ",errors);
             commit("LOGIN_FAILED",error)
        }
    }
  }
};
