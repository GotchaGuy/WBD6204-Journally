<template>
    <div class="container categories">
        <!--category add-->
        <div class="row justify-content-center">
            <div class="col-md-3 mb-2">
                <div class="card form">
                    <form>
                        <div class="card-header row">
                            <div class="col"><strong>Add a new Category</strong></div>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control mb-3" name="title" v-model="newCategory.title">
                            <button type="button"
                                    class="btn btn-primary
                                    mb-3 mr-3 float-right"
                                    @click="submitCategory()">
                                    Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!--        category delete, update-->
            <div class="col-md-3 mb-3" v-for="(category, index) in categories">
                <div class="card hvr-underline-from-left md-4  float-left">
                    <div class="card-header row">
                        <div class="col"><strong>Category {{index}}</strong></div>
                    </div>
                    <div class="card-body">
                        <form>
                            <input type="text" class="form-control mb-3" name="title" v-model="category.title"></input>
                            <button type="button" class="btn btn-outline-success
                             float-right  ml-1 mb-3" @click="updateCategory(category, index)">
                                Save
                            </button>
                            <button type="button" class="btn btn-outline-danger
                             float-right mr-3  mb-3" @click="deleteCategory(category.id, index)">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>


        </div>

    </div>
</template>

<script>
    import ATextarea from "ant-design-vue/es/input/TextArea";

    export default {
        components: {ATextarea},
        data() {
            return {
                newCategory: {
                    title: ''
                },
                categories: {},
            }
        },
        mounted() {
            axios.get('/api/categories')
                .then((response) => {
                    this.categories = response.data;
                });


        },
        methods: {
            submitCategory() {
                axios.post('/api/categories', this.newCategory)
                    .then((response) => {
                        console.log(response.data);
                        this.categories.push(response.data);
                    })
            },
            updateCategory(category, index) {
                axios.put('/api/categories/' + category.id, category, category.id)
                    .then((response) => {
                        this.categories.splice( index, 1, category);
                    })
            },
            deleteCategory(id, index) {
                axios.delete('/api/categories/' + id)
                    .then((response) => {
                        this.categories.splice( index, 1);
                    })
            },
        }
    }

</script>