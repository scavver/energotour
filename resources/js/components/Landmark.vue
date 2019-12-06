<template>
    <div v-if="isLoading" class="vh-100 d-flex justify-content-center">
        <div class="spinner align-self-center">
            <div class="cube1"></div>
            <div class="cube2"></div>
        </div>
    </div>

    <main v-else class="container pb-4">
        <h3 class="pt-3 pb-3 bordered-bottom mb-3"><small class="d-none d-md-inline pl-3 pr-2"><a href="/landmarks"><i class="fas fa-arrow-left fa-fw"></i></a></small> {{ landmark.data.title }}</h3>

        <template v-if="landmark.data.gallery !== null">
            <div class="row px-3 pb-3 pt-0">
                <div class="gallery card-columns px-3 my-0 py-0">
                    <template v-for="path in landmark.data.gallery.images">
                        <a :href="path" data-toggle="lightbox" data-gallery="0">
                            <div class="card border-0">
                                <img :src="path" class="card-img rounded-0" alt="">
                            </div>
                        </a>
                    </template>
                </div>
            </div>
        </template>

        <div class="landmark-content" v-html="landmark.data.content"></div>
    </main>
</template>

<script>
    export default {
        data: () => ({
            isLoading: true,        // Bootstrap spinner
            landmark: {},           // Mounted API Array
        }),
        async mounted() {
            await Promise.all(this.getLandmark())
                .catch( () => { this.isLoading = false; });

            this.getLandmark();
        },
        methods: {
            getLandmark() {
                this.isLoading = true;

                axios.get('/api' + this.$route.fullPath)
                    .then(response => {
                        this.landmark = response.data
                    })
                    .finally(() => {
                        this.isLoading = false;
                    })

            }
        }
    }
</script>

<style lang="scss">

</style>
