<!-- resources/js/Pages/Projects/Create.vue -->
<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';

const form = useForm({
    name: '',
    description: '',
});

function submit() {
    form.post($route('projects.store'), {
        onSuccess: () => form.reset(),
    });
}
</script>

<template>
    <DefaultLayout>
        <Head title="Créer un projet" />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Créer un projet</h2>
            <form @submit.prevent="submit" class="mt-4 space-y-4">
                <div>
                    <label class="block text-gray-700 dark:text-gray-300">Nom</label>
                    <input v-model="form.name" type="text" class="w-full border-gray-300 dark:border-gray-600 rounded-md">
                    <div v-if="form.errors.name" class="text-red-600 dark:text-red-400">{{ form.errors.name }}</div>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300">Description</label>
                    <textarea v-model="form.description" class="w-full border-gray-300 dark:border-gray-600 rounded-md"></textarea>
                    <div v-if="form.errors.description" class="text-red-600 dark:text-red-400">{{ form.errors.description }}</div>
                </div>
                <button type="submit" :disabled="form.processing" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Créer</button>
            </form>
            <Link :href="$route('projects.index')" class="mt-4 inline-block text-blue-600 dark:text-blue-400">Retour aux projets</Link>
        </div>
    </DefaultLayout>
</template>
