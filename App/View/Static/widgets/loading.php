<!-- Loading Indicator -->

<div class="loading invisible">
    <div class="flex justify-center items-center p-4">
        <div class="animate-spin inline-block w-4 h-4 border-[3px] border-current border-t-transparent text-default rounded-full"
            role="status" aria-label="loading">
            <span class="sr-only">Loading...</span>
        </div>
        <p class="ml-3 text-sm text-gray-700 dark:text-gray-400">
            <?= $message ?? '' ?>
        </p>
    </div>
</div>