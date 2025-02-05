<template>
    <div class="w-1/5 text-left mr-auto ml-auto -mt-0 mb-0">
        <form @submit.prevent="submit">
            <div class="pt-10">
                <h2 class="text-center text-3xl pb-10">Edit Book</h2>
                <div class="pb-10">
                    <TheLabel for="title_input">Title: </TheLabel>
                    <TextInput placeholder="Title" id="title_input" />
                </div>
                <div class="pb-10">
                    <TheLabel for="author_input">Author: </TheLabel>
                    <TextInput placeholder="Author" id="author_input" />
                </div>
                <div class="pb-10">
                    <TheLabel for="rating_input">Rating: </TheLabel>
                    <TextInput placeholder="5" id="rating_input"/>
                </div>
            </div>
            <div class="text-center">
                <TheButton />
            </div>
        </form>
    </div>
</template>

<script>
    import TextInput from "./layouts/TextInput.vue";
    import TheLabel from "./layouts/TheLabel.vue";
    import TheButton from "./layouts/TheButton.vue";

    export default {
        name: 'EditBook',
        components: {
            TextInput,
            TheLabel,
            TheButton
        }
    }
</script>
