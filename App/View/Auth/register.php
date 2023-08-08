<?php

$title = 'Register | Twitter Clone';

includeStaticFile('header', compact('title'));

?>

<body>
    <main class="grid place-items-center h-screen pb-24">
        <!-- Content -->
        <div class="container mx-auto w-598">
            <!-- Login Box -->
            <form action="" method="POST">
                <div class="flex flex-col gap-8 text-center mt-8 p-14 px-24 border rounded-lg shadow-xl text-base">
                    <h1>Create your account</h1>
                    <div class="inputs flex flex-col gap-5 text-center mt-7 mb-4">
                        <input class="p-3 border-2 rounded-sm text-lg" type="text" name="username"
                            placeholder="@username">
                        <input class="p-3 border-2 rounded-sm text-lg" type="text" name="name" placeholder="name">
                        <input class="p-3 border-2 rounded-sm text-lg" type="password" name="password"
                            placeholder="password">
                        <input class="p-3 border-2 rounded-sm text-lg" type="password" name="confirm_password"
                            placeholder="confirm password">
                    </div>
                    <div class="val-errs text-red-700 font-semibold hidden">
                        <ul>
                            <li>username already taken</li>
                        </ul>
                    </div>
                    <input
                        class="bg-slate-950 text-white px-6 py-2 rounded-full font-bold cursor-pointer hover:bg-slate-900 hover:shadow-sm"
                        type="submit" value="Sign Up"></input>
                    <p>Do you already have an account?<a href="<?= route('login') ?>"
                            class="text-default hover:underline mx-2">Sign in</a></p>
                </div>
            </form>
        </div>
    </main>
</body>

</html>