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
                <div class="actions p-2 w-full text-end">
                    <?php
                    if (auth('id') == $user->id) { ?>
                        <button
                            class="bg-default text-white py-2 px-5 rounded-full font-bold hover:shadow-xl hover:bg-blue-600"
                            title="Friendship Request" onclick="location.href='<?= route('profile') ?>'">
                            Profile Settings<i class="fa-solid fa-user-gear ml-2"></i></i>
                        </button>
                    <?php } else { ?>
                        <?php switch ($friendship) {
                            case 'sent':
                                ?>
                                <button action="<?= route('user/') . $user->username . '/friendship-request' ?>"
                                    class="bg-default text-white py-2 px-5 rounded-full font-bold hover:shadow-xl hover:bg-blue-600"
                                    title="Cancel Friendship Request" onclick="cancelFriendshipRequest(this)">
                                    Cancel<i class="fa-solid fa-user-minus ml-2"></i>
                                </button>
                                <?php
                                break;

                            case 'received':
                                ?>
                                <div class="flex justify-end items-center gap-2">
                                    <p>Friendship Request Received</p>
                                    <div class="flex bg-default rounded-full"><button
                                            action="<?= route('user/') . $user->username . '/friendship-request' ?>"
                                            class="bg-default text-white py-2 px-5 rounded-full font-bold hover:shadow-xl hover:bg-green-500"
                                            title="Accept Friendship Request" onclick="acceptFriendshipRequest(this)">
                                            <i class="fa-solid fa-user-check"></i>
                                        </button>
                                        <button action="<?= route('user/') . $user->username . '/friendship-request' ?>"
                                            class="bg-default text-white py-2 px-5 rounded-full font-bold hover:shadow-xl hover:bg-red-500"
                                            title="Reject Friendship Request" onclick="rejectFriendshipRequest(this)">
                                            <i class="fa-solid fa-user-xmark"></i>
                                        </button>
                                    </div>
                                </div>
                                <?php
                                break;

                            case 'friend':
                                ?>
                                <button action="<?= route('user/') . $user->username . '/friendship-request' ?>"
                                    class="bg-default text-white py-2 px-5 rounded-full font-bold hover:shadow-xl hover:bg-red-500"
                                    title="Unfriend" onclick="unfriend(this)">
                                    Friend<i class="fa-solid fa-user-group ml-2"></i>
                                </button>
                                <?php
                                break;

                            case 'rejected':
                                ?>
                                <button action="<?= route('user/') . $user->username . '/friendship-request' ?>"
                                    class="bg-default text-white py-2 px-5 rounded-full font-bold hover:shadow-xl hover:bg-blue-600"
                                    title="Friendship Request" onclick="">
                                    Request Rejected<i class="fa-solid fa-user-xmark ml-2"></i>
                                </button>
                                <?php
                                break;

                            default: ?>
                                <button action="<?= route('user/') . $user->username . '/friendship-request' ?>"
                                    class="bg-default text-white py-2 px-5 rounded-full font-bold hover:shadow-xl hover:bg-blue-600"
                                    title="Friendship Request" onclick="friendshipRequest(this)">
                                    Send Request<i class="fa-solid fa-user-plus ml-2"></i>
                                </button>
                                <?php
                                break;
                        } ?>
                    <?php } ?>
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

            <?php
            if ($friendship != 'friend') { ?>
                <div class="text-center border-t pt-2">
                    Only friends can view the user's tweets.
                </div>
            <?php } elseif(count($tweets) == 0) { ?>
                <div class="text-center border-t pt-2">User has not tweeted yet.</div>
            <?php } ?>
        </div>
    </div>

    <!-- Footer -->
    <?php
    $scripts = ['js/user.js'];
    includeStaticFile('footer', compact('scripts'));
    ?>
</body>

</html>