<article class="relative" x-data x-cloak>
    <a href="<?php the_permalink(); ?>">
        <div class="aspect-video">
            <?php if (has_post_thumbnail()) : ?>
                <?php
                $attr = [
                    "class" => "w-full aspect-video"
                ];
                the_post_thumbnail('thumnail', $attr);
                ?>
            <?php else : ?>
                <img class="w-full aspect-video" src="<?php echo get_template_directory_uri(); ?>/img/no-image.png" alt="">
            <?php endif; ?>
        </div>
    </a>
</article>