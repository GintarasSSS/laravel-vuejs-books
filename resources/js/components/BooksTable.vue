<template>
    <div class="relative overflow-x-auto">
        <table v-if="books.length" class="w-full border-collapse">
            <thead class="bg-gray-900 text-white border-b border-white">
                <tr>
                    <th class="px-6 py-3 text-left border-r border-white">Title</th>
                    <th class="px-6 py-3 text-left border-r border-white">Author</th>
                    <th class="px-6 py-3 text-left border-r border-white">Rating</th>
                    <th class="px-6 py-3 text-left whitespace-nowrap w-1"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="book in books" :key="book.id" class="odd:bg-gray-100 even:bg-gray-200 border-white">
                    <td class="px-6 py-4 border-r border-white">{{ book.title }}</td>
                    <td class="px-6 py-4 border-r border-white">{{ book.author }}</td>
                    <td class="px-6 py-4 border-r border-white">{{ book.rating }}</td>
                    <td class="px-6 py-4 text-blue-600 whitespace-nowrap w-1 font-bold">
                        <router-link :to="`/books/${book.id}/edit`" class="hover:underline">Edit</router-link>
                        <span class="mx-2 text-black">|</span>
                        <a
                            href="#" class="hover:underline text-red-600"
                            @click.prevent="handleDeleteBook(book.id)"
                        >
                            Delete
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div v-else class="bg-gray-900 text-white text-center px-6 py-4">
            No books found.
        </div>
    </div>

</template>

<script>
    import {mapActions} from "vuex";

    export default {
        name: "BooksTable",
        props: {
            books: Array
        },
        methods: {
            ...mapActions(['deleteBook']),
            async handleDeleteBook(bookId) {
                if (confirm('Are you sure you want to delete this book?')) {
                    await this.deleteBook(bookId);
                }
            }
        }
    }
</script>
