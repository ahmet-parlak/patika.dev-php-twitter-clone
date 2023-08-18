<?php
$name = $user->name;
$username = $user->username;
$user_photo = $user->photo_url ?? '';
$date = $user->friendship_date ?? '';
$status = $user->relationship_type ?? null;
?>

<div class="border-t p-4 px-6 flex justify-between ">
    <div class="flex space-x-4">
        <img class="w-11 h-11 bg-gray-300 rounded-full" src="<?= $user_photo ?>" alt="profile photo"
            onerror="this.src='<?= DEFAULT_PROFILE_PHOTO_URL ?>'">

        <div class="flex flex-col">
            <a href="<?= route("user/$username") ?>" class="font-bold text-lg"><?= $name ?></a>
            <p class="text-gray-500 text-md">
                <?= '@' . $username ?>
            </p>
        </div>

        <div class="date self-center text-end px-2">
            <?= $date ?>
        </div>
    </div>

    <?php
    if ($status) {

        switch ($status) {
            case 'receiver': ?>
                <div class="flex justify-end items-center gap-2">
                    <span class="status-i text-sm">You sent a request</span>
                    <button action="<?= route('user/') . $user->username . '/friendship-request' ?>"
                        class="self-center bg-default h-min hover:bg-red-500 text-white py-2 px-5 rounded-full font-bold hover:shadow-xl"
                        title="Cancel" onclick="cancelFriendshipRequest(this)">
                        Cancel<i class="fa-solid fa-user-minus ml-2"></i>
                    </button>
                </div>
                <?php break;

            case 'sender':
                switch ($user->status) {
                    case 'pending': ?>
                        <div class="flex justify-end items-center gap-2">
                            <span class="text-sm">You received a request</span>
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
                        <?php break;

                    case 'rejected': ?>
                        <div class="flex text-center items-center gap-2">
                            <span class="text-sm">You rejected the request</span>
                            <div class="flex bg-default rounded-full"><button
                                    action="<?= route('user/') . $user->username . '/friendship-request' ?>"
                                    class="bg-default text-white py-2 px-5 rounded-full font-bold hover:shadow-xl hover:bg-green-500"
                                    title="Accept Friendship Request" onclick="acceptFriendshipRequest(this)">
                                    <i class="fa-solid fa-user-check"></i>
                                </button>
                                <button action="<?= route('user/') . $user->username . '/friendship-request' ?>"
                                    class="bg-default text-white py-2 px-5 rounded-full font-bold hover:shadow-xl hover:bg-red-500"
                                    title="Remove" onclick="removeFriendshipRequest(this)">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <?php break;
                }

                break;
        }

    } else { ?>

        <button action="<?= route('user/') . $user->username . '/friendship-request' ?>"
            class="self-center bg-default h-min hover:bg-red-500 text-white py-2 px-5 rounded-full font-bold hover:shadow-xl"
            title="Unfriend" onclick="unfriend(this)">
            Unfriend<i class="fa-solid fa-user-minus ml-2"></i>
        </button>
    <?php } ?>
</div>