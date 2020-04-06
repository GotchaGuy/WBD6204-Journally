<template>
    <div class="container">

        <div class="badge mb-5 ml-5">{{category.title}}</div>

        <div class="row justify-content-center" v-for="(post, index) in posts">
            <div class="col-md-6 mb-3" v-if="post.category.title === category.title">
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
        props: ['dataCategory'],
        data() {
            return {
                category: {},
                posts: {}
            }
        },
        mounted() {
            this.category = JSON.parse(this.dataCategory);
            console.log(this.category);
            axios.get('/api/posts')
                .then((response) => {
                    this.posts = response.data;
                });
            console.log(this.posts);
        }
    }

</script>