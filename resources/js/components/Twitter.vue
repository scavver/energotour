<template>
    <div class="sticky-top sticky-offset p-3 vh-twitter">
        <div class="bg-dark-grayish-blue text-center h-100 overflow-hidden shadow-sm shadow-sm" style="border-radius: 0.5rem;">
            <a class="twitter-timeline" data-chrome="noborders nofooter noheader transparent" data-height="101%" data-lang="ru" data-theme="dark" href="https://twitter.com/energotour?ref_src=twsrc%5Etfw">Tweets by energotour</a>
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
