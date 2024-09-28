<template>
    <div class="relative">
        <!-- Notification Bell Icon -->
        <button
            @click="toggleDropdown"
            class="relative p-2 rounded-full hover:bg-gray-200 focus:outline-none focus:ring"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                class="h-6 w-6 text-gray-600"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 17h5l-1.405-1.405C18.21 14.79 18 13.92 18 13V9a6 6 0 10-12 0v4c0 .92-.21 1.79-.595 2.595L4 17h5m6 0a3 3 0 01-6 0"
                />
            </svg>
            <!-- Notification Badge -->
            <span
                v-if="notifications.length > 0"
                class="absolute top-0 right-0 block h-2 w-2 rounded-full ring-2 ring-white bg-red-600"
            ></span>
        </button>

        <!-- Notifications Dropdown -->
        <div
            v-if="isDropdownOpen"
            class="absolute right-0 mt-2 w-64 bg-white border border-gray-200 rounded-lg shadow-lg z-50"
        >
            <div class="py-2">
                <div
                    v-if="notifications.length === 0"
                    class="text-center py-2 text-gray-500"
                >
                    No notifications
                </div>
                <div v-else>
                    <div
                        v-for="(notification, index) in notifications"
                        :key="index"
                        class="px-4 py-2 hover:bg-gray-100"
                    >
                        <p class="text-sm text-gray-700">
                            {{ notification.message }}
                        </p>
                        <span class="text-xs text-gray-500">{{
                            notification.time
                        }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";

// Dummy notifications data
interface Notification {
    message: string;
    time: string;
}

const notifications = ref<Notification[]>([
    { message: "New comment on your post", time: "2 mins ago" },
    { message: "You have a new follower", time: "1 hour ago" },
    { message: "New like on your comment", time: "3 hours ago" },
]);

// State for toggling the dropdown
const isDropdownOpen = ref(false);

// Toggle dropdown visibility
const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value;
};
</script>
