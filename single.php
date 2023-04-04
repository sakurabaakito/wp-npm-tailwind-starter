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
        <div class="my-3 md:my-5">
            <div class="breadcrumbs overflow-x-auto whitespace-nowrap" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>
        </div>
        <div class="md:grid md:grid-cols-12 space-y-10 lg:space-y-0 gap-10 lg:gap-20 md:pt-8">
            <div class="md:col-span-8">
                <article>
                    <h1 class="text-xl md:text-3xl font-bold"><?php the_title(); ?></h1>
                    <div class="">
                        <?php
                        $category = get_the_category() ? get_the_category() : null;
                        $category = $category[0];
                        $parent_id = $category->parent;
                        $parent_cat = get_category($parent_id);
                        $show_id = $parent_id ? $parent_id : $category->term_id;
                        $show_cat = get_category($show_id);
                        $cat_color = get_field("color", "category_" . $show_id);

                        $tags = get_the_tags();
                        ?>
                        <div class="mt-2 flex items-center font-bold">
                            <time datetime="<?php the_time('Y-m-d'); ?>" class="block text-gray text-[10px] md:text-xs"><?php the_time('Y/m/d'); ?></time>
                            <a href="<?= get_category_link($parent_id); ?>" class="inline-block ml-3 category-btn" style="background-color: <?= $cat_color; ?>"><?= $show_cat->name; ?></a>
                        </div>
                        <div class="flex flex-wrap">
                            <?php
                            if ($tags) :
                                foreach ($tags as $tag) :
                            ?>
                                    <a href="<?= get_tag_link($tag->term_id); ?>" class="tag-btn"><?= $tag->name; ?></a>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="mt-5">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php
                            $attr = [
                                "class" => "w-full aspect-video object-cover"
                            ];
                            the_post_thumbnail('thumnail', $attr);
                            ?>
                        <?php else : ?>
                            <img src="<?= esc_url(get_template_directory_uri()); ?>/img/no-image.png" alt="" class="w-full aspect-video object-cover">
                        <?php endif; ?>
                    </div>
                    <div class="content-wrap w-full mt-5 md:mt-12 tracking-wider">
                        <?php the_content(); ?>
                    </div>
                    <div class="mt-12 py-12 relative -mx-5">
                        <div class="absolute inset-0 -z-10 h-full">
                            <img src="<?= esc_url(get_template_directory_uri()); ?>/img/cta-bg.png" alt="" width="780" height="506" class="w-full h-full object-cover">
                        </div>
                        <div class="text-white md:w-9/12 mx-auto text-center">
                            <img src="<?= esc_url(get_template_directory_uri()); ?>/img/unizon-career-logo.png" alt="ユニゾンキャリア　ロゴ" width="230" height="40" class="mx-auto">
                            <p class="mx-auto mt-5 inline-block px-5 pt-5 pb-4 md:pb-3 text-3xl md:text-4xl font-bold text-blue bg-white">ITエンジニアの<br>転職・就職支援サービス</p>
                            <!-- <p class="text-left mt-5 px-5 text-xs md:text-sm leading-relaxed font-bold tracking-wider">ユニゾンキャリアは、あなたの夢やキャリアをサポートする、ITエンジニア専門の人材紹介サービスです。私たちは、豊富な経験と幅広いネットワークを活かし、あなたに最適な求人情報をご提供します。</p> -->
                            <div class="mt-10 flex flex-wrap justify-center sm:space-x-5 px-5 font-bold">
                                <div class="basis-[150px] md:basis-none">
                                    <p class="text-sm">未経験の就業決定率</p>
                                    <div class="relative text-center mt-1 md:mt-2">
                                        <div class="absolute top-0 left-0">
                                            <img src="<?= esc_url(get_template_directory_uri()); ?>/img/ashirai-left.svg" alt="" width="20" height="48" class="">
                                        </div>
                                        <p class="text-5xl px-1.5">95<span class="text-2xl ml-1">%</span></p>
                                        <div class="absolute top-0 right-0">
                                            <img src="<?= esc_url(get_template_directory_uri()); ?>/img/ashirai-right.svg" alt="" width="20" height="48" class="">
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-5 md:ml-0 basis-[150px] md:basis-none">
                                    <p class="text-sm">ユーザー満足度</p>
                                    <div class="relative text-center mt-1 md:mt-2">
                                        <div class="absolute top-0 left-0">
                                            <img src="<?= esc_url(get_template_directory_uri()); ?>/img/ashirai-left.svg" alt="" width="20" height="48" class="">
                                        </div>
                                        <p class="text-5xl px-1.5">97<span class="text-2xl ml-1">%</span></p>
                                        <div class="absolute top-0 right-0">
                                            <img src="<?= esc_url(get_template_directory_uri()); ?>/img/ashirai-right.svg" alt="" width="20" height="48" class="">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 sm:mt-0 basis-[150px] md:basis-none">
                                    <p class="text-sm">年収</p>
                                    <div class="relative text-center mt-1 md:mt-2">
                                        <div class="absolute top-0 left-0">
                                            <img src="<?= esc_url(get_template_directory_uri()); ?>/img/ashirai-left.svg" alt="" width="20" height="48" class="">
                                        </div>
                                        <p class="flex justify-center text-5xl px-1.5">87<span class="text-2xl ml-1 leading-none">%<br>UP</span></p>
                                        <div class="absolute top-0 right-0">
                                            <img src="<?= esc_url(get_template_directory_uri()); ?>/img/ashirai-right.svg" alt="" width="20" height="48" class="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-8 px-5 md:px-0 md:flex md:space-x-3 justify-center text-center">
                                <a href="https://unison-career.com/job/" class="flex justify-center bg-orangeCta py-4 rounded w-full hover:opacity-80">
                                    <p class="mt-0.5 font-bold">求人を見る</p>
                                    <span class="ml-2 inline-block"><img src="<?= esc_url(get_template_directory_uri()); ?>/img/cta-external.svg"></span>
                                </a>
                                <a href="https://unison-career.com" class="mt-2 md:mt-0 flex justify-center bg-primary py-4 rounded w-full hover:opacity-80">
                                    <p class="mt-0.5 font-bold">サービスを詳しくを見る</p>
                                    <span class="ml-2 inline-block"><img src="<?= esc_url(get_template_directory_uri()); ?>/img/cta-external.svg"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-12">
                        <?php if (have_posts()) :
                            while (have_posts()) : the_post(); ?>
                                <?php
                                $userID = get_the_author_meta('ID');
                                ?>
                                <h2 class="text-lg md:text-xl font-bold text-center md:text-left">この記事の監修者</h2>
                                <div class="mt-3 md:mt-5 flex flex-col md:flex-row px-5 py-8 md:p-10 bg-gray-1 rounded space-y-4 md:space-y-0 md:space-x-10">
                                    <div>
                                        <?php if (get_field('author-image', 'user_' . $userID)) : ?>
                                            <img src="<?= get_field('author-image', 'user_' . $userID); ?>" alt="監修者画像" width="130" height="130" class="mx-auto aspect-square object-cover rounded-full">
                                        <?php else : ?>
                                            <img src="<?= esc_url(get_template_directory_uri()); ?>/img/no-image.png" alt="" width="130" height="130" class="mx-auto aspect-square object-cover rounded-full">
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-center md:text-left flex-1">
                                        <p class="text-xs font-bold"><?= get_field('author-job', 'user_' . $userID); ?></p>
                                        <p class="mt-1 font-bold"><?= get_the_author(); ?></p>
                                        <p class="mt-3 text-sm tracking-wider text-left"><?= get_the_author_meta('user_description'); ?></p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </article>
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
