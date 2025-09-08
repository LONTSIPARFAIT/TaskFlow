<!-- resources/js/Pages/Tasks/Show.vue -->
<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
defineProps<{ task: { id: number, title: string, description?: string, status: string, project: any } }>();
</script>

<template>
    <DefaultLayout>
        <Head :title="task.title" />
        <h2>{{ task.title }}</h2>
        <p>{{ task.description }}</p>
        <p>Statut : {{ task.status }}</p>
        <p>Projet : <Link :href="$route('projects.show', task.project.id)">{{ task.project.name }}</Link></p>
        <Link :href="$route('tasks.index')">Retour aux tâches</Link>
    </DefaultLayout>
</template>