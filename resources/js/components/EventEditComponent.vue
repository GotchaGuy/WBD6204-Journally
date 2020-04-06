<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-2">
                <div class="card pb-3 post">
                    <form enctype="multipart/form-data">
                        <div class="card-header">
                                <strong>{{event.date}}</strong>
                              <a :href="'/calendar/' + event.id" role="button"
                               class=" btn btn-outline-success float-right  ml-1 mb-2">Save</a>
                        </div>
                        <div class="card-body">
                             <select name="status" id="status" class="form-control"
                                        v-model="event.type">
                                    <option value="#" disabled hidden>Choose Status here...</option>
                                    <option v-for="status in statuses" v-bind:value="status.id">
                                        {{status.title}}
                                    </option>
                                </select>
                            <textarea class="card-text md-12 form-control" name="body" id="body"
                                      placeholder="Write your event here...">{{event.content}}</textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["dataEvent"],
        data() {
            return {
                event: {}
            }
        },
        mounted() {
            this.event = JSON.parse(this.dataEvent);
        },

    }

</script>