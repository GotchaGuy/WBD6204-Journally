<template>
    <div class="container">


        <div class="row justify-content-center" v-for="(post, index) in posts">
            <div class="col-md-6 mb-3">
                <a :href="'/posts/' + post.id">
                    <div class="card hvr-underline-from-left md-4">
                        <div v-if="post.image" class="box">
                        <img :src="post.image" alt="notesImage" class="card-img-top">
                        </div>
                            <div class="card-header row">
                               <div class="col"><strong>{{post.title}}</strong> | {{post.timestamp}}</div>
                            <div class="col text-right">{{post.category.title}}</div>
                            </div>
                        <div class="card-body">
                            <div class="card-text">{{post.body}}..</div>
                        </div>
                    </div>
                </a>
            </div>

        </div>


    </div>
</template>

<script>
    export default {
        props: ['dataPosts'],
        data() {
            return {
                posts: []
            }
        },
        mounted() {
            this.posts = JSON.parse(this.dataPosts);
            EventBus.$on('post-submitted', (post) => {
                this.posts.unshift(post);
            })
        }
    }

</script>