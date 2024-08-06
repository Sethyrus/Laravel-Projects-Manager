export interface Team {
    id: number;
    name: string;
    description?: string;
    avatar?: string;
    owner_id: number;
    created_at: string;
    updated_at: string;
}

export interface User {
    id: number;
    name: string;
    description?: string;
    avatar?: string;
    active_team: Team;
    email: string;
    email_verified_at: string;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
};
