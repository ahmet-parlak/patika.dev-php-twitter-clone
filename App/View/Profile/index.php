<?php includeStaticFile('header'); ?>

<?php
$user = auth();
?>

<body class="flex">
    <?php includeStaticFile('sidebar'); ?>

    <!-- Content -->
    <div class="container w-598 border-r">
        <div class="alerts relative h-3"></div>
        <div class="profile-settings px-10 py-2">
            <h1 class="border-b-2 border-dark py-1">Profile Settings</h1>
            <div class="profile-photo my-5">
                <form id="photo-form" action="<?= route('profile/photo') ?>">
                    <label for="photo" class="block text-base font-medium px-1">Profile Photo</label>
                    <div class="flex">
                        <img class="w-20 h-20 rounded-l-md border-gray-300" src="<?= $user->photo_url ?>" alt="pp"
                            onerror="this.src='<?= DEFAULT_PROFILE_PHOTO_URL ?>'">
                        <input type="file" autocomplete="off"
                            class="w-full block px-5 py-5 rounded-none border text-center border-gray-300 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:cursor-pointer hover:file:bg-gray-50" required />
                        <button
                            class="p-2 px-4 font-bold bg-gray-50 text-dark border border-l-0 border-gray-300 rounded-r-md hover:shadow-sm hover:shadow-gray-400 hover:bg-transparent"
                            type="submit">Save</button>
                    </div>
                </form>
            </div>
            <div class="username my-5">
                <form id="username-form" action="<?= route('profile/username') ?>">
                    <label for="username" class="block text-base font-medium px-1">Username</label>
                    <div class="flex">
                        <span
                            class="inline-flex w-12 justify-center bg-gray-50 items-center px-3 text-xl text-gray-900  border border-r-0 border-gray-300 rounded-l-md font-bold">
                            @
                        </span>
                        <input type="text" id="username" autocomplete="off"
                            class="rounded-none bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-lg border-gray-300 p-2.5"
                            value="<?= $user->username ?>" required >
                        <button
                            class="p-2 px-4 font-bold bg-gray-50 text-dark border border-l-0 border-gray-300 rounded-r-md hover:shadow-md hover:shadow-gray-400 hover:bg-transparent"
                            type="submit">Save</button>
                    </div>
                </form>
            </div>
            <div class="name my-5">
                <label for="name" class="block text-base font-medium px-1">Name</label>
                <form id="name-form" action="<?= route('profile/name') ?>">
                    <div class="flex">
                        <span
                            class="inline-flex w-12 justify-center bg-gray-50 items-center px-3 text-xl text-gray-900  border border-r-0 border-gray-300 rounded-l-md">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" id="name" autocomplete="off"
                            class="rounded-none bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-lg border-gray-300 p-2.5"
                            value="<?= $user->name ?>" required>
                        <button
                            class="p-2 px-4 font-bold bg-gray-50 text-dark border border-l-0 border-gray-300 rounded-r-md hover:shadow-md hover:shadow-gray-400 hover:bg-transparent"
                            type="submit">Save</button>
                    </div>
                </form>
            </div>
            <div class="about my-5">
                <label for="about" class="block text-base font-medium px-1">About</label>
                <form id="about-form" action="<?= route('profile/about') ?>">
                    <div class="flex">
                        <span
                            class="inline-flex w-12 justify-center bg-gray-50 items-center px-3 text-xl text-gray-900  border border-r-0 border-gray-300 rounded-l-md">
                            <i class="fa-solid fa-quote-left"></i>
                        </span>
                        <textarea id="about" autocomplete="off"
                            class="rounded-none bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-lg border-gray-300 p-2.5 resize-none"
                            rows="3"><?= $user->about ?></textarea>
                        <button
                            class="p-2 px-4 font-bold bg-gray-50 text-dark border border-l-0 border-gray-300 rounded-r-md hover:shadow-md hover:shadow-gray-400 hover:bg-transparent"
                            type="submit">Save</button>
                    </div>
                </form>
            </div>
            <div class="password my-6">
                <label for="password" class="block text-base font-medium px-1">Change Password</label>
                <form id="password-form" action="<?= route('profile/password') ?>">
                    <div class="flex">
                        <span
                            class="inline-flex w-12 justify-center bg-gray-50 items-center px-3 text-xl text-gray-900  border border-r-0 border-gray-300 rounded-l-md">
                            <i class="fa-solid fa-key"></i>
                        </span>
                        <input type="password" id="current_password"
                            class="rounded-none bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-lg border-gray-300 p-2.5"
                            placeholder="Current Password" required>
                    </div>
                    <div class="flex py-2">
                        <span
                            class="inline-flex w-12 justify-center bg-gray-50 items-center px-3 text-xl text-gray-900  border border-r-0 border-gray-300 rounded-l-md">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" id="new_password"
                            class="rounded-none bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-lg border-gray-300 p-2.5"
                            placeholder="New Password" required>
                    </div>
                    <div class="flex">
                        <span
                            class="inline-flex w-12 justify-center bg-gray-50 items-center px-3 text-xl text-gray-900  border border-r-0 border-gray-300 rounded-l-md">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" id="confirm_new_password"
                            class="rounded-none bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-lg border-gray-300 p-2.5"
                            placeholder="Confirm New Password" required>
                    </div>
                    <button
                        class="w-full my-2 p-2 px-4 font-bold bg-gray-50 text-dark border border-gray-300 rounded-md hover:shadow-md hover:shadow-gray-400 hover:bg-transparent"
                        type="submit">Save</button>
                </form>
            </div>
        </div>


    </div>

    <!-- Footer -->
    <?php
    $scripts = ['js/profile.js'];
    includeStaticFile('footer', compact('scripts'));
    ?>
</body>

</html>