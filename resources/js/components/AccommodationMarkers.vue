<template>
    <div v-if="isLoading" class="d-flex justify-content-center">
        <div class="spinner">
            <div class="cube1"></div>
            <div class="cube2"></div>
        </div>
    </div>

    <yandex-map v-else :coords="coords" :scroll-zoom="scroll" :zoom="zoom" :cluster-options="clusterOptions" class="ymap-class">
        <ymap-marker
                v-for="hotel in hotels.data"
                :callbacks="callbacks(hotel)"
                :coords="hotel.coords"
                :hint-content="hotel.name"
                :key="hotel.name"
                marker-id="1"
                cluster-name="1"
        ></ymap-marker>
    </yandex-map>
</template>

<script>
    export default {
        data: () => ({
            isLoading: true,        // Bootstrap spinner
            /* - - - - - - - - - - - - - - - - - - - - - - - - - */
            coords: [44.96563429952982, 34.418236698025645],
            hotels: [],
            scroll: false,
            zoom: 8,

            clusterOptions: {
                '1': {
                    clusterDisableClickZoom: true,
                    clusterOpenBalloonOnClick: false,
                }
            }
        }),
        async mounted() {
            await Promise.all([this.getCoords()])
                .catch( () => { this.isLoading = false; });

            this.getCoords();
        },
        methods: {
            callbacks(hotel) {
                return { click: function() { window.location.replace('/hotels/' + hotel.slug) } } // API Link: /api/coords
            },
            getCoords() {
                this.isLoading = true;

                axios.get('https://energotour.com/api/coords')
                    .then(response => {
                        this.hotels = response.data
                    })
                    .finally(() => {
                        this.isLoading = false;
                    });
            }
        }
    }
</script>
