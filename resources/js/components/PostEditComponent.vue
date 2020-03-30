<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-2">
                <div class="card pb-3 post">
                    <form enctype="multipart/form-data">
                        <div class="card-header row">
                            <div class="col">
                            <input type="text" id="title" class="form-control" name="title" :placeholder="post.title">
                            </div>
<!--                            <div class="col">-->
<!--                                // add the select-->
<!--                            </div>-->
                            <div class="col">
                            <a :href="'/posts/' + post.id" role="button"
                               class=" btn btn-outline-success float-right  ml-1 mb-2">Save</a>
                            <a :href="'/posts/' + post.id + '/edit'" tabindex="-1" role="button"
                               class=" btn btn-primary float-right disabled" aria-disabled="true">Edit</a>
                            </div>
                        </div>
                        <div class="card-body"
                             :style="'background-image:url(' + post.image + ')'"
                        >
                            <textarea class="card-text md-12 form-control" name="body" id="body" placeholder="Write your thoughts here...">{{post.body}}</textarea>
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
                post: {}
            }
        },
        mounted() {
            this.post = JSON.parse(this.dataPost);
        },

    }

</script>