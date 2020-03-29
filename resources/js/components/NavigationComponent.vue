<template>
    <div>
        <!--        <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect">-->
        <!--            <el-submenu index="1">-->
        <!--                <template slot="title"><a href="\home" >Notes</a></template>-->
        <!--                <el-menu-item index="1-1">categ one</el-menu-item>-->
        <!--                <el-menu-item index="1-2">categ two</el-menu-item>-->
        <!--                <el-menu-item index="1-3">categ three</el-menu-item>-->
        <!--            </el-submenu>-->
        <!--                 <el-menu-item index="2"><a href="\calendar" >Calendar</a></el-menu-item>-->
        <!--                <el-menu-item index="3"><a href="\favorites" >Favorites</a></el-menu-item>-->
        <!--&lt;!&ndash;            target="_blank"&ndash;&gt;-->
        <!--        </el-menu>-->
        <nav class="navbar navbar-expand-lg sm-4 navbar-light bg-light">
             <img src="/images/logo.PNG" width="30" height="30" alt="logo">
            <a class="navbar-brand ml-3" href="\home">Journally</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown active">
                        <a class="nav-link" href="\home" id="navbarDropdownMenuLink"
                           aria-haspopup="true" aria-expanded="false">
                            Notes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">categ one</a>
                            <a class="dropdown-item" href="#">categ two</a>
                            <a class="dropdown-item" href="#">categ three</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="\calendar">Calendar</a>
                    </li>
<!--                    <span class="sr-only">(current)</span>-->
                    <li class="nav-item">
                        <a class="nav-link" href="\favorites">Favorites</a>
                    </li>

                </ul>
            </div>
        </nav>

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