<template>
    <div class="w-1/5 text-left mr-auto ml-auto -mt-0 mb-0">
        <form v-if="Object.keys(book).length" @submit.prevent="submit">
            <div class="pt-10">
                <h2 class="text-center text-3xl pb-10">Edit Book</h2>
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
                <TheButton />
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
                bookId: this.$route.params.id
            }
        },
        computed: {
            ...mapGetters(['allBooks']),
            bookFromStore() {
                return this.allBooks.find((book) => parseInt(book.id) === parseInt(this.bookId)) || {};
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
        components: {
            TextInput,
            TheLabel,
            TheButton
        },
        methods: {
            ...mapActions(["getAllBooks"]),
            submit() {
                console.log('submit');
            }
        }
    }
</script>
