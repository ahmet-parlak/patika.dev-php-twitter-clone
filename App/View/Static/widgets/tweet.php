<?php
$name = $tweet->name ?? $user->name;
$username = $tweet->username ?? $user->username;
$user_photo = isset($tweet->photo_url) ? $tweet->photo_url : (isset($user->photo_url) ? $user->photo_url : '');

date_default_timezone_set('Europe/Istanbul');
$date = strtotime($tweet->date);
$shortDate = date("d F · H.i", $date);
$longDate = date("d.m.Y · H.i", $date);
?>

<div class="border-t p-4 flex space-x-4">
    <img class="w-11 h-11 bg-gray-300 rounded-full" src="<?= $user_photo ?>" alt="profile photo"
        onerror="this.src='<?= DEFAULT_PROFILE_PHOTO_URL ?>'">
    <div class="flex flex-col">
        <div class="flex space-x-2">
            <a href="<?= route("user/$username") ?>" class="font-bold"><?= $name ?></a>
            <p class="text-gray-500 text-md">
                <?= '@' . $username ?> •
                <span title="<?= $longDate ?>"><?= $shortDate ?></span>
                
            </p>
        </div>
        <p class="content">
            <?= $tweet->content ?>
        </p>
    </div>
</div>