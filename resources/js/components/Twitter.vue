<template>
    <div class="sticky-top sticky-offset p-3 vh-twitter">
        <div class="bg-white text-center h-100 overflow-hidden shadow-sm shadow-sm" style="border-top: solid 3px #e6a117">
            <a class="twitter-timeline" data-chrome="noborders nofooter noheader transparent" data-height="101%" data-lang="ru" data-theme="light" href="https://twitter.com/energotour?ref_src=twsrc%5Etfw">Tweets by energotour</a>
        </div>
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
