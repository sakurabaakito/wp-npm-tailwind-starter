<footer class="bg-primary pt-8 md:pt-12 pb-8">
    <div class="px-5 mx-auto md:max-w-6xl">
        <div class="grid md:grid-cols-12 gap-5">
            <div class="md:col-span-12 lg:col-span-4">
                <a href="<?= esc_url(home_url()); ?>" class="block">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/logo-white.png" alt="unison engineer logo" class="w-48 md:w-64 mx-auto">
                </a>
            </div>
            <div class="md:col-span-6 lg:col-span-4 px-5 md:px-0">
                <ul class="grid md:grid-cols-2 gap-4 md:gap-14 text-sm font-bold text-white">
                    <div class="space-y-4 md:space-y-8">
                        <li>
                            <a href="<?= esc_url(home_url()); ?>" class="block hover:underline">トップ</a>
                        </li>
                        <li x-data="{MenuOpen : false}">
                            <div class="flex justify-between cursor-pointer" @click="MenuOpen = !MenuOpen">
                                <p>カテゴリー</p>
                                <div class="md:hidden">
                                    <button x-show="!MenuOpen">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/arrow.svg" alt="" class="">
                                    </button>
                                    <button x-show="MenuOpen">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/arrow.svg" alt="" class="rotate-180">
                                    </button>
                                </div>
                            </div>
                            <ul class="flex flex-col mt-3 ml-3 space-y-2 opacity-50" x-show="window.innerWidth >= 768 || MenuOpen">
                                <?php
                                $args = array(
                                    'orderby' => 'id',
                                    'hide_empty' => 0,
                                    'exclude ' => '1'
                                );
                                $categories = get_categories($args);
                                usort($categories, function ($a, $b) {
                                    return get_field("order", "category_" . $a->term_id) - get_field("order", "category_" . $b->term_id);
                                });
                                // echo '<pre>';
                                // var_dump($categories);
                                // echo '</pre>';

                                ?>
                                <?php foreach ($categories as $cat) : ?>
                                    <?php if (!$cat->parent) : ?>
                                        <li>
                                            <a href="<?= esc_url(get_category_link($cat->term_id)); ?>" class="text-xs hover:underline"><?= esc_html($cat->name); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    </div>
                    <div class="space-y-4 md:space-y-8">
                        <li>
                            <a href="<?= esc_url(home_url('contents')); ?>" class="block hover:underline">記事一覧</a>
                        </li>
                        <li>
                            <a href="https://unison-career.com/company/" target="_blank" rel="noopener" class="block hover:underline">運営会社</a>
                        </li>
                        <li>
                            <a href="https://unison-career.com/governance/" target="_blank" rel="noopener" class="block hover:underline">個人情報保護方針</a>
                        </li>

                    </div>
                </ul>
            </div>
            <div class="md:col-span-6 lg:col-span-4 grid grid-cols-2 gap-3">
                <div class="md:col-span-2 md:mx-auto font-bold text-primary text-sm">
                    <a href="https://unison-career.com/joboffer/"  class="flex flex-col md:flex-row items-center bg-white md:w-[250px] md:px-10 py-7 md:py-5 hover:brightness-90 text-center">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/job.svg">
                        <p class="md:pl-3 mt-1">転職相談する</p>
                    </a>
                </div>
                <div class="md:col-span-2 md:mx-auto font-bold text-primary text-sm">
                    <a href="https://unison-career.com/joboffer/" class="flex flex-col md:flex-row items-center bg-white md:w-[250px] md:px-10 py-7 md:py-5 hover:brightness-90 text-center">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/contact.svg">
                        <p class="md:pl-3 mt-1">お問い合わせ</p>
                    </a>
                </div>
                <div class="col-span-2 md:mx-auto font-bold text-primary text-sm">
                    <a href="https://unison-career.com/service/" class="block md:w-[250px]">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/footer-banner.png" class="w-full hover:opacity-70">
                        <div href="" target="_blank" rel="noopener" class="flex justify-center items-center bg-white py-7 md:py-5 hover:brightness-90 text-center">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/external.svg">
                            <p class="pl-3 mt-1">サービスサイトはこちら</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="">
            <div class="w-full h-px bg-white my-5 md:my-8"></div>
            <p class="text-center text-xs text-white">Copyright © 2023 UNISON Engineer All rights Reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>