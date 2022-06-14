import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)
axios.defaults.baseURL = process.env.VUE_APP_API_URL;
const defaultUrlStatic = process.env.VUE_APP_DEFAULT_URL_STATIC;

export default new Vuex.Store({
    state: {
        recipes: [],
        categories: [],
        user: null,
    },
    getters: {
        recentRecipes(state) {
            return state.recipes.slice(-8)
        },
        allRecipes(state) {
            return state.recipes;
        },
        allCategories(state) {
            return state.categories;
        },
        getUser(state) {
            return state.user;
        }
    },
    mutations: {
        setUser(state, payload) {
            state.user = payload;
        }
    },
    actions: {
        async getUser({state}) {
            const token = localStorage.getItem('token');

            return new Promise(async (resolve, reject) => {
                await axios.get('/user', {
                    headers: {Authorization: `Bearer ${token}`}
                }).then(response => {
                    state.user = response.data;
                    resolve(response.data);
                })
            });
        },
        getRecipes({state}) {
            return new Promise((resolve, reject) => {
                axios.get('/recipe').then(response => {
                    let recipes = response.data;
                    recipes.forEach((recipe, index) => recipe.imageFile = defaultUrlStatic + recipe.imageFile)
                    state.recipes = recipes;
                    resolve(response.data);
                }).catch(error => {
                    reject(error);
                });
            });
        },
        getCategories({state}) {
            return new Promise((resolve, reject) => {
                axios.get('/category').then(response => {
                    let categories = response.data;
                    categories.forEach((category, index) => category.categoryImg = defaultUrlStatic + category.categoryImg)
                    state.categories = categories;
                }).catch(error => {
                    reject(error);
                });
            });
        }
    },
    modules: {}
})
