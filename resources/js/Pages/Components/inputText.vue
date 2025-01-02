<script setup>
    const model = defineModel({
        type : null,
        requried : true,
    })

    defineProps({
        name : {
            type : String,
            required : true,
        },
        type : {
            type : String,
            default : 'text',
        },
        message : String,
    })
</script>

<template>
    <div class="">
        <label for="" class="block">{{ name }}</label>
        <input
            :type="type"
            v-model="model"
            class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:ring-purple-300"
            :class="{'ring-red-500' : message}" 

        />
        <small class="text-red-600" v-if="message">{{ message }}</small>
    </div>
</template>
