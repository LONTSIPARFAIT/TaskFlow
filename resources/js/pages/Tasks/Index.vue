<!-- resources/js/Pages/Tasks/Index.vue -->
<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
defineProps<{ tasks: Array<{ id: number, title: string, description?: string, status: string, project: any }> }>();
</script>

<template>
    <DefaultLayout>
        <Head title="Tâches" />
        <h2>Mes Tâches</h2>
        <div v-if="$page.props.flash.success" class="success">{{ $page.props.flash.success }}</div>
        <ul>
            <li v-for="task in tasks" :key="task.id">
                <Link :href="$route('tasks.show', task.id)">{{ task.title }}</Link> ({{ task.status }})
            </li>
        </ul>
        <Link :href="$route('tasks.create')">Créer une tâche</Link>
    </DefaultLayout>
</template>

<style scoped>
.success {
    color: green;
    margin-bottom: 1rem;
}
</style>