<aside>
    <div class="font-bold border-b border-gray pb-4 <?php if (is_front_page()) : ?>hidden<?php endif; ?> md:block">
        <p class="text-gray text-xs">Ranking</p>
        <h2 class="mt-2 text-2xl leading-none"><span class="mr-3 inline-block align-middle"><img src="<?= esc_url(get_template_directory_uri()); ?>/img/ranking.svg" alt="" class="pb-1"></span>記事ランキング</h2>
    </div>
    <div class="mt-7 md:mt-10 space-y-5" <?php if (is_front_page()) : ?>x-show="window.innerWidth >= 768 || open == 'ranking'" <?php endif; ?>>
        <?php
        $rank_post = get_field('ranking', 'option');
        $rank_post_id = array_column($rank_post, 'rank');
        ?>
        <?php
        $args = [
            'orderby' => 'id',
            'post-status' => 'publish',
            'post-type' => ['post'],
            'posts_per_page' => 5,
            'post__in' => $rank_post_id,
        ];
        $array = new WP_Query($args);
        usort($array->posts, function ($a, $b) {
            return get_field("rank-order", $a->ID) - get_field("rank-order", $b->ID);
        });
        $count = 0;
        if ($array->have_posts()) :
            while ($array->have_posts()) : $array->the_post();
                $count++;
        ?>
                <div class="">
                    <?php get_template_part("components/article-ranking", false, $count); ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
    <div class="mt-10 <?php if (is_front_page()) : ?>hidden md:block<?php endif; ?>">
        <?php
        get_template_part('components/banner');
        ?>
    </div>
</aside>