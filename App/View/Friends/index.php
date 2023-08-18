<?php includeStaticFile('header'); ?>

<body class="flex">
    <?php includeStaticFile('sidebar'); ?>

    <!-- Content -->
    <div class="container w-598 border-r">
        <div class="header">
            <div class="px-4 py-2 font-bold text-xl">
                Friends
            </div>

            <div class="flex">
                <a href="<?= route('friends') ?>"
                    class="hover:bg-gray-200 py-3 flex-auto  px-2 flow-active border-default font-bold text-lg text-dark text-center">
                    Friends
                </a>

                <a href="<?= route('friends/requests') ?>"
                    class="hover:bg-gray-200 py-3 flex-auto  px-2 border-default font-bold text-lg text-dark text-center">
                    Requests
                </a>
            </div>
        </div>

        <!-- Users -->
        <div class="users space-y-4">
            <?php
            if (count($friends) == 0) { ?>
                <div class="friends-count text-center pt-2">
                    You don't have a friend yet.
                </div>
            <?php } ?>


            <?php
            foreach ($friends as $user) {
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