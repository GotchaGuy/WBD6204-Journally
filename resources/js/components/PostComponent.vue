<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-2">
                <div class="card pb-3 post">
                    <div class="card-header"><strong>{{post.title}}</strong>
                       <a :href="'/posts/' + post.id" tabindex="-1" role="button"
                           class=" btn btn-success float-right  ml-1 disabled " aria-disabled="true">Save</a>
                        <a :href="'/posts/' + post.id + '/edit'" role="button"
                           class=" btn btn-outline-primary float-right">Edit</a>

                    </div>
                    <div class="card-body"
                         :style="'background-image:url(' + post.image + ')'"
                    >
                        <div class="card-text">{{post.body}}</div>
                    </div>
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