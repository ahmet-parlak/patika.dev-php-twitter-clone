<?php
$title = 'Login | Twitter Clone';

includeStaticFile('header', compact('title'));
?>

<body>
    <main class="grid place-items-center h-screen pb-24">
        <!-- Content -->
        <div class="container mx-auto w-598">
            <!-- Login Box -->
            <form id="login-form" action="<?= route('login') ?>">
                <div class="flex flex-col gap-8 text-center mt-8 p-14 px-24 border rounded-lg shadow-xl text-base">
                    <h1>Login to Tweet App</h1>
                    <div class="inputs flex flex-col gap-5 text-center mt-7 mb-4">
                        <input id="username" class="p-4 border-2 rounded-sm text-lg" type="text" name="username"
                            placeholder="@username" autocomplete="off" required>
                        <input id="password" class="p-4 border-2 rounded-sm text-lg" type="password" name="password"
                            placeholder="password" required>
                    </div>
                    <div class="toast-message val-errs text-red-700 font-semibold">

                    </div>

                    <input
                        class="bg-slate-950 text-white px-6 py-2 rounded-full font-bold cursor-pointer hover:bg-slate-900 hover:shadow-sm"
                        type="submit" value="Login"></input>

                    <p>Don't have an account yet?<a href="<?= route('register') ?>"
                            class="text-default hover:underline mx-2">Sign up</a></p>

                    <!-- Loading Indicator -->
                    <?php
                    $message = 'Action in progress';
                    includeStaticFile('widgets/loading', compact('message'));
                    ?>

                </div>
            </form>
        </div>
    </main>



    <!-- Footer -->
    <?php
    $scripts = ['js/login.js', 'js/script.js'];
    includeStaticFile('footer', compact('scripts'));
    ?>



</body>

</html>