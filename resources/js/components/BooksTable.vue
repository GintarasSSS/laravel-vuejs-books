<template>
    <div class="relative overflow-x-auto">
        <table class="w-full border-collapse">
            <thead class="bg-gray-900 text-white border-b border-white">
                <tr>
                    <th class="px-6 py-3 text-left border-r border-white">Title</th>
                    <th class="px-6 py-3 text-left border-r border-white">Author</th>
                    <th class="px-6 py-3 text-left border-r border-white">Rating</th>
                    <th class="px-6 py-3 text-left whitespace-nowrap w-1"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-gray-100 even:bg-gray-200 border-white">
                    <td class="px-6 py-4 border-r border-white">test</td>
                    <td class="px-6 py-4 border-r border-white">test</td>
                    <td class="px-6 py-4 border-r border-white">test</td>
                    <td class="px-6 py-4 text-blue-600 whitespace-nowrap w-1 font-bold">
                        <a href="#" class="hover:underline">Edit</a>
                        <span class="mx-2 text-black">|</span>
                        <a href="#" class="hover:underline text-red-600">Delete</a>
                    </td>
                </tr>
                <tr class="odd:bg-gray-100 even:bg-gray-200 border-white">
                    <td class="px-6 py-4 border-r border-white">test</td>
                    <td class="px-6 py-4 border-r border-white">test</td>
                    <td class="px-6 py-4 border-r border-white">test</td>
                    <td class="px-6 py-4 text-blue-600 whitespace-nowrap w-1 font-bold">
                        <a href="#" class="hover:underline">Edit</a>
                        <span class="mx-2 text-black">|</span>
                        <a href="#" class="hover:underline text-red-600">Delete</a>
                    </td>
                </tr>
                <tr class="odd:bg-gray-100 even:bg-gray-200 border-white">
                    <td class="px-6 py-4 border-r border-white">test</td>
                    <td class="px-6 py-4 border-r border-white">test</td>
                    <td class="px-6 py-4 border-r border-white">test</td>
                    <td class="px-6 py-4 text-blue-600 whitespace-nowrap w-1 font-bold">
                        <a href="#" class="hover:underline">Edit</a>
                        <span class="mx-2 text-black">|</span>
                        <a href="#" class="hover:underline text-red-600">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
    export default {
        name: "BooksTable"
    }
</script>
