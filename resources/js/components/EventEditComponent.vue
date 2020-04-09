<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-2">
                <form enctype="multipart/form-data">
                    <div class="card pb-3 post">
                        <div class="card-header">
                            <strong>{{event.timestamp}}</strong>

                            <button type="button" class="btn btn-outline-success
                             float-right  ml-1"
                                    @click="updateEvent(event.id)">
                                Save
                            </button>
                            <button type="button" class="btn btn-outline-danger
                             float-right mr-3"
                                    @click="deleteEvent(event.id)">
                                Delete
                            </button>

                        </div>
                        <div class="card-body">
                            <select name="status" id="status" class="form-control"
                                    v-model="event.status.id">
                                <option v-for="status in statuses" :value="status.id">
                                    {{status.title}}
                                </option>
                            </select>
                            <textarea name="id" hidden v-model="updated.user_id">{{event.user_id}}</textarea>
                            <textarea class="card-text md-12 mt-4 form-control" name="body" id="body"
                                      placeholder="Write your event here..." v-model="event.content"></textarea>
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
                    status: {
                        id: ''
                    }
                },
                statuses: {},
                updated: {
                    content: '',
                    user_id: '',
                    type: ''
                }
            }
        },
        mounted() {
            this.event = JSON.parse(this.dataEvent);
            axios.get('/api/statuses')
                .then((response) => {
                    this.statuses = response.data;
                    console.log(this.statuses);
                })

        },
        methods: {
            updateEvent($id) {
                axios.put('/api/events/' + $id, this.event, $id)
                    .then((response) => {
                        console.log(response.data);
                    })
            },
            deleteEvent($id) {
                axios.delete('/api/events/' + $id)
                    .then((response) => {
                        window.location.href = '/calendar';
                    })
            }
        }
    }

</script>