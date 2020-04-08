<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-2">
                <form enctype="multipart/form-data">
                    <div class="card pb-3 post">
                        <div class="card-header">
                            <strong>What do you have planned?</strong>
                        </div>
                        <div class="card-body">
                            <select name="status" id="status" class="form-control"
                                    v-model="newEvent.type">
                                <option selected disabled hidden>Type of event</option>
                                <option v-for="status in statuses" v-bind:value="status.id">
                                    {{status.title}}
                                </option>
                            </select>
                            <textarea class="card-text md-12 mt-4 form-control" name="body" id="body"
                                      placeholder="Write your event details here..."
                                      v-model="newEvent.content">
                            </textarea>
                            <!--                            date picker-->
                            <div style="width: 300px; border: 1px solid #d9d9d9; border-radius: 4px" class="mt-4">
                                <a-calendar :fullscreen="false" :header-render="headerRender"
                                            @panelChange="onPanelChange"/>
                            </div>
                            <div class="form-control">{{this.newEvent.date}}</div>
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
                    date: ''

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
            onPanelChange(value, mode) {
                console.log(value);
                this.newEvent.date = moment().format('MMMM Do YYYY - dddd', value);
                console.log(this.newEvent.date);
            },
            headerRender({value, type, onChange, onTypeChange}) {
                const start = 0;
                const end = 12;
                const monthOptions = [];

                const current = value.clone();
                const localeData = value.localeData();
                const months = [];
                for (let i = 0; i < 12; i++) {
                    current.month(i);
                    months.push(localeData.monthsShort(current));
                }
                //
                // const month = value.month();
                //
                // const year = value.year();
                // const options = [];
            }
        }
    }

</script>