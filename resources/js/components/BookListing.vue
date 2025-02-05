<template>
    <div class="py-10 w-9/12 ml-auto mr-auto">
        <div class="pb-10 text-end">
            <TextInput placeholder="Search by book title ..." />
        </div>

        <BooksTable />
    </div>
</template>

<script>
    import BooksTable from "./BooksTable.vue";
    import TextInput from "./layouts/TextInput.vue";

    export default {
        name: 'BookListing',
        components: {
            BooksTable,
            TextInput
        }
    }
</script>
