<?php includeStaticFile('header'); ?>

<body class="flex">
    <?php includeStaticFile('sidebar'); ?>

    <!-- Content -->
    <div class="container w-598 border-r">
        <div class="header sticky top-0 backdrop-blur-3xl border-b">
            <div class="px-4 py-2 font-bold text-xl">
                Home
            </div>

            <div class="flex">
                <button id="discover" action="<?= route('discover') ?>" onclick="loadFlow(this)"
                    class="hover:bg-gray-200 py-3 flex-auto  px-2 border-default font-bold text-lg text-dark">
                    Discover
                </button>

                <button id="friends" action="<?= route('friends') ?>" onclick="loadFlow(this)"
                    class="hover:bg-gray-200 py-3 flex-auto  px-2 flow-active border-default font-bold text-lg text-dark">
                    Friends
                </button>
            </div>
        </div>

        <!-- Tweet Box -->
        <div class="p-4">
            <form id="tweet-form" action="<?= route('tweet') ?>">
                <textarea id="tweet_content" class="w-full p-2 text-gray-700 resize-none outline-0 text-lg"
                    placeholder="What's happening?" oninput="charCount(this)" minlength="1" maxlength="180"
                    rows="3"></textarea>
                <div class="flex flex-row-reverse justify-between items-center mt-2">
                    <button type="submit"
                        class="bg-default text-white px-6 py-2 rounded-full font-bold hover:bg-hoverblue cursor-pointer disabled:bg-disabled disabled:hover:bg-disabled disabled:cursor-default disabled:text-gray-50"
                        disabled>
                        <div class="flex">Tweet</div>
                    </button>

                    <div class="flex items-center space-x-2">
                        <span id="char-count" class="text-gray-500"></span>
                    </div>
                </div>
            </form>
        </div>


        <div class="tweets-loading">
            <?php includeStaticFile('widgets/loading'); ?>
        </div>

        <!-- Tweets -->
        <div class="tweets space-y-4">
            <?php
            if (count($friends) == 0) { ?>
                <div class="info-box border-t text-center py-4">
                    <p>There is no tweet to show here yet.</p>
                    <p class="mt-2">Check out the Discover feed to view recent tweets and discover new users.</p>
                </div>
            <?php } ?>

            <?php
            foreach ($friends as $tweet) {
                includeStaticFile('widgets/tweet', compact('tweet'));
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <?php
    $scripts = ['js/home.js'];
    includeStaticFile('footer', compact('scripts'));
    ?>
</body>

</html>