<?php includeStaticFile('header'); ?>

<body class="flex">

    <?php includeStaticFile('sidebar'); ?>

    <!-- Content -->
    <div class="container w-598 border-r">
        <div class="alerts relative"></div>
        <div class="user">
            <div class="cover h-48 bg-default text-center flex flex-col justify-center"><i
                    class="fa-brands fa-twitter text-5xl" style="color: #ffffff;"></i></div>
            <div class="body flex justify-between ps-4">
                <img class="w-32 h-32 rounded-full absolute transform -translate-y-1/2 p-1 bg-white"
                    src="<?= $user->photo_url ?>" alt="" onerror="this.src='<?= DEFAULT_PROFILE_PHOTO_URL ?>'">
                <div class="actions p-2 w-full text-end"><button
                        class="bg-default text-white py-2 px-5 rounded-full font-bold hover:shadow-xl hover:bg-blue-600"
                        title="Friendship Request">
                        Send Request<i class="fa-solid fa-user-plus ml-2"></i>
                </div>
            </div>
            <div class="footer p-3">
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
        <div class="tweets mt-4 space-y-4">
            <?php
            foreach ($tweets as $tweet) {
                includeStaticFile('widgets/tweet', compact('tweet', 'user'));
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <?php

    includeStaticFile('footer');
    ?>
</body>

</html>