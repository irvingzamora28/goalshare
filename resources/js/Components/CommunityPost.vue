<template>
    <div v-if="post" class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-center">
            <img
                v-if="post.user && post.user.profilePhotoUrl"
                class="h-12 w-12 rounded-full object-cover"
                :src="post.user.profilePhotoUrl"
                :alt="post.user.name || 'User avatar'"
            />
            <div class="ml-4">
                <p class="font-semibold text-gray-800">
                    {{ post.user ? post.user.name : "Anonymous" }}
                </p>
                <p class="text-xs text-gray-500">{{ formattedDate }}</p>
            </div>
        </div>
        <p class="mt-4 text-gray-700">
            {{ post.content || "No content available" }}
        </p>
        <div v-if="post.imageUrl" class="mt-4">
            <img
                :src="post.imageUrl"
                alt="Post Image"
                class="w-full h-64 object-cover rounded-lg"
            />
        </div>
        <div class="mt-4 flex items-center space-x-6 text-gray-600">
            <button class="flex items-center space-x-1" @click="likePost">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    :class="{ 'text-red-500 fill-current': isLiked }"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        :stroke="isLiked ? 'none' : 'currentColor'"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 15l7-7 7 7"
                    />
                </svg>
                <span>{{ likes }} Likes</span>
            </button>
            <button
                class="flex items-center space-x-1"
                @click="$emit('comment-post', post.id)"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M7 8h10M7 12h8m-8 4h6"
                    />
                </svg>
                <span>{{ post.comments || 0 }} Comments</span>
            </button>
        </div>
    </div>
</template>

<script setup lang="ts">
import type { Post } from "@/Types/Post";
import { ref, computed, defineProps } from "vue";



// Destructure and type the props
const props = defineProps<{ post: Post }>();
const emit = defineEmits<{
    (e: "like-post", postId: number, isLiked: boolean, likes: number): void;
    (e: "comment-post", postId: number): void;
}>();

// Local state for likes and isLiked
const likes = ref<number>(props.post.likes || 0);
const isLiked = ref<boolean>(props.post.liked || false);

// Like the post and emit the event to the parent to handle
const likePost = () => {
    isLiked.value = !isLiked.value;
    likes.value += isLiked.value ? 1 : -1;
    emit("like-post", props.post.id, isLiked.value, likes.value);
};

// Format the date for display
const formattedDate = computed<string>(() => {
    if (props.post && props.post.createdAt) {
        const date = new Date(props.post.createdAt);
        return date.toLocaleDateString("en-US", {
            month: "long",
            day: "numeric",
            year: "numeric",
        });
    }
    return "No date available";
});
</script>
