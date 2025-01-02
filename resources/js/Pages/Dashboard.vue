<template>
    <Head title='| Dashboard' />
    <div class="mx-w-screen-lg mx-auto">
        <h2 class="text-blue-600">Hello From vue</h2>
        <h2>{{$page.props.auth.user}}</h2>
        <p class="bg-green-200">{{$page.props.flash.message}}</p>
    </div>
</template>
