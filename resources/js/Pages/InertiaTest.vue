<script setup>
import { Link } from '@inertiajs/inertia-vue3'

</script>

<template>
Inertiaテストです。<br>
<a href="/">aタグ経由です</a><br>
<Link href="/">Link経由です。</Link><br>
<Link :href="route('inertia.index')">Index.vueへのリンクです。</Link><br>
<Link :href="route('inertia.show', { id: 50 })">ルートパラメータのテストです。</Link>
</template>
