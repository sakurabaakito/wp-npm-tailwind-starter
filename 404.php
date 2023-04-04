<?php
get_header();
?>

<main id="primary" class="site-main">
    <div class="md:max-w-screen-2xl mx-auto">
        <a href="<?= esc_url($main_link); ?>" class="block hover:opacity-70">
            <img src="<?= esc_url(get_template_directory_uri()); ?>/img/main-banner.png" alt="ユニゾンキャリア　バナー" class="w-full hidden md:block">
            <img src="<?= esc_url(get_template_directory_uri()); ?>/img/main-banner-sp.png" alt="ユニゾンキャリア　バナー" class="w-full md:hidden">
        </a>
    </div>
    <div class="pb-10 md:pb-24 px-5 mx-auto md:max-w-6xl">
        <div class="grid md:grid-cols-12 gap-10 lg:gap-20 pt-8 md:pt-16">
            <div class="md:col-span-8">
                <section>
                    <h1 class="text-2xl md:text-5xl font-bold">404 NOT FOUND</h1>
                    <p class="mt-5 md:mt-8">申し訳ございません。お客様がお探しのページが見つかりませんでした。ご覧になっていたページからのリンクが無効になっているか、あるいはアドレス（URL）のタイプミスかもしれません。トップページからご覧になりたいページをお探しください。</p>
                    <a href="<?= esc_url(home_url()) ?>" class="block mt-5 text-blue hover:underline">トップページに戻る</a>
                </section>
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
            </div>
            <div class="md:col-span-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main><!-- #main -->

<?php
get_footer();
