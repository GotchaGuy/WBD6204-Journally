<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-2">
                <div class="card pb-3 post">
                    <div class="card-header"><strong>{{post.title}}</strong>  | {{post.timestamp}}
<!--                        | {{post.category.title}}-->


                         <button type="button" class="btn btn-success
                             float-right  ml-1 disabled">
                                Save
                            </button>
                        <a :href="'/posts/' + post.id + '/edit'" role="button"
                           class=" btn btn-outline-primary float-right">Edit</a>
<!--                        <button type="button" class="btn btn-outline-primary-->
<!--                             float-right"-->
<!--                                    :@click="editPost(post.id)">-->
<!--                                Edit-->
<!--                            </button>-->


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
            console.log(this.post);
        },
        methods: {
            // updateEvent($id) {
            //     axios.put('/api/events/' + $id, this.event, $id)
            //         .then((response) => {
            //             console.log(response.data);
            //         })
            // },
            // deletePost($id) {
            //     axios.post('/api/posts/' + $id, $id)
            //         .then((response) => {
            //             console.log(response.data);
            //         })
            // }
            // findCategTitle($id) {
            //     foreach(this.categories in this.category) {
            //         if (this.post.category_id == this.category.id) {
            //             return this.category.title;
            //         }
            //     }
            // }
        }

    }

</script>