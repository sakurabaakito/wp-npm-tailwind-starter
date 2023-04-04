<?php
get_header();
?>

<main id="primary" class="site-main">
    <section class="relative">
        <img src="<?= esc_url(get_template_directory_uri()); ?>/img/fv-bg.png" alt="" class="absolute w-full h-full object-cover object-top -z-10 hidden md:block">
        <img src="<?= esc_url(get_template_directory_uri()); ?>/img/fv-bg-sp.png" alt="" class="absolute w-full h-full object-cover object-top -z-10 md:hidden">
        <div class="mx-auto md:max-w-7xl md:py-16">
            <div class="md:flex items-center">
                <div class="basis-3/12 md:order-2 py-3 md:py-0 md:ml-5 lg:ml-10">
                    <div class="font-bold text-pink text-center md:text-left">
                        <h2 class="text-3xl md:text-5xl lg:text-6xl xl:text-7xl md:-ml-1">Pick Up</h2>
                        <p class="text-lg md:text-3xl lg:text-4xl lg:-mt-1">Contents</p>
                    </div>
                    <div class="mt-10 hidden md:block">
                        <?php
                        get_template_part('components/banner');
                        ?>
                    </div>
                </div>
                <div class="basis-9/12 flex-1 md:order-1 swiper relative !py-0 md:!py-10">
                    <div class="swiper-wrapper w-full">
                        <?php
                        $args = [
                            'post-status' => 'publish',
                            'post-type' => ['post'],
                            'orderby' => 'post_date',
                            'order' => 'DESC',
                            'posts_per_page' => 5,
                            'meta_query' => [
                                [
                                    'key' => 'pickup',
                                    'value' => 1,
                                ],
                            ],
                        ];
                        $array = new WP_Query($args);
                        if ($array->have_posts()) :
                            while ($array->have_posts()) : $array->the_post();
                        ?>
                                <div class="swiper-slide md:!w-4/5">
                                    <?php
                                    get_template_part("components/fv-contents");
                                    ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                    <button class="swiper-button-prev block absolute z-20 top-1/2 left-0 md:left-[calc(10%-25px)] -translate-y-1/2 hover:brightness-90 active:brightness-75 transition">
                        <img src="<?= esc_url(get_template_directory_uri()); ?>/img/swiper-prev.svg" alt="" width="50" height="50" class="w-1/2 md:w-full">
                        <span class="sr-only">前の記事に</span>
                    </button>
                    <button class="swiper-button-next block absolute z-20 top-1/2 right-0 md:right-[calc(10%-25px)] -translate-y-1/2 hover:brightness-90 active:brightness-75 transition">
                        <img src="<?= esc_url(get_template_directory_uri()); ?>/img/swiper-next.svg" alt="" width="50" height="50" class="w-1/2 md:w-full ml-auto mr-0">
                        <span class="sr-only">次の記事に</span>
                    </button>
                    <div class="swiper-pagination hidden md:block"></div>
                </div>
            </div>
            <div class="md:hidden relative">
                <img src="<?= esc_url(get_template_directory_uri()); ?>/img/banner-fv-sp.png" alt="" width="390" height="215" class="w-full">
                <div class="absolute z-10 bottom-8 w-full">
                    <a href="https://unison-career.com/job/" class="flex justify-center bg-orangeCta py-4 rounded w-80 mx-auto text-white hover:opacity-80 ">
                        <p class="mt-0.5 font-bold">求人を見る</p>
                        <span class="ml-2 inline-block"><img src="<?= esc_url(get_template_directory_uri()); ?>/img/cta-external.svg"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-secondary pt-6 pb-8 md:pt-16 md:pb-24">
        <div class="px-5 mx-auto md:max-w-6xl">
            <div class="grid md:grid-cols-12 gap-8 lg:gap-20">
                <div class="md:col-span-8 space-y-5 md:space-y-10">
                    <div>
                        <span class="inline-block w-8 h-0.5 bg-black"></span>
                        <p class="mt-1 text-xs md:text-base font-bold text-gray">カテゴリー</p>
                        <h2 class="md:mt-2 text-2xl md:text-5xl font-bold">Category</h2>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
                        <?php
                        $cat_list = [
                            'engineer',
                            'development',
                            'infrastructure-engineer',
                            'system-engineer',
                            'it-industry',
                            'infura-shikaku',
                            'programmer-shikaku',
                            'it-certification',
                            'programming',
                        ];
                        $count = 1;
                        foreach ($cat_list as $cat) :
                        ?>
                            <a href="<?= esc_url(home_url('category')); ?>/<?= $cat; ?>" class="hover:opacity-70">
                                <img src="<?= esc_url(get_template_directory_uri()); ?>/img/cat0<?= $count; ?>.png" alt="" class="">
                            </a>
                        <?php
                            $count++;
                        endforeach;
                        ?>
                    </div>
                </div>
                <div class="md:col-span-4 bg-secondary">
                    <div class="font-bold border-b border-gray pb-4">
                        <p class="text-gray text-xs">Tags</p>
                        <h2 class="mt-2 text-2xl leading-none"><span class="mr-3 inline-block align-middle"><img src="<?= esc_url(get_template_directory_uri()); ?>/img/tags.svg" alt="" class="pb-1"></span>人気タグ</h2>
                    </div>
                    <div class="mt-4 flex flex-wrap">
                        <?php
                        $args = [
                            'orderby' => 'count',
                            'order' => 'desc',
                            'number' => 10,

                        ];
                        $tags = get_tags($args);
                        ?>

                        <?php
                        foreach ($tags as $tag) :
                        ?>
                            <a href="<?= get_tag_link($tag->term_id); ?>" class="tag-list-btn"><?= $tag->name; ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="mt-12 md:mt-16">
                <div class="hidden md:block">
                    <?php
                    get_template_part('components/banner-rectangle');
                    ?>
                </div>
                <div class="md:hidden">
                    <?php
                    get_template_part('components/banner');
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="py-8 md:pt-16 md:pb-24">
        <div class="px-5 mx-auto md:max-w-6xl" x-data="{open : 'ranking'}">
            <div class="md:hidden border-b-2 border-primary font-bold grid grid-cols-2">
                <button @click="open = 'ranking'" :class="open =='ranking' ? 'bg-primary text-white' : 'bg-white text-primary'" class="py-5">
                    <p class="text-gray text-xs">Ranking</p>
                    <p class="text-lg">記事ランキング</p>
                </button>
                <button @click="open = 'list'" :class="open =='list' ? 'bg-primary text-white' : 'bg-white text-primary'" class="py-5">
                    <p class="text-gray text-xs">Article List</p>
                    <p class="text-lg">記事一覧</p>
                </button>
            </div>
            <div class="grid md:grid-cols-12 md:gap-10 lg:gap-20">
                <div class="md:col-span-8">
                    <div class="hidden md:block">
                        <span class="inline-block w-8 h-0.5 bg-black"></span>
                        <p class="mt-1 text-xs md:text-base font-bold text-gray">記事一覧</p>
                        <h2 class="md:mt-2 text-2xl md:text-5xl font-bold">Article List</h2>
                    </div>
                    <div class="mt-7 md:mt-10 space-y-5 md:space-y-10" x-show="window.innerWidth >= 768 || open == 'list'">
                        <?php
                        $paged = get_query_var('paged', 1);
                        $args = [
                            'paged' => $paged,
                            'post_status' => 'publish',
                            'orderby' => 'post_date',
                            'order' => 'DESC',
                            'posts_per_page' => 10
                        ];
                        $query = new WP_Query($args);
                        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                        ?>
                                <?php
                                get_template_part('components/article');
                                ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <div class="mt-10 text-center">
                            <a href="<?= esc_url(home_url('contents')); ?>" class="inline-block px-20 py-3 border border-gray hover:bg-blue hover:text-white">記事一覧へ</a>
                        </div>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
                <div class="md:col-span-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
</main><!-- #main -->

<?php
get_footer();
