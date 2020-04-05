<template>
    <div>
        <nav class="navbar navbar-expand-lg sm-4 navbar-light bg-light">
            <img src="/images/logo.PNG" width="30" height="30" alt="logo">
            <a class="navbar-brand ml-3" href="/home">Journally</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown active">
                        <a class="nav-link" href="/home" id="navbarDropdownMenuLink"
                           aria-haspopup="true" aria-expanded="false">
                            Notes
                        </a>
                        <div class="dropdown-menu mt-n1" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" v-for="category in categories" :href="'/home/categories/' + category.id">{{category.title}}</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/calendar">Calendar</a>
                    </li>
                    <!--                    <span class="sr-only">(current)</span>-->
                    <li class="nav-item">
                        <a class="nav-link" href="/favorites">Favorites</a>
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
                activeIndex2: '1',
                categories: {}
            }
        },
        mounted() {
            axios.get('/api/categories')
            .then( (response)=> {
                this.categories = response.data;
            })

        },
        methods: {
            handleSelect(key, keyPath) {
                console.log(key, keyPath);
            }
        }

    }
</script>