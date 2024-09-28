<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import GoalsSection from "@/Components/GoalsSection.vue";
import CommunityFeed from "@/Components/CommunityFeed.vue";
import { ref } from "vue";

defineProps({
    user: Object,
});

// State for active navigation (used for mobile view switching)
const activeNav = ref("home");

// Handle navigation click
const navigate = (navItem) => {
    activeNav.value = navItem;
};
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                Welcome back, {{ user.name }}!
            </h2>
        </template>

        <div class="py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Two-column layout for larger screens -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Goals Section - Always visible on desktop (lg:block), conditionally visible on mobile -->
                    <div
                        :class="{ hidden: activeNav !== 'home' }"
                        class="block lg:block"
                    >
                        <GoalsSection />
                    </div>

                    <!-- Community Feed - Always visible on desktop (lg:block), conditionally visible on mobile -->
                    <div
                        :class="{ hidden: activeNav !== 'community' }"
                        class="block lg:block"
                    >
                        <CommunityFeed />
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Navigation for mobile users -->
        <nav
            class="fixed inset-x-0 bottom-0 bg-white border-t border-gray-200 sm:hidden"
        >
            <div class="max-w-lg mx-auto grid grid-cols-4 gap-6 px-4 py-3">
                <!-- Home -->
                <button
                    @click="navigate('home')"
                    class="flex flex-col items-center text-sm"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        class="h-6 w-6"
                        :class="{
                            'text-indigo-600': activeNav === 'home',
                            'text-gray-500': activeNav !== 'home',
                        }"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7m-9 2v7"
                        />
                    </svg>
                    <span
                        :class="{
                            'text-indigo-600': activeNav === 'home',
                            'text-gray-500': activeNav !== 'home',
                        }"
                        >Home</span
                    >
                </button>

                <!-- Create Goal -->
                <button
                    @click="navigate('create')"
                    class="flex flex-col items-center text-sm"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        class="h-6 w-6"
                        :class="{
                            'text-indigo-600': activeNav === 'create',
                            'text-gray-500': activeNav !== 'create',
                        }"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4v16m8-8H4"
                        />
                    </svg>
                    <span
                        :class="{
                            'text-indigo-600': activeNav === 'create',
                            'text-gray-500': activeNav !== 'create',
                        }"
                        >Create</span
                    >
                </button>

                <!-- Community -->
                <button
                    @click="navigate('community')"
                    class="flex flex-col items-center text-sm"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        class="h-6 w-6"
                        :class="{
                            'text-indigo-600': activeNav === 'community',
                            'text-gray-500': activeNav !== 'community',
                        }"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 20h5v-2a2 2 0 00-2-2h-6a2 2 0 00-2 2v2h5m-5 0v2m0-10V4a4 4 0 10-8 0v12"
                        />
                    </svg>
                    <span
                        :class="{
                            'text-indigo-600': activeNav === 'community',
                            'text-gray-500': activeNav !== 'community',
                        }"
                        >Community</span
                    >
                </button>

                <!-- Profile -->
                <button
                    @click="navigate('profile')"
                    class="flex flex-col items-center text-sm"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        class="h-6 w-6"
                        :class="{
                            'text-indigo-600': activeNav === 'profile',
                            'text-gray-500': activeNav !== 'profile',
                        }"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 14c4 0 7 2 7 5v1H5v-1c0-3 3-5 7-5zm0-4a4 4 0 110-8 4 4 0 010 8z"
                        />
                    </svg>
                    <span
                        :class="{
                            'text-indigo-600': activeNav === 'profile',
                            'text-gray-500': activeNav !== 'profile',
                        }"
                        >Profile</span
                    >
                </button>
            </div>
        </nav>
    </AppLayout>
</template>
