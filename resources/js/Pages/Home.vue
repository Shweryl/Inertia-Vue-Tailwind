<script setup>
// import Layout from '../Layouts/Layout.vue'
import {ref, watch} from "vue";
import {router} from '@inertiajs/vue3'
import { debounce } from "lodash";

// defineOptions({
//     layout : Layout,
// })

const props = defineProps({
    users: Object,
    searchTerm : String,
});

// js date modifying function
const getDate = (date) =>
    new Date(date).toLocaleDateString("en-us", {
        year: "numeric",
        month: "long",
        day: "numeric",
});

const search = ref(props.searchTerm);

watch(search, debounce(
    (q) => router.get('/', {search : q}, {preserveState : true}), 500)
);

</script>
<template>
    <div class="">
        <Head title="| Home" />
        <div class="mx-w-screen-lg flex justify-center mx-auto mt-5">
            <div class="w-3/5">
                <div class="flex justify-end mb-4">
                    <div class="w-1/4">
                        <input type="search" v-model="search" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search"/>

                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table
                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                    >
                        <thead
                            class="text-xs text-gray-700 uppercase bg-purple-200 dark:bg-gray-700 dark:text-gray-400"
                        >
                            <tr>
                                <th scope="col" class="px-6 py-3">Image</th>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">
                                    Register Date
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-purple-50 dark:hover:bg-gray-600"
                                v-for="user in users.data"
                                :key="user.name"
                            >
                                <td class="px-6 py-4">
                                    <img
                                        :src="
                                            user.image
                                                ? 'storage/' + user.image
                                                : 'storage/images/default.jpg'
                                        "
                                        class="w-20 h-20 rounded-full"
                                        alt=""
                                    />
                                </td>
                                <td class="px-6 py-4">{{ user.name }}</td>
                                <td class="px-6 py-4">{{ user.email }}</td>
                                <td class="px-6 py-4">
                                    {{ getDate(user.created_at) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="d-flex justify-between mb-5">
                        <div class="mb-3">
                            <small class="text-blue-700">Showing {{users.from}} to {{users.to}} of {{users.total}} results</small>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="inline-flex -space-x-px text-sm">
                                <li v-for="link in users.links">
                                    <Link
                                        :href="link.url"
                                        class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                        v-html="link.label"
                                        :class="{
                                            'text-slate-300': !link.url,
                                            'text-blue-700 bg-blue-50':
                                                link.active,
                                        }"
                                    ></Link>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
