<script setup></script>
<template>
    <div>
        <header class="bg-purple-500 text-white">
            <nav
                class="flex items-center justify-between max-w-screen-lg py-4 mx-auto"
            >
                <Link
                    :href="route('home')"
                    class="font-semibold py-2 px-3 rounded-md hover:bg-purple-800"
                    :class="{ 'bg-purple-800': $page.url == '/' }"
                    >Home</Link
                >
                <div class="ms-auto">
                    <div v-if="$page.props.auth.user" class="space-x-4 flex items-center">
                        <Link
                            :href="route('dashboard')"
                            class="font-semibold py-2 px-3 rounded-md hover:bg-purple-800"
                            :class="
                                $page.url == '/dashboard' ? 'bg-purple-800' : ''
                            "
                            >Dashboard</Link
                        >
                        <Link
                            :href="route('logout')"
                            class="font-semibold py-2 px-3 rounded-md hover:bg-purple-800"
                            :class="{ 'bg-purple-800': $page.url == '/logout' }"
                            method="post"
                            as="button"
                            type="button"
                            >Logout</Link
                        >

                        <Link href="#">
                            <img
                                :src="$page.props.auth.user.image ? ('storage/' + $page.props.auth.user.image) : ('storage/images/default.jpg')"
                                alt=""
                                class="w-10 h-10 rounded-full "
                            />
                        </Link>
                    </div>
                    <div v-else class="space-x-4">
                        <Link
                            :href="route('register')"
                            class="font-semibold py-2 px-3 rounded-md hover:bg-purple-800"
                            :class="{
                                'bg-purple-800': $page.url == '/register',
                            }"
                            >Register</Link
                        >
                        <Link
                            :href="route('login')"
                            class="font-semibold py-2 px-3 rounded-md hover:bg-purple-800"
                            :class="{ 'bg-purple-800': $page.url == '/login' }"
                            >Login</Link
                        >
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <slot />
        </main>
    </div>
</template>
