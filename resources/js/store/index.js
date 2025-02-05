import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        books: []
    },
    mutations: {
        setBooks(state, books) {
            state.books = books;
        }
    },
    getters: {
        allBooks: state => state.books,
    },
    actions: {
        async getAllBooks({ commit }) {
            try {
                const response = await axios.get("/api/books");
                commit("setBooks", response.data.data);
            } catch (er) {
                console.error(er);
            }
        }
    }
});
