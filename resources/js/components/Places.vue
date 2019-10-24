<template>
    <div class="container-fluid">
        <div class="row">
            <!-- Search Filters -->
            <aside class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2 order-2 order-sm-2 order-md-1 p-3">
                <h4 class="mb-3">Фильтры <small><a class="ml-1" href="/places"><i class="fas fa-retweet fa-fw" title="Сбросить все фильтры"></i></a></small></h4>

                <div class="form-group">
                    <select v-model="t" @change="onChange" class="custom-select" id="type">
                        <option value="" selected>Все типы</option>
                        <option v-for="type in types" :value="type.id">{{ type.name }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <select v-model="r" @change="onChange" class="custom-select" id="region">
                        <option value="" selected>Весь Крым</option>
                        <option v-for="region in regions" :value="region.id">{{ region.name }}</option>
                    </select>
                </div>

                <h4 class="mb-3">Услуги и удобства</h4>

                <div v-for="property in properties" id="property">
                    <input type="checkbox" :id="property.id" v-model="p" :value="property.id" @change="onChange">
                    <label :for="property.id"><i :class="property.class" class="fa-fw mx-1"></i> {{ property.title }}</label>
                </div>
            </aside>
            <!-- End: Search Filters -->

            <!-- Places -->
            <main class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-8 order-1 order-sm-1 order-md-2 min-vh-100 px-0 order-0 order-sm-0 order-md-1 order-xl-1 single p-3">
                <template v-if="isLoading">
                    <div class="d-flex justify-content-center">
                        <div class="spinner">
                            <div class="cube1"></div>
                            <div class="cube2"></div>
                        </div>
                    </div>
                </template>

                <template v-else>
                    <a v-for="place in enabledPlaces" :href="'places/' + place.slug" class="card-place">
                        <div class="card shadow-sm mb-3">
                            <div class="card-discount rounded">- {{ place.discount }} <i class="fas fa-percentage fa-fw"></i></div>
                            <div class="card-price rounded">от {{ place.price }} <i class="fas fa-ruble-sign fa-fw"></i></div>

                            <div class="row no-gutters">
                                <div class="col-md-5" style="height: 189px !important;">
                                    <img :src="place.image" class="card-img" alt="">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title text-white">{{ place.name }}</h5>
                                        <p class="card-text text-white" style="margin-bottom: 2.65rem !important; opacity: 0.75;">
                                            <i class="fas fa-landmark fa-fw mr-2"></i> {{ place.type.name }}<br>
                                            <i class="fas fa-map-marker-alt fa-fw mr-2"></i> {{ place.region.name }}
                                        </p>

                                        <div class="d-flex">
                                            <div class="card-properties align-self-center">
                                                <i v-for="property in place.properties" :class="property.class" class="fa-fw mr-1" :title="property.title"></i>
                                            </div>

                                            <!-- <a :href="'places/' + place.slug" class="btn btn-outline-primary align-self-center ml-auto">Подробнее</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </template>
            </main>
            <!-- End: Places -->
            <aside class="col-12 col-sm-12 d-md-none d-lg-none d-xl-block col-xl-2 order-3 order-sm-3 order-md-3 p-0">
                <div class="sticky-top sticky-offset p-3 vh-twitter">
                    <a class="twitter-timeline" data-height="100%" href="https://twitter.com/energotour?ref_src=twsrc%5Etfw">Tweets by energotour</a>
                    <!-- calc(100% - 3.4rem) -->
                </div>
            </aside>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            isLoading: true,        // Bootstrap spinner
            /* - - - - - - - - - - - - - - - - - - - - - - - - - */
            types: [],              // Mounted API Array
            regions: [],            // Mounted API Array
            properties: [],         // Mounted API Array
            /* - - - - - - - - - - - - - - - - - - - - - - - - - */
            r: '',          // Selected Region
            t: '',          // Selected Type
            p: [],          // Checked Properties
            /* - - - - - - - - - - - - - - - - - - - - - - - - - */
            places: []              // Mounted API (+ URL Query) Places Array
        }),
        watch: {
            '$route': function() {
                this.getPlaces()
            }
        },
        computed : {
          enabledPlaces: function() {
              return this.places.filter(place => place.enabled)
          }
        },
        async mounted() {
            await Promise.all([this.getTypes(), this.getRegions(), this.getProperties()])
                .catch( () => { this.isLoading = false; });

            this.getPlaces();

            let twitterScript = document.createElement('script');
            twitterScript.setAttribute('src', 'https://platform.twitter.com/widgets.js');
            document.head.appendChild(twitterScript);
        },
        methods: {
            getTypes() {
                axios.get('/api/types')
                    .then(response => {
                        this.types = response.data
                    })
            },
            getRegions() {
                axios.get('/api/regions')
                    .then(response => {
                        this.regions = response.data
                    })
            },
            getProperties() {
                axios.get('/api/properties')
                    .then(response => {
                        this.properties = response.data
                    })
            },
            onChange() {
                const { r, t, p } = this;
                const queryParams = {
                    r,
                    t,
                    p: p.join()
                };
                this.$router.push({ query: queryParams });
            },
            getPlaces() {
                this.isLoading = true;

                axios.get('/api' + this.$route.fullPath)
                    .then(response => {
                        this.places = response.data.data
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
        font-weight: 300;

        label, input {
            position: absolute;
            // left: 0;
            top: auto;
            bottom: auto;
            color: rgba(255, 255, 255, 0.5);
            transition: color 0.2s ease-in-out;
        }

        label:hover {
            color: rgba(255, 255, 255, 0.75);
        }

        :checked + label {
            color: #d8993d;
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
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
            border: solid 1px #7e67b8 !important;
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
