<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <!--                <a-calendar>-->
                <!--                    <ul class="events" slot="dateCellRender" slot-scope="value">-->
                <!--                        <li v-for="item in getListData(value)" :key="item.content">-->
                <!--                            <a-badge :status="item.type" :text="item.content"/>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                    <template slot="monthCellRender" slot-scope="value">-->
                <!--                        <div v-if="getMonthData(value)" class="notes-month">-->
                <!--                            <section>{{getMonthData(value)}}</section>-->
                <!--                            <span>Backlog number</span>-->
                <!--                        </div>-->
                <!--                    </template>-->
                <!--                </a-calendar>-->
                <a-calendar @panelChange="onPanelChange" @select="onSelect">
                    <template slot="dateCellRender" slot-scope="value"></template>
                    <template slot="monthCellRender" slot-scope="value"></template>
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
                post: {}
            }
        },
        mounted() {
            this.post = JSON.parse(this.dataPost);
        },
        methods: {
            getListData(value) {
                let listData;
                switch (value.date()) {
                    case 8:
                        listData = [
                            {type: 'warning', content: 'This is warning event.'},
                            {type: 'success', content: 'This is usual event.'},
                        ];
                        break;
                    case 10:
                        listData = [
                            {type: 'warning', content: 'This is warning event.'},
                            {type: 'success', content: 'This is usual event.'},
                            {type: 'error', content: 'This is error event.'},
                        ];
                        break;
                    case 15:
                        listData = [
                            {type: 'warning', content: 'This is warning event'},
                            {type: 'success', content: 'This is very long usual event。。....'},
                            {type: 'error', content: 'This is error event 1.'},
                            {type: 'error', content: 'This is error event 2.'},
                            {type: 'error', content: 'This is error event 3.'},
                            {type: 'error', content: 'This is error event 4.'},
                        ];
                        break;
                    default:
                }
                return listData || [];
            },

            getMonthData(value) {
                if (value.month() === 8) {
                    return 1394;
                }
            },
        },

    }

</script>

