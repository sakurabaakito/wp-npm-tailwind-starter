<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body>
    <header id="header" class="w-full fixed md:relative z-20" x-data="{MenuOpen : false}">
        <div class="py-4 md:py-6 bg-white">
            <div class="px-5 mx-auto md:max-w-7xl">
                <div class="flex items-center justify-between">
                    <a href="<?= esc_url(home_url()); ?>" class="block">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/logo.png" alt="unison engineer logo" class="hidden md:block md:w-64">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/logo-sp.png" alt="unison engineer logo sp" class="w-40 md:hidden">
                    </a>
                    <div class="flex items-center">
                        <form x-data="{search: ''}" method="get" action="<?= esc_url(home_url()); ?>" class="hidden lg:flex flex-col md:flex-row items-center justify-center mr-8">
                            <input x-model="search" type="text" name="s" placeholder="検索" class="border-primary focus:border-blue">
                            <input type="hidden" name="post_type" value="post">
                            <button x-bind:disabled="search.length == 0" class="md:ml-2 disabled:opacity-50">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/search.svg" class="" alt="" width="20" height="20">
                                <span class="sr-only">検索</span>
                            </button>
                        </form>
                        <button @click="MenuOpen = true; $refs.spsearch.focus()" class="lg:hidden mr-4">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/search.svg" class="" alt="" width="20" height="20">
                            <span class="sr-only">検索</span>
                        </button>
                        <div class="hidden lg:block">
                            <a href="https://unison-career.com/joboffer/" class="bg-red text-white rounded-full py-2 px-4 block">
                                無料相談をする
                            </a>
                        </div>
                        <button class="lg:hidden md:ml-10 relative z-40" @click="MenuOpen = !MenuOpen">
                            <div class="flex flex-col space-y-1">
                                <span class="w-6 h-0.5 origin-top-right ease-out duration-300" :class="{ 'bg-white -translate-y-0.5 -rotate-45' : MenuOpen,  'bg-primary' : !MenuOpen}"></span>
                                <span class="w-6 h-0.5" :class="{ 'bg-transparent' : MenuOpen,  'bg-primary' : !MenuOpen}"></span>
                                <span class="w-6 h-0.5 origin-bottom-right ease-out duration-300" :class="{ 'bg-white translate-y-0.5 rotate-45' : MenuOpen,  'bg-primary' : !MenuOpen}"></span>
                            </div>
                        </button>
                        <div x-show="MenuOpen" x-trap.noscroll="MenuOpen" x-cloak class="fixed inset-0 overflow-y-scroll z-30 h-screen w-screen bg-primary">
                            <nav class="mb-10">
                                <a href="" class="h-14 flex items-center justify-end mr-10 pt-4" x-cloak>
                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/twitter.svg" class="mr-6">
                                </a>
                                <ul class="text-sm font-bold text-white" x-data="{open: false, category: ''}">
                                    <li>
                                        <form x-data="{search: ''}" method="get" action="<?= esc_url(home_url()); ?>" class="flex flex-row items-center justify-center mr-8 py-3">
                                            <input x-ref="spsearch" x-model="search" type="text" name="s" placeholder="検索" class="text-black border-primary focus:border-blue">
                                            <input type="hidden" name="post_type" value="post">
                                            <button x-bind:disabled="search.length == 0" class="text-white ml-2 disabled:opacity-50">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M14.7002 12.2074C16.6391 9.13025 16.272 5.00711 13.5945 2.32955C10.4887 -0.776518 5.4354 -0.776518 2.32931 2.32955C-0.776435 5.43566 -0.776435 10.4887 2.32931 13.5944C5.00649 16.2719 9.13067 16.6388 12.2074 14.7001L17.507 20L20 17.5073L14.7002 12.2074ZM11.5837 11.5837C9.5868 13.5813 6.33731 13.5813 4.34001 11.5837C2.34309 9.58678 2.34345 6.33762 4.34036 4.34031C6.33731 2.34338 9.5868 2.34303 11.5837 4.33999C13.5807 6.33762 13.5807 9.58678 11.5837 11.5837Z" class="fill-white" />
                                                </svg>
                                                <span class="sr-only">検索</span>
                                            </button>
                                        </form>
                                    </li>
                                    <li class="bg-blue-3 border-t border-blue-1">
                                        <a href="<?= esc_url(home_url()); ?>" class="sp-menu-padding pl-10 block">トップ</a>
                                    </li>
                                    <li class="bg-blue-3 border-t border-blue-1">
                                        <a href="<?= esc_url(home_url()); ?>" class="sp-menu-padding pl-10 block">ITエンジニアの転職・就活サイト</a>
                                    </li>
                                    <li class="bg-blue-2 border-t border-blue-1">
                                        <p class="sp-menu-padding pl-5 block text-lg">Category<span class="ml-3 opacity-50 text-xs">記事カテゴリー</span></p>
                                    </li>
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

                                    $cnt = count($categories);
                                    $count = 0;
                                    $submenu = false;

                                    ?>
                                    <?php foreach ($categories as $cat) : ?>
                                        <?php
                                        $cat_color = get_field("color", "category_" . $cat->term_id);
                                        ?>
                                        <?php if (!$cat->parent) : ?>
                                            <?php
                                            $parent_id = $cat->term_id;
                                            ?>

                                            <li class="flex-1 bg-blue-3 border-t border-blue-1">
                                                <div class="flex justify-between">
                                                    <a href="<?= esc_url(get_category_link($cat->term_id)); ?>" class="sp-menu-padding px-5 block flex-1"><span style="background-color : <?= $cat_color; ?>" class="inline-block w-3 h-3 rounded-full mr-3"></span><?= esc_html($cat->name); ?></a>
                                                    <button href="" class="sp-menu-padding px-5" @click="category = '<?php echo $parent_id; ?>'" x-show="category != '<?= $parent_id; ?>'">
                                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/arrow.svg" alt="">
                                                    </button>
                                                    <button href="" class="sp-menu-padding px-5" @click="category = ''" x-show="category == '<?= $parent_id; ?>'">
                                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/arrow.svg" alt="" class="rotate-180">
                                                    </button>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($parent_id == $cat->parent) : ?>
                                                <?php if (!$submenu) : ?>
                                                    <?php
                                                    $submenu = true;
                                                    $child_color = get_field("color", "category_" . $parent_id);
                                                    ?>
                                                    <ul class="" x-show="category == '<?= $parent_id; ?>'">
                                                    <?php endif; ?>

                                                    <li class="bg-primary border-t border-blue-1 text-xs"><a href="<?= esc_url(get_category_link($cat->term_id)); ?>" class="sp-menu-padding pl-8 block"><?= esc_html($cat->name); ?></a></li>

                                                    <?php if ($count + 1 == $cnt || $categories[$count + 1]->parent != $parent_id && $submenu) : ?>
                                                        <?php
                                                        $submenu = false;
                                                        ?>
                                                    </ul>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if ($count + 1 == $cnt || $categories[$count + 1]->parent != $parent_id) :
                                                $submenu = false;
                                            ?>
                                            </li>
                                        <?php endif; ?>
                                        <?php
                                        $count++;
                                        ?>
                                    <?php endforeach; ?>
                                    <li class="bg-blue-2 border-t border-blue-1">
                                        <p class="sp-menu-padding pl-5 block text-lg">Company<span class="ml-3 opacity-50 text-xs">運営会社</span></p>
                                    </li>
                                    <li class="bg-blue-3 border-t border-blue-1">
                                        <a href="https://unison-career.com/company/" target="_blank" rel="noopener" class="sp-menu-padding pl-5 block"><span class="inline-block align-middle mr-3"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/company-icon.svg"></span>運営会社</a>
                                    </li>
                                    <li class="bg-blue-3 border-t border-blue-1">
                                        <a href="https://unison-career.com/governance/" target="_blank" rel="noopener" class="sp-menu-padding pl-5 block"><span class="inline-block align-middle mr-3"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/privacy-icon.svg"></span>個人情報保護方針</a>
                                    </li>
                                    <li>
                                        <a href="https://unison-career.com/" class="sp-menu-padding block">
                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/banner-sp-menu.png" width="325" height="150" class="mx-auto">
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block bg-primary text-white">
            <nav class="container px-5 mx-auto md:max-w-7xl">
                <ul class="relative flex flex-wrap space-x-3 justify-center text-sm font-bold whitespace-nowrap" x-data="{open: false, category: ''}">
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

                    $cnt = count($categories);
                    $count = 0;
                    $submenu = false;

                    ?>
                    <?php foreach ($categories as $cat) : ?>
                        <?php
                        $cat_color = get_field("color", "category_" . $cat->term_id);
                        ?>
                        <?php if (!$cat->parent) : ?>
                            <?php
                            $parent_id = $cat->term_id;
                            ?>


                            <li class="text-center flex-1" @mouseenter="category = '<?php echo $parent_id; ?>'" @mouseleave="category = ''"><a href="<?= esc_url(get_category_link($cat->term_id)); ?>" class="px-3 py-5 block" :style="category == '<?= $parent_id; ?>' && 'background-color : <?= $cat_color; ?>'"><?= esc_html($cat->name); ?></a>

                            <?php endif; ?>
                            <?php if ($parent_id == $cat->parent) : ?>
                                <?php if (!$submenu) : ?>
                                    <?php
                                    $submenu = true;
                                    $child_color = get_field("color", "category_" . $parent_id);
                                    ?>
                                    <ul class="absolute left-0 w-full pb-5 px-5 flex flex-wrap justify-center space-x-5" style="background-color : <?= $child_color; ?>" x-show="category == '<?= $parent_id; ?>'" x-cloak>
                                    <?php endif; ?>

                                    <li><a href="<?= esc_url(get_category_link($cat->term_id)); ?>" class="mt-5 block hover:underline"><?= esc_html($cat->name); ?></a></li>

                                    <?php if ($count + 1 == $cnt || $categories[$count + 1]->parent != $parent_id && $submenu) : ?>
                                        <?php
                                        $submenu = false;
                                        ?>
                                    </ul>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if ($count + 1 == $cnt || $categories[$count + 1]->parent != $parent_id) :
                                $submenu = false;
                            ?>
                            </li>
                        <?php endif; ?>
                        <?php
                        $count++;
                        ?>
                    <?php endforeach; ?>
                </ul>

            </nav>
        </div>
        <?php if (is_front_page()) : ?>
            <div id="header-bottom" class="lg:hidden duration-300">
                <a href="https://unison-career.com" class="py-2 flex bg-secondary justify-center items-center text-[13px] font-bold">
                    <p class="mt-1">IT業界の転職・就職に役立つ情報を毎日18時に配信！</p>
                    <img src="<?= esc_url(get_template_directory_uri()); ?>/img/arrow-circle.svg" class="ml-1">
                </a>
            </div>
        <?php endif; ?>
    </header>