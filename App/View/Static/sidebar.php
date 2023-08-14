<div class="sidebar h-screen w-1/3 sticky flex flex-col justify-between pe-6 border-r">
    <div class="banner flex justify-end gap-6 p-4">
        <a href="<?= route() ?>" class="self-center">
            <i class="fa-brands fa-twitter text-default text-4xl "></i>
        </a>
        <a href="<?= route() ?>">
            <p class="text-3xl p-2 font-bold text-dark">Tweet App</p>
        </a>
    </div>

    <div class="user py-4 flex justify-end">
        <div class="flex justify-between rounded-full px-4 py-1 gap-16 text-center align-middle hover:bg-gray-100">
            <a href="" class="text-dark flex gap-2 align-middle items-center">
                <div class="w-11 h-11 bg-gray-300 rounded-full">
                    <img class="rounded-full" src="<?= auth('photo_url') ?>" alt="profile photo"
                        onerror="this.src='<?= assets('images/profile/default.png') ?>'">
                </div>
                <div class="flex flex-col">
                    <p class="text-lg font-bold capitalize">
                        <?= auth('name') ?>
                    </p>
                    <p class="font-normal">
                        <?= '@' . auth('username') ?>
                    </p>
                </div>
            </a>

            <div class="log-out flex">
                <?php
                $color = 'default';
                includeStaticFile('widgets/loading', compact('color'));
                ?>
                <button action="<?= route('logout') ?>" onclick="logout(this)" class="text-dark pl-4">
                    <i class="fa-solid fa-arrow-right-from-bracket text-2xl" title="log out"></i>
                </button>

            </div>
        </div>
    </div>
</div>