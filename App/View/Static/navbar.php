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
            <div class="profile flex items-center gap-2">
                <a href="" class="text-white">User Name</a>
                <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
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