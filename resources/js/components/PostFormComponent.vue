<template>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6 mb-2">
                <div class="card post-form">
                    <form enctype="multipart/form-data">
                        <div class="card-header row">
                            <div class="col">
                                <label for="title">Title:</label>
                                <input class="form-control md-6" type="text" name="title" id="title"
                                       placeholder="Your title here..."
                                       v-model="post.title">
                            </div>
                            <div class="col">
                                <label for="category">Category:</label>
                                <select name="category" id="category" class="form-control"
                                        v-model="post.category_id">
                                    <option v-for="category in categories" :value="category.id">
                                        {{category.title}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="custom-control custom-switch mb-2">
                                <input type="checkbox" class="custom-control-input" id="favorite" v-model="post.favorite">
                                <label class="custom-control-label" for="favorite">Favorite</label>
                            </div>
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
                            <textarea class="card-text form-control mt-3" name="body" v-model="post.body" id="body"
                                      placeholder="Your thoughts here..."></textarea>
                        </div>

                        <button type="button" class="btn btn-primary mb-3 mr-3 float-right" @click="submitPost()">Save
                        </button>
                    </form>
                </div>

                <div><a class="btn btn-primary mt-2 categ" href="/categories">Edit Categories</a></div>

            </div>

        </div>


    </div>
</template>

<script>
    export default {
        props: ['dataCategories'],
        data() {
            return {
                post: {
                    favorite: false,
                    image: '',
                },
                dialogImageUrl: '',
                dialogVisible: false,
                categories: {},
                headers: {'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content}

            }
        },
        mounted() {
            this.categories = JSON.parse(this.dataCategories);
        },
        methods: {
            submitPost() {
                axios.post('/api/posts', this.post)
                    .then((response) => {
                        console.log(response.data);
                        EventBus.$emit('post-submitted', response.data);
                    })
            },
            handleUpload(result, file) {
                console.log(result);
                this.post.image = "/storage/" + result.name
            },
        }
    }

</script>