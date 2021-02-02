<footer class="relative w-full">
    <div class="max-w-7xl">
        <div class="grid grid-flow-row sm:grid-cols-3 gap-4 justify-items-center border-t-2 p-6 md:p-8">
            <?php dynamic_sidebar(Vibrato\ValueObjects\Sidebar::footer()->value); ?>
        </div>
        <div class="flex justify-center items-center border-t-2 p-6 md:p-8">
            <p class="text-gray-600 text-sm">Copyright &#169; <?= date('Y '); ?> All rights reserved.</p>
        </div>
    </div>
</footer>
