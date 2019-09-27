<template>
    <div v-if="isLoading" class="vh-100 d-flex justify-content-center">
        <div class="spinner align-self-center">
            <div class="cube1"></div>
            <div class="cube2"></div>
        </div>
    </div>

    <main v-else class="container pb-4">
        <h3 class="pt-3 pb-3 bordered-bottom mb-3"><small class="pl-3 pr-2"><a href="/landmarks"><i class="fas fa-arrow-left fa-fw"></i></a></small> {{ landmark.data.title }}</h3>
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
