<template>
    <div v-if="isLoading" class="vh-100 d-flex justify-content-center">
        <div class="spinner align-self-center">
            <div class="cube1"></div>
            <div class="cube2"></div>
        </div>
    </div>

    <main v-else class="container pb-4">
        <h3 class="pt-3 pb-3 mb-3 bordered-bottom">Достопримечательности</h3>
        <a v-for="landmark in landmarks.data" :href="'landmarks/' + landmark.slug" class="card-place">
            <div class="card mb-3">

                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img :src="landmark.cover" class="card-img" alt="">
                    </div>

                    <div class="col-7">
                        <div class="card-body">
                            <h3 class="card-title mb-0 pb-0" style="color: black !important;">{{ landmark.title }}</h3>
                            <p class="card-text pt-2" style="color: #5e6872;">
                                <i class="fas fa-map-marker-alt fa-fw mr-2"></i> {{ landmark.category.name }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </main>
</template>

<script>
    export default {
        data: () => ({
            isLoading: true,        // Bootstrap spinner
            landmarks: [],          // Mounted API Array
        }),
        async mounted() {
            await Promise.all(this.getLandmarks())
                .catch( () => { this.isLoading = false; });

            this.getLandmarks();
        },
        methods: {
            getLandmarks() {
                this.isLoading = true;

                axios.get('/api' + this.$route.fullPath)
                    .then(response => {
                        this.landmarks = response.data
                    })
                    .finally(() => {
                        this.isLoading = false;
                    })

            }
        }
    }
</script>

<style lang="scss">
    #property {
        height: 2rem;

        label, input {
            position: absolute;
            // left: 0;
            top: auto;
            bottom: auto;
            color: gray;
            transition: color 0.2s ease-in-out;
        }

        label:hover {
            color: #f3910c;
        }

        :checked + label {
            color: #f3910c;
        }

        input {
            opacity: 0;
            z-index: -1;
        }
    }

    .card-place {
        .card {
            transition: all .15s ease-in-out;
        }
        .card:hover {
            box-shadow: 0 0.25rem 0.25rem rgba(0, 0, 0, 0.075) !important;
            border: solid 1px #a0a0a0;
        }
        .card-img {
            border-radius: calc(0.25rem - 1px) 0 0 calc(0.25rem - 1px);
            height: 100%;
            object-fit: cover;
        }
        h5 {
            color: black;
            text-decoration: none;
        }
        p {
            color: black;
            text-decoration: none;
        }
    }
    a.card-place:hover {
        text-decoration: none;
    }

    .card-discount {
        position: absolute;
        background-color: #f9811b;
        color: white;
        font-weight: 600;
        padding: 5px;
        top: 10px;
        right: -5px;
        left: auto;
        z-index: 5;
    }

    .card-price {
        position: absolute;
        top: 50px;
        right: -5px;
        left: auto;
        background: #7cad64;
        color: white;
        padding: 5px;
        z-index: 5;
    }
</style>
