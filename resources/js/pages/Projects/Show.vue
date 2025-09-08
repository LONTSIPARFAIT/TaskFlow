<!-- resources/js/Pages/Projects/Show.vue -->
<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
defineProps<{ project: { id: number, name: string, description?: string, tasks: Array<any> } }>();
</script>

<template>
    <DefaultLayout>
        <Head :title="project.name" />
        <h2>{{ project.name }}</h2>
        <p>{{ project.description }}</p>
        <h3>Tâches</h3>
        <ul>
            <li v-for="task in project.tasks" :key="task.id">
                <Link :href="$route('tasks.show', task.id)">{{ task.title }}</Link> ({{ task.status }})
            </li>
        </ul>
        <Link :href="$route('projects.index')">Retour aux projets</Link>
    </DefaultLayout>
</template>