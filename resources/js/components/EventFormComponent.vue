<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-2">
                <form enctype="multipart/form-data" class="make" id="event-upload">
                    <div class="card pb-3 form">
                        <div class="card-header">
                            <strong>What do you have planned?</strong>
                        </div>
                        <div class="card-body row">
                            <div class="col">
                                <label for="status_id">Type of event:</label>
                                <select name="status_id" id="status_id" class="form-control"
                                        v-model="newEvent.status_id">
                                    <option v-for="status in statuses" :value="status.id">
                                        {{status.title}}
                                    </option>
                                </select>
                                <textarea class="card-text md-12 mt-4 form-control" name="body" id="body"
                                          placeholder="What are you up to that day..."
                                          v-model="newEvent.content">
                            </textarea>
                                <button type="button" class="btn btn-primary mt-3 mr-3 float-right"
                                        @click="submitEvent()">
                                    Save
                                </button>
                            </div>
                            <div class="col mb-3 datePick">
                                <v-app>
                                    <v-row justify="center">
                                        <v-date-picker v-model="newEvent.date"></v-date-picker>
                                    </v-row>
                                </v-app>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                newEvent: {
                    status_id: '',
                    content: '',
                    date: new Date().toISOString().substr(0, 10),

                },
                statuses: {}
            }
        },
        mounted() {
            axios.get('/api/statuses')
                .then((response) => {
                    this.statuses = response.data;
                })

        },
        methods: {
            submitEvent() {
                axios.post('/api/events', this.newEvent)
                    .then((response) => {
                        document.getElementById("event-upload").reset();
                        window.location.reload();
                    })
            }
        }
    }

</script>

<style lang="scss" scoped>
    @import '~vuetify/dist/vuetify.min.css';
    @import '~@mdi/font/css/materialdesignicons.min.css';

    form.make {
        max-height: 500px;
        overflow: hidden;

        .datePick {
            height: 350px;

            .v-picker__body theme--light {
                height: 300px;
            }
        }
    }

</style>