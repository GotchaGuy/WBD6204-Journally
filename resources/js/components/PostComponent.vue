<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-2">
                <div class="card pb-3 post">
                    <div class="card-header"><strong>{{post.title}}</strong> | {{post.timestamp}}
                         <div v-if="post.favorite" class="fave"></div>
                         <button type="button" class="btn btn-success
                             float-right  ml-1 disabled">
                                Save
                            </button>
                        <a :href="'/posts/' + post.id + '/edit'" role="button"
                           class=" btn btn-outline-primary float-right">Edit</a>
                    </div>
                    <div class="card-body">
                        <div class="card-text">{{post.body}}</div>
                         <div v-if="post.image" class="box mt-5">
                            <img :src="post.image" alt="notesImage" class="card-img-top">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["dataPost", "dataCategories"],
        data() {
            return {
                post: {},
                categories: {}
            }
        },
        mounted() {
            this.post = JSON.parse(this.dataPost);
        },
        methods: {
            //
        }

    }

</script>