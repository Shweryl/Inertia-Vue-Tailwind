<script setup>
// import Layout from '../Layouts/Layout.vue'

// defineOptions({
//     layout : Layout,
// })

defineProps({
    users: {
        type: Object,
        required: true,
    },
});
</script>
<template>
    <div class="">
        <Head title="| Home" />
        <div class="mx-w-screen-lg flex justify-center mx-auto">
            <div class="w-full">
                <table class="">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>hi</td>
                            <td>name</td>
                            <td>email</td>
                            <td>time</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
