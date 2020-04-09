<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-2">
                <form enctype="multipart/form-data" class="make">
                    <div class="card pb-3 post">
                        <div class="card-header">
                            <strong>What do you have planned?</strong>
                        </div>
                        <div class="card-body row">
                            <div class="col">
                                <label for="status">Type of event:</label>
                                <select name="status" id="status" class="form-control"
                                        v-model="newEvent.type">
                                    <option value="Type of event" selected disabled hidden>Type of event</option>
                                    <option v-for="status in statuses" v-bind:value="status.id">
                                        {{status.title}}
                                    </option>
                                </select>
                                <textarea class="card-text md-12 mt-4 form-control" name="body" id="body"
                                          placeholder="Write your event details here..."
                                          v-model="newEvent.content">
                            </textarea>
                                <!--                                <div class="form-control mt-3">{{this.newEvent.date}}</div>-->
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
                    type: '',
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
                        console.log(response.data);
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