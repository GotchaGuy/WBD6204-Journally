<template>
    <div>
        <div class="within">
        <div class="float-left mt-3 ml-2">
        <img src="/images/logo.PNG" width="30" height="30" alt="logo" >
        </div>

        <nav class="navbar navbar-expand-lg sm-4 navbar-light bg-light float-right">
            <div class="collapse navbar-collapse " id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/calendar">Calendar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/favorites">Favorites</a>
                    </li>

                </ul>
            </div>
        </nav>
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