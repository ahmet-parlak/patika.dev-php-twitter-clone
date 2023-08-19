<div class="sidebar h-screen w-1/3 sticky top-0 flex justify-end border-r">
    <div class="h-full flex flex-col justify-between">
        <div class="header">
            <div class="banner flex justify-between  p-4">
                <a href="<?= route() ?>">
                    <p class="text-3xl p-2 font-bold text-dark">Tweet App</p>
                </a>
                <a href="<?= route() ?>" class="self-center pe-4">
                    <i class="fa-brands fa-twitter text-default text-4xl "></i>
                </a>
            </div>
            <div class="flex justify-end pr-2 mt-0">
                <div class="top  w-full">
                    <div class="home my-6 flex justify-end text-dark align-middle items-center">
                        <a href="<?= route() ?>"
                            class="flex w-full rounded-full px-4 py-2 gap-6 text-center align-middle hover:bg-gray-100 cursor-pointer">
                            <div class="w-11 h-11 text-2xl">
                                <i class="fa-solid fa-house align-middle"></i>
                            </div>
                            <div class="text-xl font-bold self-center">
                                Home
                            </div>
                        </a>
                    </div>
                    <div class="friendships my-6 flex justify-end text-dark align-middle items-center">
                        <a href="<?= route('friends') ?>"
                            class="flex w-full rounded-full px-4 py-2 gap-6 text-center align-middle hover:bg-gray-100 cursor-pointer">
                            <div class="w-11 h-11 text-2xl">
                                <i class="fa-solid fa-users align-middle"></i>
                            </div>
                            <div class="text-xl font-bold self-center">
                                Friends
                            </div>
                        </a>
                    </div>


                </div>
            </div>
        </div>

        <div class="flex justify-end pr-2">
            <div class="footer">
                <div class="user my-8 flex justify-end">
                    <div
                        class="flex justify-between w-full rounded-full px-4 py-2 text-center align-middle hover:bg-gray-100">
                        <a href="<?= route("profile") ?>" class="text-dark flex gap-4 align-middle items-center">
                            <div class="w-11 h-11 text-2xl">
                                <i class="fa-solid fa-user-gear align-middle"></i>
                            </div>
                            <div class="text-xl font-bold">
                                Profile Settings
                            </div>
                        </a>
                    </div>
                </div>
                <div class="user py-4 flex justify-end">
                    <div class="flex justify-between rounded-full px-4 py-1 gap-16 align-middle hover:bg-gray-100">
                        <a href="<?= route("user/") . auth('username') ?>"
                            class="text-dark flex gap-2 align-middle items-center">
                            <div class="w-11 h-11 bg-gray-300 rounded-full">
                                <img class="rounded-full" src="<?= auth('photo_url') ?>" alt="profile photo"
                                    onerror="this.src='<?= assets('images/profile/default.png') ?>'">
                            </div>
                            <div class="flex flex-col">
                                <p class="text-lg font-bold px-1">
                                    <?= auth('name') ?>
                                </p>
                                <p class="font-normal">
                                    <?= '@' . auth('username') ?>
                                </p>
                            </div>
                        </a>
                        <div class="log-out flex">

                            <button action="<?= route('logout') ?>" onclick="logout(this)"
                                class="flex justify-center self-center text-dark pl-4">
                                <div class="logout-loading self-center">
                                    <?php
                                    $color = 'default';
                                    includeStaticFile('widgets/loading', compact('color'));
                                    ?>
                                </div>
                                <i class="fa-solid fa-arrow-right-from-bracket text-2xl rounded-full p-2  hover:bg-gray-300 hover:text-dark"
                                    title="log out"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>