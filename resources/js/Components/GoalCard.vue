<template>
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-semibold text-gray-800">
                {{ goal.title }}
            </h3>
            <span v-if="goal.dueDate" class="text-sm text-gray-500"
                >Due: {{ goal.dueDate }}</span
            >
        </div>
        <p class="text-gray-600 mt-2">{{ goal.description }}</p>
        <div class="mt-4">
            <div class="h-2 bg-gray-200 rounded-full">
                <div
                    class="h-2 bg-indigo-600 rounded-full"
                    :style="{ width: goal.progress + '%' }"
                ></div>
            </div>
            <p class="text-sm text-gray-500 mt-1">
                Progress: {{ goal.progress }}%
            </p>
        </div>
        <div class="mt-4 flex space-x-2">
            <button
                class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded"
                @click="$emit('mark-completed', goal.id)"
            >
                Mark as Completed
            </button>
            <button
                class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded"
                @click="$emit('edit-goal', goal.id)"
            >
                Edit
            </button>
        </div>
    </div>
</template>

<script setup lang="ts">
import { defineProps } from "vue";

interface Goal {
    id: number;
    title: string;
    description: string;
    progress: number;
    dueDate?: string;
}

defineProps<{
    goal: Goal;
}>();
</script>
