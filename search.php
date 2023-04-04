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
                        <p class="text-xl md:text-4xl font-bold text-white">検索結果</p>
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
                    <?php else : ?>
                        <h2 class="text-2xl md:text-3xl font-bold">記事は見つかりませんでした。</h2>
                        <p class="mt-5 md:mt-8">申し訳ございません。記事は見つかりませんでした。</p>
                        <a href="<?= esc_url(home_url('contents')) ?>" class="block mt-5 text-blue hover:underline">記事一覧へ</a>
                        <section class="mt-12 md:mt-20">
                            <div>
                                <span class="inline-block w-8 h-0.5 bg-black"></span>
                                <p class="mt-1 text-xs md:text-base font-bold text-gray">おすすめ記事</p>
                                <h2 class="md:mt-2 text-2xl md:text-4xl font-bold">Recommended Articles</h2>
                            </div>
                            <div class="mt-8 grid grid-cols-2 lg:grid-cols-3 gap-3 md:gap-8">
                                <?php
                                $args = [
                                    'post_type' => 'post',
                                    'orderby' => 'date',
                                    'posts_per_page' => 6,
                                ];
                                $array = new WP_Query($args);
                                ?>
                                <?php if ($array->have_posts()) :
                                    while ($array->have_posts()) : $array->the_post(); ?>
                                        <?php
                                        get_template_part('components/article-related');
                                        ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </section>
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
