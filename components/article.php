<article class="grid grid-cols-5 md:grid-cols-3 gap-3 md:gap-5">
    <a href="<?= get_the_permalink(); ?>" class="block w-full col-span-2 md:col-span-1 hover:opacity-70">
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
    <div class="col-span-3 md:col-span-2">
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
        <div class="md:flex items-center font-bold">
            <time datetime="<?php the_time('Y-m-d'); ?>" class="text-gray text-[10px] md:text-xs"><?php the_time('Y/m/d'); ?></time>
            <a href="<?= get_category_link($show_id); ?>" class="inline-block md:ml-3 category-btn" style="background-color: <?= $cat_color; ?>"><?= $show_cat->name; ?></a>
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
            <h3 class="mt-2 text-[13px] md:text-base font-bold hover:underline"><?php the_title(); ?></h3>
            <p class="hidden md:block mt-1 text-sm text-gray-2 leading-relaxed"><?= mb_substr(get_the_excerpt(), 0, 65); ?></p>
        </a>
    </div>
</article>