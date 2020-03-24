<template>
    <div class="container">


        <div class="row justify-content-center" v-for="(post, index) in posts">
            <div class="col-md-6 mb-2">
                <a :href="'/posts/' + post.id">
                    <div class="card">
                        <div class="card-header"><strong>{{post.title}}</strong></div>
                        <div class="card-body"
                             :style="'background-image:url(' + post.image + ')'"
                        >
                            <div class="card-body">{{post.body}}</div>
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