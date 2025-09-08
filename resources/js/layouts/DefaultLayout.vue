<!-- resources/js/Layouts/DefaultLayout.vue -->
<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div>
        <nav>
            <Link :href="$route('home')">Accueil</Link>
            <Link :href="$route('dashboard')">Tableau de bord</Link>
            <Link :href="$route('projects.index')">Projets</Link>
            <Link :href="$route('tasks.index')">Tâches</Link>
            <Link href="/logout" method="post" as="button">Déconnexion</Link>
        </nav>
        <main>
            <slot />
        </main>
        <footer>© 2025 TaskFlow</footer>
    </div>
</template>

<style scoped>
nav {
    background: #333;
    color: white;
    padding: 1rem;
}
nav a, nav button {
    color: white;
    margin-right: 1rem;
    text-decoration: none;
}
main {
    padding: 2rem;
}
</style>