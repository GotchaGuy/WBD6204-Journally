<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-2">
                <div class="card pb-3 post">
                    <form enctype="multipart/form-data">
                        <div class="card-header row">
                            <div class="col">
                                <input type="text" id="title" class="form-control" name="title"
                                       v-model="post.title">
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-success
                             float-right  ml-1 mb-2 " @click="updatePost(post.id)">
                                    Save
                                </button>
                                <a :href="'/posts/' + post.id + '/edit'" tabindex="-1" role="button"
                                   class=" btn btn-primary float-right disabled" aria-disabled="true">Edit</a>
                                <button type="button" class="btn btn-outline-danger
                             float-right mr-3" @click="deletePost(post.id)">
                                    Delete
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <select name="category" id="category" class="form-control md-6 mb-3"
                                    v-model="post.category_id">
                                <option v-for="category in categories" :value="category.id">
                                    {{category.title}}
                                </option>
                            </select>

                            <textarea class="card-text md-12 form-control mb-3" name="body" id="body"
                                      placeholder="Write your thoughts here..." v-model="post.body"></textarea>

                            <div id="upload" class="align-content-center">
                            <el-upload
                                    class="upload-demo mx-auto"
                                    drag
                                    action="/api/image/upload"
                                    :headers="headers"
                                    :on-success="handleUpload">
                                <img v-if="post.image" :src="post.image" class="">
                                <div v-else>
                                    <i class="el-icon-upload"></i>
                                    <div class="el-upload__text">Drop file here or <em>click to upload</em></div>
                                    <div class="el-upload__tip" slot="tip">jpg/png files with a size less than 500kb
                                    </div>
                                </div>
                            </el-upload>
                            <el-dialog :visible.sync="dialogVisible">
                                <img width="100%" :src="dialogImageUrl" alt="">
                            </el-dialog>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["dataPost"],
        data() {
            return {
                post: {
                    image: ''
                },
                dialogImageUrl: '',
                dialogVisible: false,
                categories: {},
                headers: {'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content}

            }
        },
        mounted() {
            this.post = JSON.parse(this.dataPost);
            console.log(this.post);
            axios.get('/api/categories')
                .then((response) => {
                    this.categories = response.data;
                    console.log(this.categories);
                })
        },
        methods: {
            updatePost($id) {
                axios.put('/api/posts/' + $id, this.post, $id)
                    .then((response) => {
                        window.location.href = '/home';
                    })
            },
            deletePost($id) {
                axios.delete('/api/posts/' + $id)
                    .then((response) => {
                        window.location.href = '/home';
                    })
            },
             handleUpload(result, file) {
                console.log(result);
                this.post.image = "/storage/" + result.name
            },
        }

    }

</script>