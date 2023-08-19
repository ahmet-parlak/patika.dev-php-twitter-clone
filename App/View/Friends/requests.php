<?php includeStaticFile('header'); ?>

<body class="flex">
    <?php includeStaticFile('sidebar'); ?>

    <!-- Content -->
    <div class="container w-598 border-r">
        <div class="header">
            <div class="px-4 py-2 font-bold text-xl">
                Requests
            </div>

            <div class="flex">
                <a href="<?= route('friends') ?>"
                    class="hover:bg-gray-200 py-3 flex-auto px-2 border-default font-bold text-lg text-dark text-center">
                    Friends
                </a>

                <a href="<?= route('friends/requests') ?>"
                    class="hover:bg-gray-200 py-3 flex-auto flow-active px-2 border-default font-bold text-lg text-dark text-center">
                    Requests
                </a>
            </div>
        </div>

        <!-- Users -->
        <div class="users space-y-4">
            <?php
            if (count($requests) == 0) { ?>
                <div class="requests-count text-center mt-6">
                    There is no request
                </div>
            <?php } ?>

            <?php
            foreach ($requests as $user) {
                includeStaticFile('widgets/user', compact('user'));
            }
            ?>


        </div>
    </div>

    <!-- Footer -->
    <?php
    $scripts = ['js/friends.js'];
    includeStaticFile('footer', compact('scripts'));
    ?>
</body>

</html>