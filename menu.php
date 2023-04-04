<ul class="relative flex justify-center text-sm font-bold ss" x-data="{
                    open: false,
                    category: '',
                }">
                    <?php
                    $header_menu = wp_get_nav_menu_items('header-menu', array());
                    // echo '<pre>';
                    // var_dump($header_menu);
                    // echo '</pre>';
                    $cnt = count($header_menu);
                    $count = 0;
                    $submenu = false;
                    ?>
                    <?php foreach ($header_menu as $menu) : ?>
                        <?php if (!$menu->menu_item_parent) : ?>
                            <?php
                            $parent_id = $menu->ID;
                            ?>

                            <li class="flex-1 text-center" @mouseenter="category = '<?php echo $parent_id; ?>'" @mouseleave="category = ''"><a href="<?= esc_url($menu->url); ?>" class="p-5 block"><?= esc_html($menu->title); ?></a>

                            <?php endif; ?>
                            <?php if ($parent_id == $menu->menu_item_parent) : ?>
                                <?php if (!$submenu) : ?>
                                    <?php
                                    $submenu = true;
                                    ?>
                                    <ul class="absolute left-0 w-full p-5 flex justify-center space-x-5  bg-pink-300 " x-show="category == '<?php echo $parent_id; ?>'">
                                    <?php endif; ?>

                                    <li><a href="<?= esc_url($menu->url); ?>"><?= esc_html($menu->title); ?></a></li>

                                    <?php if ($count + 1 == $cnt || $header_menu[$count + 1]->menu_item_parent != $parent_id && $submenu) : ?>
                                        <?php
                                        $submenu = false;
                                        ?>
                                    </ul>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if ($count + 1 == $cnt || $header_menu[$count + 1]->menu_item_parent != $parent_id) :
                                $submenu = false;
                            ?>
                            </li>
                        <?php endif; ?>
                        <?php
                        $count++;
                        ?>
                    <?php endforeach; ?>
                </ul>