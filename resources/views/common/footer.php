<footer class="bg-gray-500 w-full">
    <div class="max-w-7xl mx-auto p-8 flex justify-between items-center">
        <?php dynamic_sidebar(Vibrato\ValueObjects\Sidebar::footer()->value); ?>
        <p class="text-white">&#169; <?= date('Y '); ?></p>
    </div>
</footer>
