<!-- resources/js/Pages/Tasks/Create.vue -->
<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
defineProps<{ projects: Array<{ id: number, name: string }> }>();

const form = useForm({
    title: '',
    description: '',
    status: 'pending',
    project_id: null,
    user_id: null,
});

function submit() {
    form.post($route('tasks.store'), {
        onSuccess: () => form.reset(),
    });
}
</script>

<template>
    <DefaultLayout>
        <Head title="Créer une tâche" />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Créer une tâche</h2>
            <form @submit.prevent="submit" class="mt-4 space-y-4">
                <div>
                    <label class="block text-gray-700 dark:text-gray-300">Titre</label>
                    <input v-model="form.title" type="text" class="w-full border-gray-300 dark:border-gray-600 rounded-md">
                    <div v-if="form.errors.title" class="text-red-600 dark:text-red-400">{{ form.errors.title }}</div>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300">Description</label>
                    <textarea v-model="form.description" class="w-full border-gray-300 dark:border-gray-600 rounded-md"></textarea>
                    <div v-if="form.errors.description" class="text-red-600 dark:text-red-400">{{ form.errors.description }}</div>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300">Statut</label>
                    <select v-model="form.status" class="w-full border-gray-300 dark:border-gray-600 rounded-md">
                        <option value="pending">En attente</option>
                        <option value="completed">Terminé</option>
                    </select>
                    <div v-if="form.errors.status" class="text-red-600 dark:text-red-400">{{ form.errors.status }}</div>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300">Projet</label>
                    <select v-model="form.project_id" class="w-full border-gray-300 dark:border-gray-600 rounded-md">
                        <option v-for="project in projects" :key="project.id" :value="project.id">{{ project.name }}</option>
                    </select>
                    <div v-if="form.errors.project_id" class="text-red-600 dark:text-red-400">{{ form.errors.project_id }}</div>
                </div>
                <button type="submit" :disabled="form.processing" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Créer</button>
            </form>
            <Link :href="$route('tasks.index')" class="mt-4 inline-block text-blue-600 dark:text-blue-400">Retour aux tâches</Link>
        </div>
    </DefaultLayout>
</template>