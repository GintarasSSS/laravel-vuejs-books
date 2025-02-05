<template>
    <input
        type="text"
        class="rounded-md border-gray-400 border-solid border-[1px] p-2 w-96 max-w-full"
        :placeholder="placeholder"
        @input="$emit('input', $event.target.value)"
    />
</template>

<script>
export default {
    name: "TextInput",
    props: {
        value: String,
        placeholder: String
    }
}
</script>
