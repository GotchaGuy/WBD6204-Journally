<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-2">
                <form enctype="multipart/form-data">
                    <div class="card pb-3 post">
                        <div class="card-header">
                            <strong>{{event.timestamp}}</strong>
                                <a :href="'/calendar/' + event.id" role="button"
                                   class=" btn btn-outline-success float-right  ml-1">Save</a>
                                <a :href="'/posts/' + event.id" role="button"
                                   class=" btn btn-outline-danger float-right mr-3">Delete</a>
                        </div>
                        <div class="card-body">
                            <select name="status" id="status" class="form-control"
                                    v-model="event.type">
                                <option :value="event.type" selected disabled hidden>{{event.type}}</option>
                                <option v-for="status in statuses" v-bind:value="status.id">
                                    {{status.title}}
                                </option>
                            </select>
                            <textarea class="card-text md-12 mt-4 form-control" name="body" id="body"
                                      placeholder="Write your event here...">{{event.content}}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["dataEvent"],
        data() {
            return {
                event: {
                    type: '',
                    content: '',

                },
                statuses: {}
            }
        },
        mounted() {
            this.event = JSON.parse(this.dataEvent);
            axios.get('/api/statuses')
                .then((response) => {
                    this.statuses = response.data;
                })

        },

    }

</script>