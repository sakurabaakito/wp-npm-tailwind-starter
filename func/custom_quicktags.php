<?php
/* balloon */
function balloonFunc($atts, $content = null)
{
  if ($content) {
    return '<div class="my-5 flex"><div class="w-[60px] md:w-[70px]"><img src="' . esc_url(get_template_directory_uri()) . '/img/person.png" class="w-full"></div><div class="flex-1 ml-3 md:ml-5 relative bg-gray-1 w-full p-4 pb-0 md:px-6"><span class="absolute w-7 h-6 -left-7 top-[30px] -translate-y-1/2 border-[14px] border-transparent border-r-[14px] border-r-gray-1"></span><p class="mt-1 text-sm md:text-base font-bold text-tertiary">' . do_shortcode($content) . '</p></div></div>';
  }
}
add_shortcode('balloon', 'balloonFunc');

/* btn */
function btnFunc($atts, $content = null)
{
  if ($content) {
    return '<div class="my-5 text-center"><div class="inline-block relative"><a href="https://unison-career.com/" target="_blank" rel="noopener" class="block w-80 mx-auto text-center !no-underline !text-white font-bold md:text-lg bg-orange rounded-full py-5 hover:translate-y-1 duration-500">' . do_shortcode($content) . '</a><div class="absolute w-full h-full bg-red top-1 left-0 -z-10 rounded-full"></div></div></div>';
  }
}
add_shortcode('btn', 'btnFunc');

/* box */
function contentbox00Func($atts, $content = null)
{
  if ($content) {
    return '<div class="my-5 relative border-y-2 border-blue"><div>' . do_shortcode($content) . '</div></div>';
  }
}
add_shortcode('box00', 'contentbox00Func');


function contentbox01Func($atts, $content = null)
{
  if ($atts && $content) {
    $title = (isset($atts['title'])) ? esc_attr($atts['title']) : null;
    if (!$title) {
      return '<div class="my-5 relative bg-blue-4 border-2 border-blue px-4 md:px-6 pt-12"><div>' . do_shortcode($content) . '</div></div>';
    } elseif ($title) {
      return '<div class="my-5 relative bg-blue-4 border-2 border-blue px-4 md:px-6 pt-12"><div class="absolute top-0 left-0 bg-blue px-2 py-1.5 flex"><span class="inline-block"><img src="' . esc_url(get_template_directory_uri()) . '/img/box01.svg"></span><p class="ml-2 text-white font-bold mt-0.5" style="margin-bottom: 0 !important;">' . $title . '</p></div><div>' . do_shortcode($content) . '</div></div>';
    }
  }
}
add_shortcode('box01', 'contentbox01Func');


function contentbox02Func($atts, $content = null)
{
  if ($atts && $content) {
    $title = (isset($atts['title'])) ? esc_attr($atts['title']) : null;
    if (!$title) {
      return '<div class="my-5 relative border-dashed border-2 border-blue px-4 md:px-6 pt-6"><div>' . do_shortcode($content) . '</div></div>';
    } elseif ($title) {
      return '<div class="my-5 relative border-dashed border-2 border-blue px-4 md:px-6 pt-6"><div class="absolute top-0 left-5 -translate-y-1/2 bg-white px-2 py-1.5 flex"><span class="inline-block"><img src="' . esc_url(get_template_directory_uri()) . '/img/box02.svg"></span><p class="ml-2 text-blue font-bold mt-0.5" style="margin-bottom: 0 !important;">' . $title . '</p></div><div>' . do_shortcode($content) . '</div></div>';
    }
  }
}
add_shortcode('box02', 'contentbox02Func');


function contentbox03Func($atts, $content = null)
{
  if ($atts && $content) {
    $title = (isset($atts['title'])) ? esc_attr($atts['title']) : null;
    if (!$title) {
      return '<div class="my-5 relative bg-blue-4 border-2 border-blue px-4 md:px-6 pt-12"><div>' . do_shortcode($content) . '</div></div>';
    } elseif ($title) {
      return '<div class="my-5 relative bg-blue-4 border-2 border-blue px-4 md:px-6 pt-12"><div class="absolute top-0 left-0 bg-blue px-2 py-1.5 flex"><span class="inline-block"><img src="' . esc_url(get_template_directory_uri()) . '/img/box03.svg"></span><p class="ml-2 text-white font-bold mt-0.5" style="margin-bottom: 0 !important;">' . $title . '</p></div><div>' . do_shortcode($content) . '</div></div>';
    }
  }
}
add_shortcode('box03', 'contentbox03Func');

/* 関連記事 */
function kanrenFunc($atts) {
	extract(shortcode_atts(array(
		'mode' => null,'type' => null,'id' => null,
		'y' => null,'m' => null,'d' => null,
		'numberposts' => 5,'offset' => null,'order' => 'DESC','orderby' => 'post_date','meta_key' => null,
		'postid' => null,'exclude' => null,
		'head' => null,'tail' => null,
	),$atts));

	if($mode != null) $mode = '&'.$mode.'='.$id;
	$post = get_posts('post_status=publish&numberposts='.$numberposts.'&offset='.$offset.'&order='.$order.'&orderby='.$orderby.'&include='.$postid.'&year='.$y.'&monthnum='.$m.'&day='.$d.'&exclude='.get_the_ID().','.$exclude.'&meta_key='.$meta_key.$mode);
 	$echo ="";
	foreach ($post as $item){
		$im = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID),'home-thum',false);
		$date = date('Y.m.d',strtotime(get_post($item->ID)->post_date));
		$update = date('Y.m.d',strtotime(get_post($item->ID)->post_modified));
		$echo .= '<div class="related_article cf"><a href="'.get_permalink($item->ID).'" class="cf"><figure class="thum"><img src="'.$im[0].'" /></figure><div class="meta inbox"><p class="ttl">'.$item->post_title.'</p><span class="date gf">'.$date.'</span></div></a></div>';
	}
 
	return $echo;
}
add_shortcode('kanren','kanrenFunc');