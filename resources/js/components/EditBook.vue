<template>
    <div class="w-1/5 text-left mr-auto ml-auto -mt-0 mb-0">
        <form v-if="Object.keys(book).length" @submit.prevent="submit">
            <div class="pt-10">
                <h2 class="text-center text-3xl pb-10">Edit Book</h2>

                <div v-if="responseMessage"
                     :class="{
                        'bg-green-50 border-green-400 text-green-700': responseMessage.type === 'success',
                        'bg-red-50 border-red-400 text-red-700': responseMessage.type === 'error'
                     }"
                     class="p-4 border-l-4 rounded-md mb-10"
                >
                    {{ responseMessage.message }}
                </div>

                <div class="pb-10">
                    <TheLabel for="title_input">Title: </TheLabel>
                    <TextInput
                        placeholder="Title"
                        id="title_input"
                        :isRequired="true"
                        v-model="book.title"
                    />
                </div>

                <div class="pb-10">
                    <TheLabel for="author_input">Author: </TheLabel>
                    <TextInput
                        placeholder="Author"
                        id="author_input"
                        :isRequired="true"
                        v-model="book.author"
                    />
                </div>

                <div class="pb-10">
                    <TheLabel for="rating_input">Rating: </TheLabel>
                    <TextInput
                        type="number"
                        min="1"
                        max="10"
                        placeholder="5"
                        id="rating_input"
                        :isRequired="true"
                        v-model="book.rating"
                    />
                </div>
            </div>
            <div class="text-center">
                <TheButton :isDisabled="isDisabled"/>
            </div>
        </form>
        <h2 v-else class="text-center text-3xl pb-10 pt-10">Book not found.</h2>
    </div>
</template>

<script>
    import TextInput from "./layouts/TextInput.vue";
    import TheLabel from "./layouts/TheLabel.vue";
    import TheButton from "./layouts/TheButton.vue";
    import {mapActions, mapGetters} from "vuex";

    export default {
        name: 'EditBook',
        data() {
            return {
                book: {},
                bookId: this.$route.params.id,
                isDisabled: false
            }
        },
        computed: {
            ...mapGetters(['allBooks']),
            bookFromStore() {
                return this.allBooks.find((book) => parseInt(book.id) === parseInt(this.bookId)) || {};
            },
            responseMessage() {
                return this.$store.state.responseMessage;
            }
        },
        watch: {
            bookFromStore: {
                immediate: true,
                handler(newBook) {
                    if (newBook) {
                        this.book = { ...newBook };
                    }
                }
            }
        },
        created() {
            this.$store.commit('clearResponseMessage');
        },
        components: {
            TextInput,
            TheLabel,
            TheButton
        },
        methods: {
            ...mapActions(["getAllBooks", "updateBook"]),
            async submit() {
                this.isDisabled = true;
                await this.updateBook(this.book);
                this.isDisabled = false;
            }
        }
    }
</script>
