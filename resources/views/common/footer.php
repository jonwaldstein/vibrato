<footer class="bg-gray-500 w-full">
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <?php dynamic_sidebar(Vibrato\ValueObjects\Sidebar::footer()->value); ?>
        <p class="text-white">&#169; <?= date('Y '); ?></p>
    </div>
</footer>
