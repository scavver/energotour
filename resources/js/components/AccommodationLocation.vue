<template>
    <div v-if="isLoading" class="d-flex justify-content-center">
        <div class="spinner">
            <div class="cube1"></div>
            <div class="cube2"></div>
        </div>
    </div>

    <yandex-map v-else :coords="coords" :zoom="zoom" class="ymap-class">
        <ymap-marker :coords="coords" marker-id="1" />
    </yandex-map>
</template>

<script>
    export default {
        data: () => ({
            isLoading: true,        // Bootstrap spinner
            /* - - - - - - - - - - - - - - - - - - - - - - - - - */
            hotels: [],
            name: '',
            coords: [],
            zoom: 16
        }),
        async mounted() {
            await Promise.all([this.getCoords()])
                .catch( () => { this.isLoading = false; });

            this.getCoords();
        },
        methods: {
            getCoords() {
                this.isLoading = true;

                let slug = this.$route.fullPath.match("[^\/]+$"); // - /hotels/crimea-breeze -> crimea-breeze

                axios.get('/api/coords/' + slug)
                    .then(response => {
                        this.hotels = response.data
                    })
                    .finally(() => {
                        this.name = this.hotels.data[0].name;
                        this.coords = this.hotels.data[0].coords;
                        this.isLoading = false;
                    });
            }
        }
    }
</script>
