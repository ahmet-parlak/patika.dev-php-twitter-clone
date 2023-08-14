<?php includeStaticFile('header'); ?>

<body>

    <?php includeStaticFile('navbar'); ?>

    <div class="alerts relative h-3"></div>

    <!-- Content -->
    <div class="container mx-auto w-598">
        <div class="user">
            <div class="cover h-48 bg-default text-center flex flex-col justify-center"><i
                    class="fa-brands fa-twitter text-5xl" style="color: #ffffff;"></i></div>
            <div class="body flex justify-between ps-4">
                <img class="w-32 h-32 rounded-full absolute transform -translate-y-1/2 p-1 bg-white"
                    src="<?= $user->photo_url ?>" alt="" onerror="this.src='<?= DEFAULT_PROFILE_PHOTO_URL ?>'">
                <div class="actions p-2 w-full text-end"><button
                        class="bg-default text-white py-2 px-5 rounded-full font-bold hover:shadow-xl hover:bg-blue-600"
                        title="Friendship Request">
                        <i class="fa-solid fa-user-plus"></i>
                </div>
            </div>
            <div class="footer mt-2 p-3 border-b-2">
                <div class="name flex flex-col">
                    <p class="text-3xl font-bold p-1">
                        <?= $user->name ?>
                    </p>
                    <p class="text-gray-600">
                        <?= '@' . $user->username ?>
                    </p>
                </div>
                <div class="about px-1 py-2">
                    <?= $user->about ?>
                </div>
                <div class="date">
                    <i class="fa-solid fa-calendar-days text-gray-700"></i>
                    <?= 'Joined ' . $user->created_date ?>
                </div>
                <div class="friendships flex gap-5 mt-2">
                    <div class="following font-bold">0 <span class="text-gray-600 font-normal">Friends</span></div>
                </div>

            </div>
        </div>

        <!-- Tweets -->
        <div class="tweets mt-8 space-y-4">

            <!-- Template -->
            <?php
            foreach ($tweets as $tweet) { ?>
                <div class="border rounded-lg p-4 flex space-x-4">
                    <img class="w-11 h-11 bg-gray-300 rounded-full" src="<?= $user->photo_url ?>" alt="profile photo"
                        onerror="this.src='<?= DEFAULT_PROFILE_PHOTO_URL ?>'">
                    <div class="flex flex-col">
                        <div class="flex space-x-2">
                            <a href="<?= route("user/$user->username") ?>" class="font-bold"><?= $user->name ?></a>
                            <p class="text-gray-500 text-md">
                                <?= '@' . $user->username ?> •
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

    includeStaticFile('footer');
    ?>
</body>

</html>