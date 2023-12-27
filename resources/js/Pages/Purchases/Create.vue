<script setup>
import { getToday } from '@/common';
import { onMounted, reactive } from 'vue';

// ページ読み込み後に即実行
onMounted(() => {
    form.date = getToday();
})

const form = reactive({ date: null });

</script>

<template>
<h1>purchases/create</h1>
日付<br>
<input type="date" name="date" v-model="form.date">

</template>
