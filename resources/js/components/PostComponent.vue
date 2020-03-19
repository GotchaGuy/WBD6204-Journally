<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-2">
                <div class="card">
                    <div class="card-header"><strong>{{post.title}}</strong></div>
                    <div class="card-body"
                         :style="'background-image:url(' + post.image + ')'"
                    >
                        <div class="card-body">{{post.body}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [],
        data() {
            return {

            }
        },
        mounted() {

        },

    }

</script>