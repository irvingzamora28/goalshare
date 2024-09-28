import type { User } from "./User";

export type Post  = {
    id: number;
    user: User;
    content: string;
    imageUrl: string | null;
    likes: number;
    comments: number;
    liked: boolean;
    createdAt: string;
}
