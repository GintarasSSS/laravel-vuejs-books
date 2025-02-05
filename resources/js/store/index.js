import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        books: [],
        responseMessage: null,
    },
    mutations: {
        setBooks(state, books) {
            state.books = books;
        },
        setResponseMessage(state, message) {
            state.responseMessage = message;
        },
        clearResponseMessage(state) {
            state.responseMessage = null;
        },
        removeBook(state, bookId) {
            state.books = state.books.filter(book => book.id !== bookId);
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
                console.error('Error fetching books.');
            }
        },
        async updateBook({ commit }, book) {
            try {
                const response = await axios.put(`/api/books/${book.id}`, book);

                commit("setResponseMessage", {
                    type: "success",
                    message: response.data.message
                });
            } catch (er) {
                if (er.response && er.response.data) {
                    commit("setResponseMessage", {
                        type: "error",
                        message: er.response.data.message || "An error occurred."
                    });
                } else {
                    commit("setResponseMessage", {
                        type: "error",
                        message: "Network error. Please try again."
                    });
                }
            }
        },
        async deleteBook({ commit }, bookId) {
            try {
                await axios.delete(`/api/books/${bookId}`);

                commit("removeBook", bookId)
            } catch (er) {
                console.error('Error deleting book.');
            }
        }
    }
});
