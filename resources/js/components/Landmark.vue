<template>
    <section>
        <div v-if="loading" class="vh-100 d-flex justify-content-center">
            <div class="spinner align-self-center">
                <div class="cube1"></div>
                <div class="cube2"></div>
            </div>
        </div>

        <main v-if="!loading && landmark" class="container pb-4">
            <h3 class="pt-3 pb-3 bordered-bottom mb-3"><small class="d-none d-md-inline pl-3 pr-2"><a href="/landmarks"><i class="fas fa-arrow-left fa-fw"></i></a></small> {{ landmark.title }}</h3>

            <template v-if="landmark.gallery">

                <div class="photo-gallery">
                    <div class="row photos">
                        <a v-for="path in landmark.gallery.images" :href="'https://energotour.com/' + path" data-toggle="lightbox" :data-gallery="landmark.slug" class="col-sm-6 col-md-4 col-lg-3 item">
                            <img class="img-fluid" :src="'https://energotour.com/' + path" style="height: 150px; width: 100%; object-fit: cover;">
                        </a>
                    </div>
                </div>

            </template>

            <div class="landmark-content" v-html="landmark.content"></div>
        </main>
    </section>
</template>

<script>
    export default {
        data: () => ({
            loading: true,  // Bootstrap spinner
            landmark: {},   // Object from API
        }),
        mounted() {
            this.getLandmark()
        },
        methods: {
            getLandmark() {
                this.loading = true;

                axios.get('/api' + this.$route.fullPath)
                    .then(response => {
                        this.landmark = response.data.data
                    })
                    .finally(() => {
                        this.loading = false;
                    })

            }
        }
    }
</script>
