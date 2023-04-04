<?php
get_header();
?>

<main id="primary" class="site-main">
    <div class="pb-10 md:pt-16 md:pb-24">
        <?php
        $category = get_queried_object();
        $cat_id = $category->term_id;
        $parent_id = $category->parent;
        $show_id = $parent_id ? $parent_id : $cat_id;

        $cat_image = get_field("image", "category_" . $show_id);
        $cat_banner = get_field("banner", "category_" . $show_id);
        $cat_banner_text = get_field("banner-text", "category_" . $show_id);
        $cat_color = get_field("color", "category_" . $show_id);

        $array = [
            'parent' => $parent_id ? $parent_id : $cat_id,
            'hide_empty' => 0,
        ];
        $sub_categories = get_categories($array);
        ?>
        <section class="mx-auto md:max-w-6xl">
            <div class="relative h-[120px] md:h-auto">
                <?php if ($cat_image) : ?>
                    <img src="<?= esc_attr($cat_image); ?>" alt="" class="w-full h-full object-cover">
                <?php else : ?>
                    <img src="<?= esc_url(get_template_directory_uri()); ?>/img/cat-image.png" alt="" class="w-full h-full object-cover">
                <?php endif; ?>
                <div class="absolute inset-0 w-full h-full opacity-60" style="background-color: <?= $cat_color; ?>"></div>
                <div class="absolute inset-0 w-full h-full flex items-center justify-center">
                    <div class="text-center">
                        <?php if ($parent_id) : ?>
                            <p class="text-xs md:text-2xl font-bold text-white mb-1">【<?= get_category($parent_id)->name; ?>】</p>
                        <?php endif; ?>
                        <p class="text-xl md:text-4xl font-bold text-white"><?= $category->name; ?> の記事一覧</p>
                    </div>
                </div>
            </div>
            <div class="my-5 px-5 md:px-0">
                <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                    <?php if (function_exists('bcn_display')) {
                        bcn_display();
                    } ?>
                </div>
            </div>
            <a href="<?= esc_url($main_link); ?>" class="block hover:opacity-70 mb-10">
                <div class="relative">
                    <img src="<?= esc_url(get_template_directory_uri()); ?>/img/cat-banner.png" alt="" class="hidden md:block w-full h-full object-cover">
                    <img src="<?= esc_url(get_template_directory_uri()); ?>/img/cat-banner-sp.png" alt="" class="md:hidden w-full h-full object-cover">
                    <div class="absolute inset-0 w-full h-full flex md:items-center justify-center md:justify-start">
                        <div class="md:w-1/2 md:ml-14 lg:ml-24 text-center">
                            <?php if ($cat_banner_text) : ?>
                                <p class="sm:text-xl md:text-sm lg:text-lg font-bold px-10 md:px-0 pt-10 sm:pt-20 md:pt-0"><?= $cat_banner_text; ?></p>
                            <?php else : ?>
                                <p class="md:text-base lg:text-2xl font-bold px-10 md:px-0 pt-7 md:pt-0">
                                    プログラマーの転職・就職を完全無料でサポート！<br class="hidden md:block">IT業界の求人12,000件以上！即日相談可能です。
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </a>
        </section>
        <section class="bg-gray-1 py-8 md:py-12">
            <div class="mx-auto md:max-w-6xl">
                <div class="px-5">
                <?php if ($sub_categories) : ?>
                    <div>
                        <span class="inline-block w-8 h-0.5 bg-black"></span>
                        <p class="mt-1 text-xs md:text-base font-bold text-gray">サブカテゴリー</p>
                        <h2 class="md:mt-2 text-2xl md:text-5xl font-bold">Subcategory</h2>
                    </div>
                    <div class="mt-5 mb-8 md:my-8 grid md:grid-cols-4 gap-2 md:gap-4">
                        <?php
                        foreach ($sub_categories as $cat) :
                            $is_current = $cat_id == $cat->term_id;
                            $class_name = $is_current ? 'btn-active' : 'btn-inactive';
                        ?>

                            <a href="<?= get_category_link($cat->term_id); ?>" class="block text-sm md:text-base font-bold py-3 md:py-5 text-center rounded <?= $class_name; ?>"><?= $cat->name; ?></a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <!-- <div class="text-center md:max-w-3xl mx-auto">
                    <p class="text-2xl font-bold" id="tag-list">タグで絞り込む</p>
                    <div class="mt-2 md:mt-5 rounded-2xl flex flex-wrap justify-center">
                        <?php
                        $args = [
                            'orderby' => 'count',
                            'order' => 'DESC',
                            'hide_empty' => 0,

                        ];
                        $tags = get_tags($args);

                        $current_tag = isset($_GET['tag']) ? $_GET['tag'] : null;
                        $class_name = !$current_tag ? 'btn-active' : '';
                        ?>

                        <a href="<?= get_category_link(get_queried_object_id()); ?>" class="tag-list-btn <?= $class_name; ?>">全ての記事</a>

                        <?php
                        foreach ($tags as $tag) :
                            $class_name = $tag->slug == $current_tag ? 'btn-active' : '';
                        ?>
                            <a href="<?= get_category_link(get_queried_object_id()) . '?tag=' . $tag->slug ?>" class="tag-list-btn <?= $class_name; ?>"><?= $tag->name; ?></a>
                        <?php endforeach; ?>
                    </div>
                </div> -->
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
                        <p class="mt-5 md:mt-8">申し訳ございません。該当のカテゴリ―またはタグの記事は見つかりませんでした。</p>
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
