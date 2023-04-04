<?php
get_header();
?>

<main id="primary" class="site-main">
    <div class="pb-10 md:pt-16 md:pb-24">
        <section class="mx-auto md:max-w-6xl">
            <div class="relative h-[120px] md:h-auto">
                <img src="<?= esc_url(get_template_directory_uri()); ?>/img/cat-image.png" alt="" class="w-full h-full object-cover">
                <div class="absolute inset-0 w-full h-full opacity-60 bg-primary"></div>
                <div class="absolute inset-0 w-full h-full flex items-center justify-center">
                    <div class="text-center">
                        <p class="text-xl md:text-4xl font-bold text-white">記事一覧</p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="px-5 mx-auto md:max-w-6xl grid md:grid-cols-12 gap-10 lg:gap-20 pt-8 md:pt-16">
                <div class="md:col-span-8 space-y-10">
                    <?php if (have_posts()) :
                        while (have_posts()) : the_post(); ?>
                            <?php
                            get_template_part('components/article');
                            ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="mt-10 text-center">
                        <?php wp_pagenavi(); ?>
                    </div>
                </div>
                <div class="md:col-span-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </section>
    </div>
</main><!-- #main -->

<?php
get_footer();
