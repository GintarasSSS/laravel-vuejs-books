<template>
    <button
        :disabled="isDisabled"
        :class="isDisabled ? 'bg-gray-400' : 'bg-orange'"
        class="text-white py-2 px-4 rounded"
        type="submit"
    >
        Submit
    </button>
</template>

<script>
    export default {
        name: "TheButton",
        props: {
            isDisabled: {
                type: Boolean,
                default: false
            }
        }
    }
</script>
