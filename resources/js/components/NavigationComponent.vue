<template>
    <div>
        <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect">
            <el-submenu index="2">
                <template slot="title"><a href="\home" >Notes</a></template>
                <el-menu-item index="1-1">categ one</el-menu-item>
                <el-menu-item index="1-2">categ two</el-menu-item>
                <el-menu-item index="1-3">categ three</el-menu-item>
            </el-submenu>
                 <el-menu-item index="2"><a href="\calendar" target="_blank">Calendar</a></el-menu-item>
                <el-menu-item index="3"><a href="\favorites" target="_blank">Favorites</a></el-menu-item>
        </el-menu>

    </div>

</template>


<script>
    export default {
        data() {
            return {
                activeIndex: '1',
                activeIndex2: '1'
            }
        },
        methods: {
            handleSelect(key, keyPath) {
                console.log(key, keyPath);
            }
        }

    }
</script>