<div class="my-5 flex">
    <div class="w-[60px] md:w-[70px]">
        <img src="<?= esc_url(get_template_directory_uri()); ?>/img/person.png" class="w-full">
    </div>
    <div class="flex-1 ml-3 md:ml-5 relative bg-gray-1 w-full p-4 pb-0 md:px-6">
        <span class="absolute w-7 h-6 -left-7 top-[30px] -translate-y-1/2 border-[14px] border-transparent border-r-[14px] border-r-gray-1"></span>
        <p class="mt-1 text-sm md:text-base font-bold text-tertiary"><?php echo esc_html($attributes['text']); ?></p>
    </div>
</div>