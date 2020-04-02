<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-2">
                <div class="card">
                    <form enctype="multipart/form-data">
                        <div class="card-header row">
                            <div class="col">
                                <input class="form-control md-6" type="text" name="title" id="title"
                                       placeholder="Your title here..."
                                       v-model="post.title">
                            </div>
                            <div class="col">
                                <select name="category" id="category" class="form-control"
                                        v-model="post.category_id">
<!--                                    <option value="" selected disabled hidden>Note Category here...</option>-->
                                    <option v-for="category in categories" v-bind:value="category.id">
                                        {{category.title}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--                        <label for="image"></label>-->
                            <!--                        <input type="file" id="image" name="image"  alt="" v-model="post.image">-->
                            <el-upload
                                    action="https://jsonplaceholder.typicode.com/posts/"
                                    list-type="picture-card"
                                    :on-preview="handlePictureCardPreview"
                                    :on-remove="handleRemove">
                                <i class="el-icon-plus"></i>
                            </el-upload>
                            <el-dialog :visible.sync="dialogVisible">
                                <img width="100%" :src="dialogImageUrl" alt="">
                            </el-dialog>

                            <!--                                <label for="body">Content</label>-->
                            <textarea class="card-text form-control mt-3" name="body" v-model="post.body" id="body"
                                      placeholder="Your thoughts here..."></textarea>
                        </div>

                        <button type="button" class="btn btn-primary mb-3 mr-3 float-right" @click="submitPost()">Send
                        </button>
                    </form>
                </div>
            </div>

        </div>


    </div>
</template>

<script>
    export default {
        props: ['dataCategories'],
        data() {
            return {
                post: {},
                dialogImageUrl: '',
                dialogVisible: false,
                categories: '',
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
            handleRemove(file, fileList) {
                console.log(file, fileList);
            },
            handlePictureCardPreview(file) {
                this.dialogImageUrl = file.url;
                console.log(this.dialogImageUrl);
                this.dialogVisible = true;
            }
        }
    }

</script>