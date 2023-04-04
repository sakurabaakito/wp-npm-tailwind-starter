<div class="my-5 relative border-dashed border-2 border-blue px-4 md:px-6 pt-6">
    <?php if ($attributes['title']) : ?>
        <div class="absolute top-0 left-5 -translate-y-1/2 bg-white px-2 py-1.5 flex">
            <span class="inline-block"><img src="<?= esc_url(get_template_directory_uri()); ?>/img/box02.svg"></span>
            <p class="ml-2 text-blue font-bold mt-0.5" style="margin-bottom: 0 !important;"><?php echo esc_html($attributes['title']); ?></p>
        </div>
    <?php endif; ?>
    <div>
        <?php echo $attributes['content']; ?>
    </div>
</div>