<template>
    <div class="space-y-6">
        <CommunityPost
            v-for="post in posts"
            :key="post.id"
            :post="post"
            @like-post="handleLikePost"
            @comment-post="commentPost"
        />
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import CommunityPost from "./CommunityPost.vue";
import type { Post } from "@/Types/Post";

interface User {
    name: string;
    profilePhotoUrl: string;
}


// Array of posts
const posts = ref<Post[]>([
    {
        id: 1,
        user: {
            name: "Alice Johnson",
            profilePhotoUrl: "https://i.pravatar.cc/150?img=2",
        },
        content:
            "Just completed my goal of learning React Native! Feeling accomplished.",
        imageUrl: "https://picsum.photos/800/600?random",
        likes: 24,
        comments: 5,
        liked: false,
        createdAt: "2024-09-27T10:30:00",
    },
    {
        id: 2,
        user: {
            name: "Michael Smith",
            profilePhotoUrl: "https://i.pravatar.cc/150?img=3",
        },
        content: "Ran 10km today as part of my marathon training.",
        imageUrl: "https://picsum.photos/800/600?random",
        likes: 15,
        comments: 3,
        liked: true,
        createdAt: "2024-09-26T15:45:00",
    },
    {
        id: 3,
        user: {
            name: "Sofia Martinez",
            profilePhotoUrl: "https://i.pravatar.cc/150?img=4",
        },
        content: "Started learning French today! Bonjour à tous!",
        imageUrl: null,
        likes: 30,
        comments: 10,
        liked: false,
        createdAt: "2024-09-25T09:20:00",
    },
]);

// Handle the like-post event from child components
const handleLikePost = (postId: number, liked: boolean, updatedLikes: number): void => {
    const post = posts.value.find((p) => p.id === postId);
    console.log("Liked:", liked);
    console.log("Post:", post);

    if (post) {
        post.liked = liked;
        post.likes = updatedLikes;
    }
};

const commentPost = (postId: number): void => {
    alert(`Comment on post with ID: ${postId}`);
};
</script>
