<!-- Navbar -->
<nav class="bg-default p-3 w-full">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="<?= route() ?>" class="w-1/3 text-white font-bold text-2xl">Tweet App</a>

        <!-- Menu -->
        <ul class="w-1/3 text-center space-x-4 font-bold">
            <li class="inline-block">
                <a href="#" class="text-white">Discover</a>
            </li>
            <li class="inline-block">
                <a href="#" class="text-white">Following</a>
            </li>
        </ul>

        <!-- Profile -->
        <div class="w-1/3 flex justify-end items-center space-x-2 divide-x font-semibold	">
            <div class="profile flex items-center gap-3">
                <a href="" class="text-white text-end">
                    <p class="text-lg font-bold capitalize">
                        <?= auth('name') ?>
                    </p>
                    <p class="font-normal">
                        <?= '@' . auth('username') ?>
                    </p>
                </a>
                <div class="w-11 h-11 bg-gray-300 rounded-full">
                    <img class="rounded-full" src="<?= auth('photo_url') ?>" alt="profile photo"
                        onerror="this.src='<?= assets('images/profile/default.png') ?>'">
                </div>
            </div>
            <div class="log-out flex">
                <button action="<?= route('logout') ?>" onclick="logout(this)" class="text-white pl-4">
                    <i class="fa-solid fa-arrow-right-from-bracket text-2xl" title="log out"></i>
                </button>
                <?php
                $color = 'white';
                includeStaticFile('widgets/loading', compact('color'));
                ?>
            </div>
        </div>


    </div>
</nav>