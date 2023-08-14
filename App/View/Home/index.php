<?php includeStaticFile('header'); ?>

<body>

    <?php includeStaticFile('navbar'); ?>

    <div class="alerts relative h-12"></div>

    <!-- Content -->
    <div class="container mx-auto w-598">
        <!-- Tweet Box -->
        <div class="mt-8 p-4 border rounded-lg shadow-md">
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
        <div class="tweets mt-8 space-y-4">

            <!-- Template -->
            <?php
            foreach ($discover as $tweet) { ?>
                <div class="border rounded-lg p-4 flex space-x-4">
                    <img class="w-11 h-11 bg-gray-300 rounded-full" src="<?= $tweet->photo_url ?>" alt="profile photo"
                        onerror="this.src='<?= DEFAULT_PROFILE_PHOTO_URL ?>'">
                    <div class="flex flex-col">
                        <div class="flex space-x-2">
                            <a href="<?= route("user/$tweet->username") ?>" class="font-bold"><?= $tweet->name ?></a>
                            <p class="text-gray-500 text-md">@
                                <?= $tweet->username ?> •
                                <?= $tweet->date ?>
                            </p>
                        </div>
                        <p class="">
                            <?= $tweet->content ?>
                        </p>
                    </div>
                </div>
            <?php } ?>

            <!-- #Template# -->
            <!-- Other tweets will be listed here -->
        </div>
    </div>

    <!-- Footer -->
    <?php
    $scripts = ['js/home.js'];
    includeStaticFile('footer', compact('scripts'));
    ?>
</body>

</html>