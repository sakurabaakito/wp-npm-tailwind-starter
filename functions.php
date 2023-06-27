<?php
// add_theme_support で追加される機能
require_once locate_template('func/custom_theme_support.php', true);

// CSS・JSの読み込み
require_once locate_template('func/enqueue.php', true);

// Advanced Custom Fields の設定
require_once locate_template('func/custom_acf.php', true);
