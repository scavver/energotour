<template>
    <div class="sticky-top sticky-offset p-3 vh-twitter">
        <a class="twitter-timeline" data-height="100%" href="https://twitter.com/energotour?ref_src=twsrc%5Etfw">Tweets by energotour</a>
    </div>
</template>

<script>
    export default {
        mounted() {
            let twitterScript = document.createElement('script');
            twitterScript.setAttribute('src', 'https://platform.twitter.com/widgets.js');
            document.head.appendChild(twitterScript);
        },
    }
</script>
