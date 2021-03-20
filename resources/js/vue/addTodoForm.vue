<template>
    <div class="addTodo">
        <input type="text" v-model="todo.name" />
        <font-awesome-icon
            icon="plus"
            :class="[todo.name ? 'active' : 'inactive', 'plus']"
            @click="addtodo()"
        />
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            todo: {
                name: ""
            }
        };
    },
    methods: {
        addtodo() {
            if (this.todo.name == "") {
                return;
            }
            axios
                .post("api/todo/store", {
                    todo: this.todo
                })
                .then(response => {
                    if (response.status == 201) {
                        this.todo.name = "";
                        this.$emit("reloadlist");
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
.addTodo {
    display: flex;
    justify-content: center;
    align-items: center;
}
input {
    background: #f7f7f7;
    border: 0px;
    outline: none;
    padding: 5px;
    margin-right: 5px;
    width: 100%;
}
.plus {
    font-size: 20px;
}
.active {
    color: green;
}
.inactive {
    color: gray;
}
</style>
