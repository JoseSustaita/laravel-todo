<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title">Todo List</h2>
            <add-todo-form v-on:reloadlist="getList()" />
        </div>
        <list-view :todos="todos" v-on:reloadlist="getList()" />
    </div>
</template>

<script>
import listView from "./listView";
import addTodoForm from "./addTodoForm";
export default {
    components: {
        addTodoForm,
        listView
    },
    data: function() {
        return {
            todos: []
        };
    },
    methods: {
        getList() {
            axios
                .get("api/todos")
                .then(response => {
                    this.todos = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    created() {
        this.getList();
    }
};
</script>

<style scoped>
.todoListContainer {
    width: 350px;
    margin: auto;
}
.heading {
    background: rgba(255, 255, 255, 0.25);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.18);
    padding: 10px;
}
#title {
    text-align: center;
}
</style>
