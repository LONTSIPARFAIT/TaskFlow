<!-- resources/js/Pages/Projects/Index.vue -->
<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
defineProps<{ projects: Array<{ id: number, name: string, description?: string, tasks: Array<any> }> }>();
</script>

<template>
    <DefaultLayout>
        <Head title="Projets" />
        <h2>Mes Projets</h2>
        <div v-if="$page.props.flash.success" class="success">{{ $page.props.flash.success }}</div>
        <ul>
            <li v-for="project in projects" :key="project.id">
                <Link :href="$route('projects.show', project.id)">{{ project.name }}</Link>
                ({{ project.tasks.length }} tâches)
            </li>
        </ul>
        <Link :href="$route('projects.create')">Créer un projet</Link>
    </DefaultLayout>
</template>

<style scoped>
.success {
    color: green;
    margin-bottom: 1rem;
}
</style>