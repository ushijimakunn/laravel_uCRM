<script setup>

</script>
<template>
    <div v-if="$page.props.flash.message" class="bg-blue-200">
        {{$page.props.flash.message}}
    </div>
    <h1>Index Page</h1>
</template>
