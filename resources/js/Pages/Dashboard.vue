<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
            <div v-if="user.subscription_status === 'premium'">
                <!-- Premium Features -->
                 <h1>Usuario premium</h1>
            </div>
            <div v-else>
                <!-- Free User Features -->
                 <h1>Usuario normal</h1>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
export default {
    props: {
        user: Object,
    },
};
</script>
