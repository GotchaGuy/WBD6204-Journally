<template>
    <div class="container">
        <!--category add-->
        <div class="row justify-content-center">
            <div class="col-md-4 mb-2">
                <div class="card">
                    <form>
                        <div class="card-header row">
                            <div class="col"><strong>Add a new Category</strong></div>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control mb-3" name="title" v-model="newCategory.title">
                            <button type="button"
                                    class="btn btn-primary
                                    mb-3 mr-3 float-right"
                                    @click="submitPost()">
                                Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!--        category edit, delete, update-->
            <div class="col-md-3 mb-3" v-for="(category, index) in categories">
                <div class="card hvr-underline-from-left md-4  float-left">
                    <div class="card-header row">
                        <div class="col"><strong>Category {{index}}</strong></div>
                    </div>
                    <div class="card-body">
                        <form>
                            <textarea type="text" class="form-control mb-3" name="title">{{category.title}}</textarea>
                            <a :href="'/categories/' + category.id" role="button"
                               class=" btn btn-outline-success float-right  ml-1 mb-2">Save</a>
                            <a :href="'/categories/' + category.id" role="button"
                               class=" btn btn-outline-danger float-right mr-3">Delete</a>
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
                categories: {}
            }
        },
        mounted() {
            axios.get('/api/categories')
                .then((response) => {
                    this.categories = response.data;
                });


        },
        methods: {
            submitPost() {
                axios.post('/api/categories', this.newCategory)
                    .then((response) => {
                        console.log(response.data);
                        this.categories.unshift(response.data);
                        // EventBus.$emit('post-submitted', response.data);
                    })
            },
        }
    }

</script>