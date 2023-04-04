<article class="grid grid-cols-5 gap-3">
    <a href="<?= get_the_permalink(); ?>" class="relative block w-full col-span-2 hover:opacity-70">
        <div class="">
            <img src="<?= esc_url(get_template_directory_uri()); ?>/img/rank<?= $args <= 3 ? '' : '02' ?>.svg" alt="" class="absolute inset-0 -translate-x-1/2 -translate-y-1/2">
            <p class="absolute -translate-x-1/2 -translate-y-1/2 font-bold text-white"><?= $args; ?></p>
        </div>
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
    </a>
    <div class="col-span-3">
        <?php
        $category = get_the_category();
        $category = $category[0];
        $parent_id = $category->parent;
        $parent_cat = get_category($parent_id);
        $show_id = $parent_id ? $parent_id : $category->term_id;
        $show_cat = get_category($show_id);
        $cat_color = get_field("color", "category_" . $show_id);

        $tags = get_the_tags();
        ?>
        <div class="flex items-center text-xs font-bold">
            <a href="<?= get_category_link($show_id); ?>" class="category-btn" style="background-color: <?= $cat_color; ?>"><?= $show_cat->name; ?></a>
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
        <a href="<?= get_the_permalink(); ?>">
            <h3 class="text-[13px] leading-normal mt-1 font-bold hover:underline"><?php the_title(); ?></h3>
        </a>
    </div>
</article>