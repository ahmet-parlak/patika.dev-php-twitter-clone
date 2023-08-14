<?php includeStaticFile('header'); ?>

<body class="flex">
    <?php includeStaticFile('sidebar'); ?>

    <!-- Content -->
    <div class="container w-598 border-r">
        <div class="alerts relative h-3"></div>
        <!-- Tweet Box -->
        <div class="mt-8 p-4 border-t">
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

        <!-- Tweets -->
        <div class="tweets mt-2 space-y-4">
            <?php
            foreach ($discover as $tweet) {
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