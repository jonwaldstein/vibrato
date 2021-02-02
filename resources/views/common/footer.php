<footer class="relative w-full bg-gray-50">
    <div class="max-w-screen-lg mx-auto divide-y divide-gray-200 px-4 sm:px-6 md:px-8">
        <div class="grid grid-flow-row sm:grid-cols-3 gap-4 justify-items-center px-4 py-12 md:py-24">
            <?php dynamic_sidebar(Vibrato\ValueObjects\Sidebar::footer()->value); ?>
        </div>
        <div class="flex justify-center items-center p-6 md:p-8">
            <p class="text-gray-600 text-sm">
                <?php
                echo esc_html('Copyright &#169;');
                echo sprintf('%s %s', date('Y '), get_bloginfo('name'));
                echo esc_html(' | All rights reserved.');
                ?>
            </p>
        </div>
    </div>
</footer>
