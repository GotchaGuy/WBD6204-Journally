<template>
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-md-6 mb-2">
                <div class="card">
                    <form  enctype="multipart/form-data">


                    <label for="title">Title</label>
                    <input class="card-header" type="text" name="title" id="title" v-model="post.title">

                    <div class="card-body">
<!--                        <label for="image"></label>-->
<!--                        <input type="file" id="image" name="image"  alt="" v-model="post.image">-->
<!--// element ui component-->
                        <label for="body">Content</label>
                        <textarea name="body" v-model="post.body" id="body" placeholder="Your thoughts here..."></textarea>
                    </div>

                        <button type="button" @click="submitPost()" >Send</button>
                    </form>
                </div>
            </div>

        </div>


    </div>
</template>

<script>
    export default {
        data() {
            return {
                post: {}
            }
        },
        mounted() {

        },
        methods: {
            submitPost() {
                axios.post('/api/posts', this.post)
                    .then((response)=>{
                        console.log(response.data);
                        EventBus.$emit('post-submitted', response.data);
                    })
            }
        }
    }

</script>