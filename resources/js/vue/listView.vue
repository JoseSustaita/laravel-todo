<template>
    <div>
        <div v-for="(todo, index) in todos" :key="index">
            <list-item
                :todo="todo"
                class="todo"
                v-on:todochanged="$emit('reloadlist')"
            />
        </div>
    </div>
</template>

<script>
import listItem from "./listItem.vue";

export default {
    props: ["todos"],
    components: {
        listItem
    }
};
</script>

<style scoped>
.item {
    background: #e6e6e6;
    padding: 5px;
    margin-top: 5px;
    background: rgba(255, 255, 255, 0.25);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.18);
}
</style>
