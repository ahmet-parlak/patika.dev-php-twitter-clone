<?php
$title = '404 - Page Not Found';

includeStaticFile('header', compact('title'));
?>

<body class="flex items-center justify-center h-screen">
    <div class="flex flex-col gap-4 text-center">
        <div class="text-7xl text-default">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <h1 class="text-4xl font-semibold mb-2">Oops! Page Not Found</h1>
        <p class="text-xl text-gray-600 mb-4">Unfortunately, the page you are looking for is not available.</p>
        <div class="">
            <i class="fa-brands fa-twitter text-default text-4xl"></i>
        </div>
        <a href="<?= route() ?>" class="text-dark text-xl hover:underline">Back to home</a>
    </div>
</body>

</html>