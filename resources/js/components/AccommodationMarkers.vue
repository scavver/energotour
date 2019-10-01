<template>
    <div v-if="isLoading" class="d-flex justify-content-center">
        <div class="spinner">
            <div class="cube1"></div>
            <div class="cube2"></div>
        </div>
    </div>

    <yandex-map v-else :coords="coords" :scroll-zoom="scroll" :zoom="zoom" class="ymap-class">
        <ymap-marker
                v-for="place in places.data"
                :callbacks="callbacks(place)"
                :coords="place.coords"
                :hint-content="place.name"
                :key="place.name"
                marker-id="1"
        ></ymap-marker>
    </yandex-map>
</template>

<script>
    export default {
        data: () => ({
            isLoading: true,        // Bootstrap spinner
            /* - - - - - - - - - - - - - - - - - - - - - - - - - */
            coords: [44.96563429952982, 34.418236698025645],
            places: [],
            scroll: false,
            zoom: 8
        }),
        async mounted() {
            await Promise.all([this.getCoords()])
                .catch( () => { this.isLoading = false; });

            this.getCoords();
        },
        methods: {
            callbacks(place) {
                return { click: function() { window.location.replace('/places/' + place.slug) } } // API Link: /api/coords
            },
            getCoords() {
                this.isLoading = true;

                axios.get('/api/coords/')
                    .then(response => {
                        this.places = response.data
                    })
                    .finally(() => {
                        this.isLoading = false;
                    });
            }
        }
    }
</script>
