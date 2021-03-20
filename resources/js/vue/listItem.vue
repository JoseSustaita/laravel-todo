<template>
    <div class="item">
        <input
            type="checkbox"
            @change="updateCheck()"
            v-model="todo.completed"
        />
        <span :class="[todo.completed ? 'completed' : '', 'itemText']">
            {{ todo.name }}
        </span>
        <button @click="removeItem()" class="trashcan">
            <font-awesome-icon icon="trash" />
        </button>
    </div>
</template>

<script>
export default {
    props: ["todo"],
    methods: {
        updateCheck() {
            axios
                .put("api/todo/" + this.todo.id, {
                    todo: this.todo
                })
                .then(response => {
                    if (response.status == 200) {
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        removeItem() {
            axios
                .delete("api/todo/" + this.todo.id)
                .then(response => {
                    if (response.status == 200) {
                        this.$emit("todochanged");
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>

<style scoped>
.completed {
    text-decoration: line-through;
    color: #999;
}
.itemText {
    width: 100%;
    margin-left: 20px;
}
.item {
    display: flex;
    justify-content: center;
    align-items: center;
}
.trashcan {
    background: rgba(255, 255, 255, 0.25);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.18);
    color: red;
}
</style>
