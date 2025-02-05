<template>
    <div class="py-10 w-9/12 ml-auto mr-auto">
        <div class="pb-10 text-end">
            <TextInput placeholder="Search by book title ..." />
        </div>

        <BooksTable :books="books" />
    </div>
</template>

<script>
    import BooksTable from "./BooksTable.vue";
    import TextInput from "./layouts/TextInput.vue";
    import { mapActions, mapGetters} from "vuex";

    export default {
        name: 'BookListing',
        computed: {
            ...mapGetters(['allBooks']),
            books() {
                return this.allBooks
            }
        },
        created() {
            this.getAllBooks();
        },
        components: {
            BooksTable,
            TextInput
        },
        methods: {
            ...mapActions(["getAllBooks"]),
        }
    }
</script>
