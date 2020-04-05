<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <a-calendar>
                    <ul class="events" slot="dateCellRender" slot-scope="value">
                        <li v-for="item in getListData(value)" :key="item.content">
                        <a :href="'/calendar/' + item.id">
                            <a-badge :status="item.type" :text="item.content"/>
                        </a>
                        </li>
                    </ul>
                </a-calendar>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["dataPost"],
        data() {
            return {
                events: {}
            }
        },
        mounted() {
            axios.get('/api/events')
                .then((response) => {
                    this.events = response.data;
                })

        },
        methods: {
            getListData(value) {
                const date = value.format('YYYY-MM-DD');
                return (typeof this.events[date] == 'undefined') ? [] : this.events[date];
            },

        },

    }

</script>

<style>

    .ant-fullcalendar-header .ant-radio-group {
        display: none !important;
    }
</style>