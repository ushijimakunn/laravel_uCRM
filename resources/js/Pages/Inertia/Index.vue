<script setup>
    import { Link } from '@inertiajs/vue3';
    defineProps({
        blogs: Array
    })

</script>
<template>
    <div v-if="$page.props.flash.message" class="bg-blue-200">
        {{$page.props.flash.message}}
    </div>
    <h1>Index Page</h1>
    <ul>
        <li v-for="blog in blogs" :key="blog.id">
                件名：<Link class="text-blue-400" :href="route('inertia.show', { id: blog.id })"> {{ blog.title }} </Link>
                本文：<Link> {{ blog.content }} </Link>
        </li>
    </ul>

</template>
