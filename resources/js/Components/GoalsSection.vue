<template>
    <div>
        <!-- Active Goals -->
        <div>
            <h3 class="text-xl font-semibold mb-4 text-gray-700">
                Active Goals
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <GoalCard
                    v-for="goal in activeGoals"
                    :key="goal.id"
                    :goal="goal"
                    @mark-completed="markCompleted"
                    @edit-goal="editGoal"
                />
            </div>
        </div>

        <!-- Completed Goals -->
        <div class="mt-10 pb-12">
            <h3 class="text-xl font-semibold mb-4 text-gray-700">
                Completed Goals
            </h3>
            <div class="flex flex-wrap gap-4">
                <div
                    v-for="goal in completedGoals"
                    :key="goal.id"
                    class="bg-indigo-100 text-indigo-800 px-4 py-2 rounded-full"
                >
                    {{ goal.title }}
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import GoalCard from "./GoalCard.vue";

interface Goal {
    id: number;
    title: string;
    description: string;
    progress: number;
    dueDate: string;
}

interface CompletedGoal {
    id: number;
    title: string;
}

const activeGoals = ref<Goal[]>([
    {
        id: 1,
        title: "Learn Vue.js 3",
        description:
            "Complete the official Vue.js 3 tutorial and build a sample project.",
        progress: 60,
        dueDate: "2024-10-15",
    },
    {
        id: 2,
        title: "Run a Marathon",
        description: "Train to run a full marathon by the end of the year.",
        progress: 30,
        dueDate: "2024-12-31",
    },
    {
        id: 3,
        title: "Read 12 Books in 2024",
        description: "Read 12 books from my reading list.",
        progress: 80,
        dueDate: "2024-12-31",
    },
    {
        id: 4,
        title: "Start a Blog",
        description: "Create a personal blog and write at least one post.",
        progress: 20,
        dueDate: "2024-12-31",
    },
]);

const completedGoals = ref<CompletedGoal[]>([
    { id: 3, title: "Read 12 Books in 2024" },
    { id: 4, title: "Start a Blog" },
]);

const markCompleted = (goalId: number): void => {
    const index = activeGoals.value.findIndex((goal) => goal.id === goalId);
    if (index !== -1) {
        const [completedGoal] = activeGoals.value.splice(index, 1);
        completedGoal.progress = 100;
        completedGoals.value.push(completedGoal);
    }
};

const editGoal = (goalId: number): void => {
    alert(`Edit goal with ID: ${goalId}`);
};
</script>
