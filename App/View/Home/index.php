<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter Clone | Patika.dev </title>

    <link href="<?= assets('dist/tailwind.css') ?>" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="bg-default p-4 w-full">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="#" class="text-white font-bold text-xl">Tweet App</a>

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
            <div class="flex items-center space-x-4">
                <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
                <a href="#" class="text-white">User Name</a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mx-auto w-598">
        <!-- Tweet Box -->
        <div class="mt-8 p-4 border rounded-lg shadow-md">
            <textarea class="w-full p-2 text-gray-700 resize-none outline-0	"
                placeholder="What's happening?"></textarea>
            <div class="flex flex-row-reverse justify-between items-center mt-2">
                <button class="bg-default text-white px-6 py-2 rounded-full font-bold hover:bg-hoverblue">Tweet</button>
                <div class="flex items-center space-x-2">
                    <span class="text-gray-500">0 character</span>
                </div>
            </div>
        </div>

        <!-- Tweets -->
        <div class="mt-8 space-y-4">
            <div class="border rounded-lg p-4">
                <div class="flex space-x-4">
                    <div class="w-12 h-12 bg-gray-300 rounded-full"></div>
                    <div>
                        <a href="#" class="font-bold">User Name</a>
                        <p class="text-gray-500">@username • 1h</p>
                    </div>
                </div>
                <p class="mt-2">This is an example tweet.</p>
            </div>

            <!-- Other tweets will be listed here -->
        </div>
    </div>
</body>

</html>