<template>
    <div class="row">
        <img class="logo-pic" src="/images/logo.PNG" alt="logo">
        <a class="navbar-brand ml-3" href="/">Journally</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown active">
                    <a class="nav-link" href="/" id="navbarDropdownMenuLink"
                       aria-haspopup="true" aria-expanded="false">
                        Notes
                    </a>
                    <div class="dropdown-menu mt-n1" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" v-for="category in categories"
                           :href="'/home/categories/' + category.id">{{category.title}}</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/calendar">Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/favorites">Favorites</a>
                </li>
            </ul>
        </div>

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
                .then((response) => {
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