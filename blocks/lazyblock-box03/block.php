<div class="my-5 relative bg-blue-4 border-2 border-blue px-4 md:px-6 pt-12">
    <?php if ($attributes['title']) : ?>
        <div class="absolute top-0 left-0 bg-blue px-2 py-1.5 flex">
            <span class="inline-block"><img src="<?= esc_url(get_template_directory_uri()); ?>/img/box03.svg"></span>
            <p class="ml-2 text-white font-bold mt-0.5" style="margin-bottom: 0 !important;"><?php echo esc_html($attributes['title']); ?></p>
        </div>
    <?php endif; ?>
    <div>
        <?php echo $attributes['content']; ?>
    </div>
</div>