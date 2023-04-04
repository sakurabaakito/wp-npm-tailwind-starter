<article>
    <a href="<?= get_the_permalink(); ?>" class="block w-full hover:opacity-70">
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
        <a href="<?= get_the_permalink(); ?>">
            <h3 class="mt-2 text-sm md:text-base font-bold hover:underline"><?php the_title(); ?></h3>
        </a>
        <div class="md:flex items-center font-bold">
            <time datetime="<?php the_time('Y-m-d'); ?>" class="block text-gray text-[10px]"><?php the_time('Y/m/d'); ?></time>
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
    </div>
</article>