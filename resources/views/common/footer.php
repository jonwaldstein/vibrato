<footer class="relative bg-gray-500 w-full">
    <div class="max-w-7xl p-8 grid grid-flow-row grid-cols-3 gap-4 justify-items-center">
        <?php dynamic_sidebar(Vibrato\ValueObjects\Sidebar::footer()->value); ?>
        <p class="text-white">&#169; <?= date('Y '); ?></p>
    </div>
</footer>
