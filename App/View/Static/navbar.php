<!-- Navbar -->
<nav class="bg-default p-4 w-full">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="<?= route() ?>" class="text-white font-bold text-xl">Tweet App</a>

        <!-- Menu -->
        <ul class="space-x-4 font-bold">
            <li class="inline-block">
                <a href="#" class="text-white">Flow</a>
            </li>
            <li class="inline-block">
                <a href="#" class="text-white">Discover</a>
            </li>
        </ul>

        <!-- Profile -->
        <div class="flex items-center space-x-2 divide-x font-semibold	">
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
                <button action="<?= route('logout') ?>" onclick="logout(this)" class="text-white pl-2">Log
                    out</button>
                <?php
                $color = 'white';
                includeStaticFile('widgets/loading', compact('color'));
                ?>
            </div>
        </div>


    </div>
</nav>