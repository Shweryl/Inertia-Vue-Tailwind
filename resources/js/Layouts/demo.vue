<script setup>
    import {Link} from '@inertiajs/vue3'
</script>
<template>
    <div>
        <header class="bg-blue-500 text-white">
            <nav class="flex items-center justify-between max-w-screen-lg p-4 mx-auto">
                <div class="space-x-6">
                    <Link href="/">Home</Link>
                    <Link href="/about">About</Link>
                </div>
            </nav>
        </header>
        <main>
            <slot/>
        </main>
    </div>
</template>
