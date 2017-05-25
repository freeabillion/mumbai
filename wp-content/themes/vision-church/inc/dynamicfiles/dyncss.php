<?php
ob_start();
$thm_options = get_option('vision_church_options');


/*
 * Body style
*/
$thm_options['vision_church_background_pattern'] = isset( $thm_options['vision_church_background_pattern'] ) ? $thm_options['vision_church_background_pattern'] : '';
if (!empty($thm_options['vision_church_background_pattern']) && ($thm_options['vision_church_background_pattern'] != 'none')) {
  echo "body{background-image:url('{$thm_options['vision_church_background_pattern']}') !important; background-repeat:repeat;} ";
}

$thm_options['vision_church_wide_screen'] = isset( $thm_options['vision_church_wide_screen'] ) ? $thm_options['vision_church_wide_screen'] : '1';
if ($thm_options['vision_church_wide_screen'] == '1'){
    echo"
    @media only screen and (min-width: 1361px) {
    .container {width: 96%;}
    }
  ";
}

/*
 * Header Style
*/

$thm_options['vision_church_container_width'] = isset( $thm_options['vision_church_container_width'] ) ? $thm_options['vision_church_container_width'] : '';
if(!empty($thm_options['vision_church_container_width']))
{
  $w_value = trim ($thm_options['vision_church_container_width']);
  if($w_value){
    if(substr($w_value,-2,2)!="px"){$w_value.='px';};
    echo esc_attr( "#wrap .container {max-width:{$w_value};}\n\n" );
  }
}

$thm_options['vision_church_header_padding_top'] = isset( $thm_options['vision_church_header_padding_top'] ) ? $thm_options['vision_church_header_padding_top'] : '';
if(!empty($thm_options['vision_church_header_padding_top']))
{
  $w_value = trim ($thm_options['vision_church_header_padding_top']);
  if($w_value){
    if(substr($w_value,-2,2)!="px"){$w_value.='px';};
    echo esc_attr( "#header {padding-top:{$w_value};}\n\n" );
  }
}

$thm_options['vision_church_header_padding_bottom'] = isset( $thm_options['vision_church_header_padding_bottom'] ) ? $thm_options['vision_church_header_padding_bottom'] : '';
if(!empty($thm_options['vision_church_header_padding_bottom']))
{
  $w_value = trim ($thm_options['vision_church_header_padding_bottom']);
  if($w_value){
    if(substr($w_value,-2,2)!="px"){$w_value.='px';};
    echo esc_attr( "#header {padding-bottom:{$w_value};}\n\n" );
  }
}

/*
 * Custom Fonts For P,H Tags
*/
$w_custom_font1_src = $w_custom_font2_src = $w_custom_font3_src ='';

//custom-font-1 font-face

  if( isset($thm_options['vision_church_custom_font1_eot']) && $thm_options['vision_church_custom_font1_eot']['url'] )
    $w_custom_font1_src[] = "url('{$thm_options['vision_church_custom_font1_eot']['url']}?#iefix') format('embedded-opentype')";
  if( isset($thm_options['vision_church_custom_font1_woff']) && $thm_options['vision_church_custom_font1_woff']['url'] )
    $w_custom_font1_src[] = "url('{$thm_options['vision_church_custom_font1_woff']['url']}') format('woff')";
  if( isset($thm_options['vision_church_custom_font1_ttf']) && $thm_options['vision_church_custom_font1_woff']['url'] )
    $w_custom_font1_src[] = "url('{$thm_options['vision_church_custom_font1_ttf']['url']}') format('truetype')";

if($w_custom_font1_src !='')
{
  $w_custom_font1_src= implode(",\n",$w_custom_font1_src);
  echo "@font-face {
  font-family: 'custom-font-1';
  font-style: normal;
  font-weight: normal;
  src: {$w_custom_font1_src};\n}\n";
}

//custom-font-2 font-face

  if( isset($thm_options['vision_church_custom_font2_eot']) && $thm_options['vision_church_custom_font2_eot']['url'] )
    $w_custom_font2_src[] = "url('{$thm_options['vision_church_custom_font2_eot']['url']}?#iefix') format('embedded-opentype')";
  if( isset($thm_options['vision_church_custom_font2_woff']) && $thm_options['vision_church_custom_font2_woff']['url'] )
    $w_custom_font2_src[] = "url('{$thm_options['vision_church_custom_font2_woff']['url']}') format('woff')";
  if( isset($thm_options['vision_church_custom_font2_ttf']) && $thm_options['vision_church_custom_font2_ttf']['url'] )
    $w_custom_font2_src[] = "url('{$thm_options['vision_church_custom_font2_ttf']['url']}') format('truetype')";

if($w_custom_font2_src !='')
{
  $w_custom_font2_src= implode(",\n",$w_custom_font2_src);
  echo "@font-face {
  font-family: 'custom-font-2';
  font-style: normal;
  font-weight: normal;
  src: {$w_custom_font2_src};\n}\n";
}

//custom-font-3 font-face

  if( isset($thm_options['vision_church_custom_font3_eot']) && $thm_options['vision_church_custom_font2_eot']['url'] )
    $w_custom_font3_src[] = "url('{$thm_options['vision_church_custom_font3_eot']['url']}?#iefix') format('embedded-opentype')";
  if( isset($thm_options['vision_church_custom_font3_woff']) && $thm_options['vision_church_custom_font3_woff']['url'] )
    $w_custom_font3_src[] = "url('{$thm_options['vision_church_custom_font3_woff']['url']}') format('woff')";
  if( isset($thm_options['vision_church_custom_font3_ttf']) && $thm_options['vision_church_custom_font3_ttf']['url'] )
    $w_custom_font3_src[] = "url('{$thm_options['vision_church_custom_font3_ttf']['url']}') format('truetype')";

if($w_custom_font3_src !='')
{
  $w_custom_font3_src= implode(",\n",$w_custom_font3_src);
  echo "@font-face {
  font-family: 'custom-font-3';
  font-style: normal;
  font-weight: normal;
  src: {$w_custom_font3_src};\n}\n";
}


/*
 * Color Skin Style Generator
 */

 /* == Menu Colors ------------------ */

if( isset($thm_options['vision_church_menu_link_color']) && $thm_options['vision_church_menu_link_color']['regular'] )
  echo "#wrap #nav a { color:{$thm_options['vision_church_menu_link_color']['regular']};}\n\n";

if( isset($thm_options['vision_church_menu_link_color']) && $thm_options['vision_church_menu_link_color']['hover'] )
  echo "#wrap #nav a:hover,.transparent-header-w.t-dark-w #header.horizontal-w.duplex-hd #nav > li:hover > a,
    .transparent-header-w #header.horizontal-w #nav > li:hover > a {color:{$thm_options['vision_church_menu_link_color']['hover']};}\n\n";

if( isset($thm_options['vision_church_menu_link_color']) && $thm_options['vision_church_menu_link_color']['active'] )
  echo "#wrap #nav li.current > a, #wrap #nav li.current ul li a:hover, #wrap #nav li.active > a {color:{$thm_options['vision_church_menu_link_color']['active']};}\n\n";


/* scroll to top */

if(isset($thm_options['vision_church_scroll_to_top_hover_background_color']) && $thm_options['vision_church_scroll_to_top_hover_background_color']['regular'] )
  echo esc_attr( "#wrap #scroll-top a {background-color:{$thm_options['vision_church_scroll_to_top_hover_background_color']['regular']};}\n" );

if(isset($thm_options['vision_church_scroll_to_top_hover_background_color']) && $thm_options['vision_church_scroll_to_top_hover_background_color']['hover'] )
  echo esc_attr( "#wrap #scroll-top a:hover {background-color:{$thm_options['vision_church_scroll_to_top_hover_background_color']['hover']};}\n" );

$thm_options['vision_church_color_skin'] = isset( $thm_options['vision_church_color_skin'] ) ? $thm_options['vision_church_color_skin'] : 'e3e3e3' ;
$thm_options['vision_church_custom_color_skin'] = isset( $thm_options['vision_church_custom_color_skin'] ) ? $thm_options['vision_church_custom_color_skin'] : '' ;
if ( $thm_options['vision_church_color_skin'] != 'e3e3e3' || $thm_options['vision_church_custom_color_skin'] ) {

  $color_custom    = ( $thm_options['vision_church_custom_color_skin'] ) ? $thm_options['vision_church_custom_color_skin'] : 'e3e3e3' ;
  $color_predefined = ( $thm_options['vision_church_color_skin'] != 'e3e3e3' ) ? $thm_options['vision_church_color_skin'] : 'e3e3e3' ;
  $color = ( $thm_options['vision_church_custom_color_skin'] ) ? $color_custom : '#'.$color_predefined ;

 ?>
   /* == TextColors
  ---------------- */
.colorskin-custom .icon-box26 img,.colorskin-custom .icon-box26 i,.colorskin-custom .button.theme-skin.bordered-bot,.colorskin-custom #footer .side-list ul li:hover a,.colorskin-custom .sermons-clean .sermon-clean-item .sermon-detail a,.colorskin-custom .bbp-body a,.colorskin-custom .bbp-body a:visited , .colorskin-custom .bbp-body a:hover , .colorskin-custom .bbp-body a.bbp-forum-title:hover , .colorskin-custom .bbp-topic-title a.bbp-topic-permalink:hover , .colorskin-custom .pin-box h4 a:hover, .tline-box h4 a:hover , .colorskin-custom .pin-ecxt h6.blog-cat a:hover , .colorskin-custom .pin-ecxt2 p a:hover , .colorskin-custom .postmetadata h6.blog-cat a:hover , .colorskin-custom h6.blog-cat a , .colorskin-custom .blgtyp3.blog-post h6 a,.colorskin-custom .blgtyp2.blog-post h6 a,.colorskin-custom .blog-single-post .postmetadata h6 a,.colorskin-custom .blog-single-post h6.blog-author a , .colorskin-custom .blgtyp3.blog-post h6 a:hover,.colorskin-custom .blgtyp1.blog-post h6 a:hover,.colorskin-custom .blgtyp2.blog-post h6 a:hover,.colorskin-custom .blog-single-post .postmetadata h6 a:hover,.colorskin-custom .blog-single-post h6.blog-author a:hover , .colorskin-custom .blog-post p.blog-cat a,.colorskin-custom .blog-line p.blog-cat a , .colorskin-custom .about-author-sec h5 a:hover , .colorskin-custom .blog-line:hover .img-hover:before , .colorskin-custom .rec-post h5 a:hover , .colorskin-custom .rec-post p a:hover , #wrap.colorskin-custom .colorf , #wrap.colorskin-custom .tg-grid-wrapper.honiara-grid .w-gallery-title p, .colorskin-custom .our-team h5 , .colorskin-custom .our-team6 h5 , #wrap.colorskin-custom .vc_carousel.vc_carousel_horizontal.hero-carousel h2.post-title a:hover , #wrap.colorskin-custom .wpb_gallery_slides .flex-caption h2.post-title a:hover , .colorskin-custom .w-pricing-table.pt-type1 .price-footer a:hover , .colorskin-custom .teaser-box2 a:hover .teaser-title , .colorskin-custom .teaser-box3:hover .teaser-subtitle:after , .colorskin-custom .teaser-box5:hover .teaser-title, #wrap.colorskin-custom .hebe .tp-tab-title , .colorskin-custom .ts-tri.testimonials-slider-w.flexslider .flex-direction-nav a:hover , .colorskin-custom .latestposts-one .latest-author a:hover , .colorskin-custom .latestposts-two .blog-post p.blog-author a:hover , .colorskin-custom .latestposts-two .blog-line:hover .img-hover:before , .colorskin-custom .latestposts-four h3.latest-b2-title a:hover , .colorskin-custom .latestposts-five h6.latest-b2-cat a , .colorskin-custom .latestposts-six .latest-content p.latest-date , .colorskin-custom .a-post-box .latest-title a:hover , .colorskin-custom .w-login #user-login .login-links li a:hover , .colorskin-custom .sermons-minimal .sermon-icon , .colorskin-custom .sermons-minimal a:hover h4,.colorskin-custom .sermons-minimal .sermon-detail a:hover , .colorskin-custom .sermons-clean h4 a:hover , .colorskin-custom .a-sermon-boxed h4 a:hover , .colorskin-custom .icon-box2 i , .colorskin-custom .icon-box3 i , .colorskin-custom .blox.dark .icon-box9 i , .colorskin-custom .icon-box12 i , .colorskin-custom .blox.dark .icon-box12:hover a.magicmore , .colorskin-custom .icon-box17 , .colorskin-custom .icon-box17 i , .colorskin-custom #nav > li.current > a,.colorskin-custom #nav > li > a.active,.colorskin-custom #nav > li:hover > a , .colorskin-custom #header.sticky #nav-wrap #nav #nav > li:hover > a , .colorskin-custom .dark-submenu #nav ul li a:hover , .colorskin-custom #nav ul li a:hover, #nav li.current ul li a:hover,.colorskin-custom .nav-wrap2 #nav ul li a:hover,.colorskin-custom .nav-wrap2.darknavi #nav ul li a:hover,.colorskin-custom #nav ul li.current > a ,.colorskin-custom #nav ul li:hover > a , .colorskin-custom .dark-submenu #nav li.mega ul.sub-posts li a:hover , .colorskin-custom .nav-wrap2.darknavi #nav > li > a:hover,.colorskin-custom .nav-wrap2.darknavi #nav > li:hover > a , .colorskin-custom .nav-wrap2 #nav > li.current > a , .colorskin-custom #header.sticky .nav-wrap2.darknavi #nav > li > a:hover , .colorskin-custom .w-header-type-11 #nav > li:hover > a , .colorskin-custom #nav > li:hover > a, #nav li.current > a,.colorskin-custom #nav li.active > a, .colorskin-custom #header.sm-rgt-mn #menu-icon:hover i,.colorskin-custom #header.sm-rgt-mn #menu-icon.active i , .transparent-header-w.t-dark-w .colorskin-custom #header.horizontal-w.duplex-hd #nav > li:hover > a, .transparent-header-w.t-dark-w .colorskin-custom #header.horizontal-w.duplex-hd #nav > li.current > a , .colorskin-custom #header.box-menu  h6 i , .colorskin-custom #header.box-menu .nav-wrap2 #nav > li.current , .colorskin-custom #responav .mega li.menu-item a:not(.button):hover , .transparent-header-w.t-dark-w #wrap.colorskin-custom .top-bar .top-links a:hover , .transparent-header-w.t-dark-w #wrap.colorskin-custom .top-bar h6 i , .colorskin-custom .transparent-header-w #header.horizontal-w.sticky #nav > li:hover > a, .transparent-header-w.t-dark-w #header.horizontal-w.sticky #nav > li:hover > a , .colorskin-custom .top-bar .socialfollow a:hover i , #wrap.colorskin-custom .vc_tta-color-white.vc_tta-style-modern.vc_tta-o-shape-group .vc_tta-tab.vc_active>a i.vc_tta-icon , .colorskin-custom .pbx-req .wm-prayer-inner .wm-prayer-request-name , .colorskin-custom .woocommerce nav.woocommerce-pagination ul li a , .colorskin-custom .woocommerce table.shop_table td.product-name a:hover , .colorskin-custom blockquote:before , #wrap.colorskin-custom .button.theme-skin.bordered-bot span , #wrap.colorskin-custom .button.gray.rounded.bordered-bot , .colorskin-custom .blog-post a:hover, .blog-author span,.colorskin-custom .blog-line p a:hover , .colorskin-custom h6.blog-date a:hover, h6.blog-cat a:hover,.colorskin-custom h6.blog-author a:hover , .colorskin-custom .blog-line:hover h4 a , #wrap.colorskin-custom .blog-social a:hover , #wrap.colorskin-custom .blog-social a:hover i , .colorskin-custom a.readmore , .colorskin-custom a.readmore:hover , .colorskin-custom a.magicmore, .colorskin-custom a.addtocart:hover, a.select-options:hover , #wrap.colorskin-custom .subtitle-element5 h1:after, #wrap.colorskin-custom .subtitle-element5 h2:after, #wrap.colorskin-custom .subtitle-element5 h3:after, #wrap.colorskin-custom .subtitle-element5 h4:after, #wrap.colorskin-custom .subtitle-element5 h5:after, #wrap.colorskin-custom .subtitle-element5 h6:after , #wrap.colorskin-custom .wpb_accordion .wpb_accordion_wrapper .ui-state-default .ui-icon:hover:before , #wrap.colorskin-custom .vc_tta-accordion.vc_tta-style-classic.vc_tta-shape-square .vc_tta-panel.vc_active .vc_tta-panel-heading , #wrap.colorskin-custom .vc_tta-accordion.vc_tta-style-classic.vc_tta-shape-square .vc_active .vc_tta-panel-heading .vc_tta-controls-icon::before , #wrap.colorskin-custom .vc_tta-accordion.vc_tta-style-classic.vc_tta-shape-square .vc_tta-controls-icon-position-right .vc_active:before , .colorskin-custom .blox.dark .max-counter.s-counter .max-count , .colorskin-custom .our-team4 .social-team a i:before , .colorskin-custom .our-team5 h5 , .colorskin-custom .our-team5 .social-team a i:hover:before , .colorskin-custom .testimonial2 .testimonial-content h5 , .colorskin-custom .testimonials-slider-w.flexslider .flex-direction-nav a i , .colorskin-custom .pricing-plan1 .ppfooter .readmore , .colorskin-custom .pricing-plan2 .ppfooter .readmore , .colorskin-custom .our-process-item:hover i , .colorskin-custom .buy-process-item h4 , .colorskin-custom .buy-process-item.featured i , #wrap.colorskin-custom .buy-process-item span , .colorskin-custom .contact-info i , .colorskin-custom .acc-trigger a:hover,.colorskin-custom .acc-trigger.active a,.colorskin-custom .acc-trigger.active a:hover , .colorskin-custom .w-pricing-table.pt-type1 .pt-footer a,.colorskin-custom .w-pricing-table.pt-type1 .pt-footer a , .colorskin-custom .w-pricing-table.pt-type2 > span , .colorskin-custom .w-pricing-table.pt-type2:hover > span , .colorskin-custom .w-pricing-table.pt-type2 .pt-footer a,.colorskin-custom .w-pricing-table.pt-type2 .pt-footer a , .colorskin-custom .w-pricing-table.pt-type2.featured .pt-footer a , .colorskin-custom .w-pricing-table.pt-type3 .pt-footer a,.colorskin-custom .w-pricing-table.pt-type3.featured .pt-footer a , .colorskin-custom .w-pricing-table.pt-type7 .plan-title , #wrap.colorskin-custom .vc_images_carousel .vc_carousel-control:hover, #wrap.colorskin-custom .vc_images_carousel .vc_carousel-control span:hover , .colorskin-custom .related-works .portfolio-item:hover h5 a , .colorskin-custom .teaser-box2 a:after , .colorskin-custom .teaser-box5:hover:before , .colorskin-custom .teaser-box6:hover:before , .colorskin-custom .teaser-box6 .teaser-subtitle , .colorskin-custom .teaser-box7:hover h4 , .colorskin-custom .teaser-box8:hover .teaser-title , .colorskin-custom .latestnews2 .ln-content .ln-title:hover,.colorskin-custom .dark.blox .latestnews2 .ln-content .ln-title:hover , .colorskin-custom .latestnews2 .ln-item .ln-content .ln-button:hover , .colorskin-custom #w-login h3 , .colorskin-custom #w-login form input , .colorskin-custom #w-login .login-links li a, .colorskin-custom .ts-di .testimonial .testimonial-content h4 q:before , .colorskin-custom .ts-di.testimonials-slider-w.flexslider .flex-direction-nav a i:hover , .colorskin-custom .ts-di.testimonials-slider-w.flexslider .flex-direction-nav a i:hover:before , .colorskin-custom .testimonials-slider-w.ts-mono .testimonial-content:before , .colorskin-custom .ts-tri.testimonials-slider-w .testimonial-content h4 q:before , .colorskin-custom .testimonials-slider-w.flexslider.ts-penta .flex-control-paging li a.flex-active , .colorskin-custom .post-format-icon , .colorskin-custom .latestposts-one .latest-title a:hover , .colorskin-custom .latestposts-two .blog-line p.blog-cat a , .colorskin-custom .latestposts-two .blog-line:hover h4 a , .colorskin-custom .latestposts-three h3.latest-b2-title a:hover , .colorskin-custom .latestposts-three h6.latest-b2-cat a,.colorskin-custom .latestposts-three .latest-b2-metad2 span a:hover, .colorskin-custom .latestposts-six .latest-title a:hover , .colorskin-custom .latestposts-six .latest-author a:hover , .colorskin-custom .latestposts-seven .wrap-date-icons h3.latest-date , .colorskin-custom .latestposts-seven .latest-content .latest-title a:hover , .colorskin-custom .latestposts-seven .latest-content .latest-author a , .colorskin-custom .latestposts-seven .latest-content .latest-author a:hover , .colorskin-custom .latestposts-nine .latest-b9 h3 .link , .colorskin-custom .latestposts-ten .latest-b10 .latest-b10-content a.readmore , .colorskin-custom .latestposts-eleven .latest-b11 .latest-b11-meta .date:after , .colorskin-custom .latestposts-twelve .latest-b12 .latest-b12-cont .latest-b12-cat a , .colorskin-custom .latestposts-twelve .latest-b12 .latest-b12-cont .latest-b12-author:hover a,.colorskin-custom .latestposts-twelve .latest-b12 .latest-b12-cont .latest-b12-title:hover a , .colorskin-custom .latest-b13-title a:hover,.latest-b13-author a:hover,.colorskin-custom .latest-b13-cat:hover a , .colorskin-custom .wn-latest-b15 .latest-b15 .latest-b15-content .latest-b15-meta-data a:hover , .colorskin-custom .wn-latest-b15 .latest-b15 .latest-b15-content h2 a:hover  , .colorskin-custom .wn-latest-b16 .latest-b16 .latest-b16-overlay .latest-b16-meta-data a:hover,.colorskin-custom .wn-latest-b16 .latest-b16 .latest-b16-overlay h3:hover a , .colorskin-custom .wn-latest-b16 .latest-b16 .latest-b16-content .latest-b16-readmore:hover , .colorskin-custom .wn-latest-b16 .latest-b16 .latest-b16-content .latest-b16-footer .latest-author strong  a:hover , .colorskin-custom .wn-latest-b17 .latest-b17 .latest-b17-content h3 a:hover , .colorskin-custom .wn-latest-b17 .latest-b17 .latest-b17-content .latest-b17-readmore:hover , .colorskin-custom .vc_tta-tabs.vc_tta-style-modern.vc_tta-shape-round .vc_tta-tab .vc_tta-icon , .colorskin-custom .w-login #user-login .login-links li a , .colorskin-custom .causes .cause-content .cause-title:hover,.colorskin-custom .blox.dark .causes .cause-content .cause-title:hover , .colorskin-custom .wn-single-grid2 .cause-content a.cause-title:hover , .colorskin-custom .wn-single-grid2 .cause-content .cause-meta a:hover , .colorskin-custom .single-sermon .sermon-meta h6 a , .single-sermon #wrap.colorskin-custom .media-links a.button:hover , .colorskin-custom .sermons-toggle .sermon-wrap-toggle .wn-sertg-content .wn-sertg-category a:hover , .colorskin-custom .sermon-wrap-toggle .wn-sertg-content .wn-sertg-speaker a , .colorskin-custom .sermons-toggle .sermon-wrap-toggle .wn-sertg-content .media-links .button , #wrap.colorskin-custom .sermons-toggle .sermon-wrap-toggle .wn-sertg-content .media-links .button span , #wrap.colorskin-custom .sermons-toggle .sermon-wrap-toggle .wn-sertg-content .media-links .button:hover span , .colorskin-custom .sermons-toggle2 .sermon-wrap-toggle .wn-sertg-meta p a:hover , .colorskin-custom .sermons-toggle2 .sermon-wrap-toggle .wn-sertg-meta i , .colorskin-custom .sermons-toggle2 .sermon-wrap-toggle .media-links a:hover , .colorskin-custom .sermons-toggle2 .sermon-wrap-toggle .media-links a:hover , .colorskin-custom .sermons-grid .sermon-grid-item .sermons-grid-wrap .sermon-grid-header h4:hover a , .colorskin-custom .sermons-grid .sermon-grid-item .sermons-grid-wrap .sermon-grid-content .media-links a i:hover , .colorskin-custom .sermons-grid .sermon-grid-item .sermons-grid-wrap .sermon-grid-content .sermon-readmore:hover , .colorskin-custom .sermon-latest-item .sermons-grid-wrap .sermon-grid-header h4:hover a , .colorskin-custom .sermon-latest-item .sermons-grid-wrap .sermon-grid-content .media-links a i:hover , .colorskin-custom .sermon-latest-item .sermons-grid-wrap .sermon-grid-content .sermon-readmore:hover , .colorskin-custom .sermon-carousel.sermons-grid .sermon-grid-item .sermon-grid-header h4:hover a , .colorskin-custom .sermon-carousel.sermons-grid .sermon-grid-item .sermon-grid-content .media-links a i:hover , .colorskin-custom .sermon-carousel.sermons-grid .sermon-grid-item .sermon-grid-content .sermon-readmore:hover , .colorskin-custom .sermon-custom-item .sermons-grid-wrap .sermon-grid-header h4:hover a , .colorskin-custom .sermon-custom-item .sermons-grid-wrap .sermon-grid-content .media-links a i:hover , .colorskin-custom .sermon-custom-item .sermons-grid-wrap .sermon-grid-content .sermon-readmore:hover , .colorskin-custom .a-sermon-boxed .media-links a , .colorskin-custom .a-sermon-boxed .media-links a span , .colorskin-custom .a-sermon-boxed .sermon-detail a , #wrap.colorskin-custom .vc_tta-color-white.vc_tta-style-flat .vc_tta-tab.vc_active>a , #wrap.colorskin-custom .mec-event-list-minimal .mec-event-article.mec-clear .btn-wrapper .mec-detail-button:hover , .colorskin-custom .icon-box i , .colorskin-custom .icon-box1 h5 , .colorskin-custom .icon-box4 i , .colorskin-custom .icon-box4:hover i , .colorskin-custom .icon-box5 i , .colorskin-custom .icon-box8 i , #wrap.colorskin-custom .icon-box9 a.magicmore , .colorskin-custom .icon-box10 h5 , .colorskin-custom .icon-box11 i , .colorskin-custom .icon-box11:hover i , .colorskin-custom .icon-box13 i , .colorskin-custom .icon-box14 i , .colorskin-custom .icon-box15 img,.colorskin-custom .icon-box15 i , #wrap.colorskin-custom .icon-box15 .magicmore:hover:after , .colorskin-custom .icon-box16 i , .colorskin-custom .icon-box16 h4 , .colorskin-custom .icon-box16 p strong , .colorskin-custom .icon-box16 a.magicmore , .colorskin-custom .icon-box19 i , .colorskin-custom .icon-box19 i , .colorskin-custom .icon-box20 i , .colorskin-custom .icon-box20:hover h4 , .colorskin-custom .icon-box20:hover i , .colorskin-custom .icon-box22:hover h4,.colorskin-custom .icon-box22:hover i, .icon-box22.w-featured i , .colorskin-custom .icon-box22.w-featured h4 , .colorskin-custom .icon-box23 i,.colorskin-custom .icon-box23 img , .colorskin-custom .icon-box24 i , .colorskin-custom .icon-box27  i , .colorskin-custom .icon-colorx i,.colorskin-custom i.icon-colorx , .colorskin-custom #nav a:hover,.colorskin-custom #nav li:hover > a , .colorskin-custom #header #nav .active a , .colorskin-custom .nav-wrap2 #nav > li:hover > a,.colorskin-custom .top-links #nav > li:hover > a , #wrap.colorskin-custom #header .wn-header-toggle:hover i , .colorskin-custom #header.w-header-type-13 .tools-section div.active i , #wrap.colorskin-custom .wn-header-toggle .widget_woocommerce-header-cart:hover .woo-cart-header .header-cart:after , .colorskin-custom .header-type-12.sticky .nav-wrap2 #nav > li.current > a,.colorskin-custom .header-type-12.sticky .nav-wrap2 #nav > li:hover > a , .colorskin-custom .top-header-sec .container div:first-child a:hover,.colorskin-custom .top-header-sec .inlinelb:hover , .colorskin-custom .top-header-sec .wtop-weather , #wrap.colorskin-custom .wn-hamburger-wrap .full-menu .current a , .colorskin-custom #hamburger-menu #hamburger-nav li:hover > a , .colorskin-custom #hamburger-menu #hamburger-nav li.current > a , .colorskin-custom #hamburger-menu.hm-dark #hamburger-nav li:hover > a,.colorskin-custom #hamburger-menu.hm-dark #hamburger-nav li.current > a , #wrap.colorskin-custom #header .hamburger-toggle-link:hover .hamburger-toggle-link-icon,#wrap.colorskin-custom #header .hamburger-toggle-link:hover .hamburger-toggle-link-icon:before,#wrap.colorskin-custom #header .hamburger-toggle-link:hover .hamburger-toggle-link-icon:after , .colorskin-custom .is-open.wn-ht .hamburger-social-icons a:hover , .colorskin-custom .top-links a:hover , #wrap.colorskin-custom .top-bar .top-custom-text a:hover , .colorskin-custom .top-bar .inlinelb:hover , .transparent-header-w.t-dark-w .colorskin-custom #header.horizontal-w #nav > li:hover > a, .transparent-header-w.t-dark-w .colorskin-custom #header.horizontal-w #nav > li.current > a , .colorskin-custom .footer-navi a:hover,.colorskin-custom .custom-footer-menu a:hover , .colorskin-custom .footer-navi a:after , .colorskin-custom .breadcrumbs-w i , #wrap.colorskin-custom .wp-pagenavi a:hover ,.colorskin-custom .wpcf7 .wpcf7-form input[type="reset"],.colorskin-custom .wpcf7 .wpcf7-form input[type="button"], .colorskin-custom .widget ul li .comment-author-link a:hover , .colorskin-custom .sidebar .widget .tabs li:hover a ,.colorskin-custom .sidebar .widget .tabs li.active a , .colorskin-custom #wp-calendar tfoot #prev a , .colorskin-custom .woo-cart-dropdown ul li a:hover , .colorskin-custom a.vc_control:hover , .colorskin-custom .woocommerce div.product .woocommerce-tabs ul.tabs li.active , .colorskin-custom .woocommerce .button , .colorskin-custom .widget_shopping_cart_content p.buttons a.button, .colorskin-custom #header-share-modal .socialfollow a:hover i, .colorskin-custom .widget ul li.cat-item:hover a { color: <?php echo esc_attr($color); ?>}

  /* == Backgrounds
  ----------------- */
.colorskin-custom .subtitle-element.subtitle-element6 .before,.colorskin-custom .subtitle-element .after,.colorskin-custom .container.rec-posts h3.rec-title:before,.colorskin-custom .commentbox h3:before,.colorskin-custom .commentlist li .comment-text .reply a:hover , #wrap.colorskin-custom .colorb , .colorskin-custom .latestnews1 .ln-item:hover .ln-content , .colorskin-custom .latestposts-one .latest-b-cat:hover , .colorskin-custom .latestposts-seven .latest-img:hover img , .colorskin-custom .wpcf7 .vision-contact .w-contact-submit input[type=submit] , .colorskin-custom .icon-box17 .icon-wrap , .colorskin-custom .top-bar .inlinelb.topbar-contact:hover , .colorskin-custom .pbx-req .wm-prayer-inner .wm-pray-request-button:hover , .colorskin-custom #praybox_wrapper .pbx-formfield.pbx-active:after ,.colorskin-custom .pbx-formfield input[type="submit"] , .colorskin-custom .woocommerce-message a.button, .colorskin-custom .button.theme-skin , .colorskin-custom .max-title:after , .colorskin-custom .subtitle-element:after , .colorskin-custom .buy-process-wrap:before , .colorskin-custom .buy-process-item .icon-wrapper:before  , .colorskin-custom .buy-process-item i , .colorskin-custom .teaser-box1 .teaser-title , .colorskin-custom .teaser-box1:hover a:after , .colorskin-custom .teaser-box4 .teaser-title,.colorskin-custom .teaser-box4 .teaser-subtitle , .colorskin-custom .modal-title , .colorskin-custom .flip-clock-wrapper ul li a div div.inn , .colorskin-custom .vc_tta-tabs.vc_tta-style-modern.vc_tta-shape-round .vc_tta-tab.vc_active > a , .colorskin-custom .w-login #user-logged .logged-links , .colorskin-custom .causes.causes-list .donate-button:hover,.colorskin-custom .causes.causes-grid .donate-button:hover , .colorskin-custom .cause-box .donate-button:hover , .colorskin-custom .sermons-minimal .media-links a:hover i , .colorskin-custom .sermons-clean .media-links a:hover i , .colorskin-custom #header.w-header-type-11 .logo-wrap , #wrap.colorskin-custom .woo-cart-header .header-cart span , .colorskin-custom #menu-icon:hover,.colorskin-custom #menu-icon.active , .colorskin-custom #scroll-top a:hover , .colorskin-custom #praybox_wrapper .wn-prayer-request , .colorskin-custom .tagcloud a:hover,.colorskin-custom #footer.litex .tagcloud a:hover , .single .colorskin-custom .woo-template span.onsale,.colorskin-custom .woocommerce ul.products li.product .onsale , .colorskin-custom a.readmore:hover , .colorskin-custom .max-title3 h1:before,.colorskin-custom .max-title4 h2:before,.colorskin-custom .max-title4 h3:before,.colorskin-custom .max-title4 h4:before,.colorskin-custom .max-title4 h5:before,.colorskin-custom .max-title4 h6:before , #wrap.colorskin-custom .vc_tta-accordion.vc_tta-style-classic.vc_tta-shape-square .vc_tta-controls-icon-position-right .vc_tta-controls-icon , .colorskin-custom #social-media.active.other-social , .colorskin-custom #talk-business input[type=submit] , .colorskin-custom #talk-business .host-btn-form , #wrap.colorskin-custom .wpcf7 .w-contact-p input[type=submit] , .colorskin-custom .our-team4:hover , .colorskin-custom .testimonial4 h5:after , .colorskin-custom .testimonial-carousel.testi-carou-3 .tc-name:after , .colorskin-custom .w-pricing-table.pt-type2.featured .pt-footer a , .colorskin-custom .w-pricing-table.pt-type6 .pt-footer , .colorskin-custom .w-pricing-table.pt-type7.featured:before , .colorskin-custom .related-works .portfolio-item > a:hover:before , .colorskin-custom .latest-projects-navigation a:hover , .colorskin-custom .teaser-box3:hover , .colorskin-custom .teaser-box9 .teaser-title.has-image , .colorskin-custom .latestnews2 .ln-date .ln-month , .colorskin-custom #w-login .login-links li a[href$="register"] , .colorskin-custom .ts-di .testimonial .testimonial-brand h5 , .colorskin-custom .ts-tri.testimonials-slider-w.flexslider .testimonial-brand , .colorskin-custom .testimonials-slider-w.flexslider.ts-penta .flex-control-paging li a.flex-active , .colorskin-custom .latestposts-twelve .latest-b12 .latest-b12-cont .latest-b12-title:after , .colorskin-custom .latest-b13-title a:after , .colorskin-custom .wn-latest-b14:hover .latest-b14-cont , .colorskin-custom .wn-latest-b16 .latest-b16 .latest-b16-content .latest-b16-readmore:hover:before , .colorskin-custom .wn-latest-b17 .latest-b17 .latest-b17-content .latest-b17-readmore:hover:before , .colorskin-custom .offer-toggle .toogle-plus i , .colorskin-custom .wn-single-grid2 .cause-content .cause-meta .wn-cause-list-foot a:hover:before , .colorskin-custom .causes .wn-cause-sharing .wn-cause-sharing-icons .wn-wrap-social li:hover,.colorskin-custom .causes .wn-cause-sharing .wn-cause-sharing-icons li:hover , .colorskin-custom .cause-box .wn-donate-button .wn-cause-sharing .wn-cause-sharing-icons .wn-wrap-social li:hover,.colorskin-custom .cause-box .wn-donate-button .wn-cause-sharing .wn-cause-sharing-icons li:hover , .single-sermon #wrap.colorskin-custom .media-links a.button:hover , .colorskin-custom .sermons-grid .sermon-grid-item .sermons-grid-wrap .sermon-grid-content .sermon-readmore:hover:before , .colorskin-custom .sermons-grid.owl-theme .owl-controls .owl-page.active span , .colorskin-custom .sermon-latest-item .sermons-grid-wrap .sermon-grid-content .sermon-readmore:hover:before , .colorskin-custom .sermons-grid.owl-theme .owl-controls .owl-page.active span , .colorskin-custom .sermon-carousel.sermons-grid .sermon-grid-item .sermon-grid-content .sermon-readmore:hover:before , .colorskin-custom .sermon-carousel.sermons-grid.owl-theme .owl-controls .owl-page.active span , .colorskin-custom .sermon-custom-item .sermons-grid-wrap .sermon-grid-content .sermon-readmore:hover:before , .colorskin-custom .sermons-grid.owl-theme .owl-controls .owl-page.active span , #wrap.colorskin-custom .mec-event-list-minimal .mec-event-article.mec-clear .btn-wrapper .mec-detail-button:hover:before , .colorskin-custom .icon-box6 i , .colorskin-custom .icon-box11:hover i , .colorskin-custom .icon-box14 i:after , .colorskin-custom .icon-box19:hover i , .colorskin-custom .icon-box20:hover i , .colorskin-custom .blox .icon-box20:hover i , #wrap.colorskin-custom .icon-box21 .iconbox-rightsection .magicmore , .colorskin-custom .icon-box23 h4:after , .colorskin-custom .icon-box23:hover.icon-box23 h4:before , .colorskin-custom .icon-box24:hover i , .colorskin-custom .icon-box25 i , .colorskin-custom .icon-box26 h4:before , .colorskin-custom .icon-box27:hover , .colorskin-custom .wn-donate-contact-modal .wpcf7 .wpcf7-form input[type="submit"],.colorskin-custom #header-contact-modal .wn-header-contact-modal .wpcf7 .wpcf7-form input[type="submit"] , .colorskin-custom #header.sm-rgt-mn.w-header-type-11 .logo-wrap , .colorskin-custom #pre-footer .footer-subscribe-bar, .colorskin-custom #footer .tagcloud a:hover,.colorskin-custom .toggle-top-area .tagcloud a:hover , .colorskin-custom #wp-calendar tbody td#today , .colorskin-custom .widget .widget-subscribe-form button , .colorskin-custom .widget .widget-subscribe-form.type-two button , .colorskin-custom #footer a.button.black.square.small.thin.footer-link-custom:hover , .colorskin-custom .woocommerce .widget_price_filter .ui-slider .ui-slider-handle , .colorskin-custom .highlight3 , .colorskin-custom .pin-ecxt2 .col1-3 span,.colorskin-custom .comments-number-x span , .colorskin-custom #tline-content:before , .colorskin-custom .tline-row-l:after,.colorskin-custom .tline-row-r:before , .colorskin-custom .tline-topdate , .colorskin-custom .port-tline-dt h3 , .colorskin-custom .postmetadata h6.blog-views span , .colorskin-custom #commentform input[type="submit"] , #wrap.colorskin-custom .vc_carousel.vc_carousel_horizontal.hero-carousel .hero-carousel-wrap .hero-metadata .category a , .colorskin-custom .w-pricing-table.pt-type7 .pt-footer a.magicmore , .colorskin-custom .teaser-box3 .teaser-subtitle:after , .colorskin-custom .teaser-box5 .teaser-featured , #wrap.colorskin-custom .ls-slider1-a , .colorskin-custom .latestposts-four .latest-b2 h6.latest-b2-cat , .colorskin-custom .a-post-box .latest-cat , .colorskin-custom #header.sm-rgt-mn #menu-icon span.mn-ext3 , .colorskin-custom .footer-in .tribe-events-widget-link a:hover,.colorskin-custom .footer-in .contact-inf button:hover , .colorskin-custom #footer.litex .footbot , #wrap.colorskin-custom .wp-pagenavi a:hover , .colorskin-custom .side-list li:hover img,.colorskin-custom .teaser-box1 a:after,.colorskin-custom .teaser-box6 .teaser-subtitle,.colorskin-custom .wn-latest-b15 .latest-b15 .latest-b15-img .latest-b15-overlay,.colorskin-custom .max-title.max-title6:before,.colorskin-custom .wpcf7 .wpcf7-form input[type="submit"],.colorskin-custom .widget .subtitle-wrap:before, .colorskin-custom .max-title.max-title6 .before, .colorskin-custom .blox .custom-404 p:first-child:before,.colorskin-custom .max-title .after,#wrap.colorskin-custom #header .hamburger-toggle-link:hover .hamburger-toggle-link-icon, #wrap.colorskin-custom #header .hamburger-toggle-link:hover .hamburger-toggle-link-icon:before, #wrap.colorskin-custom #header .hamburger-toggle-link:hover .hamburger-toggle-link-icon:after { background-color: <?php echo esc_attr( $color ); ?>}

  /* == BorderColors
  ------------------ */
.colorskin-custom .icon-box25, .colorskin-custom .commentlist li .comment-text .reply a:hover , .colorskin-custom .teaser-box1:hover , .colorskin-custom .sermons-clean .sermon-img:hover , .colorskin-custom #header.box-menu .nav-wrap2 #nav > li:hover , .colorskin-custom #pre-footer .instagram-feed li:hover a:before , .colorskin-custom .toggle-top-area .widget .instagram-feed a img:hover,.colorskin-custom #footer .widget .instagram-feed a img:hover , .colorskin-custom .widget .instagram-feed a:hover:before , .colorskin-custom a.readmore:hover , #wrap.colorskin-custom .vc_tta-accordion.vc_tta-style-classic.vc_tta-shape-square .vc_active .vc_tta-panel-heading .vc_tta-controls-icon::before , .colorskin-custom .w-pricing-table.pt-type2:hover > span , .colorskin-custom .w-pricing-table.pt-type2.featured .pt-footer a , .colorskin-custom .teaser-box5:hover:before , .colorskin-custom .teaser-box6:hover:before , .colorskin-custom #w-login form input , .colorskin-custom .testimonials-slider-w.flexslider.ts-penta .flex-control-paging li a.flex-active , .colorskin-custom .causes.causes-list .donate-button:hover,.colorskin-custom .causes.causes-grid .donate-button:hover , .single-sermon #wrap.colorskin-custom .media-links a.button:hover , #wrap.colorskin-custom .sermons-toggle .sermon-wrap-toggle .wn-sertg-content .media-links .button:hover span , .colorskin-custom .max-title h1:after,.colorskin-custom .max-title h2:after,.colorskin-custom .max-title h3:after,.colorskin-custom .max-title h4:after,.colorskin-custom .max-title h5:after,.colorskin-custom .max-title h6:after , .colorskin-custom .subtitle-element h1:after,.colorskin-custom .subtitle-element h2:after,.colorskin-custom .subtitle-element h3:after,.colorskin-custom .subtitle-element h4:after,.colorskin-custom .subtitle-element h5:after,.colorskin-custom .subtitle-element h6:after , .colorskin-custom .our-team3:hover figure img , .colorskin-custom .our-team4:hover , .colorskin-custom .testimonials-slider-w.flexslider .flex-direction-nav a , .colorskin-custom .pricing-plan1 .ppfooter .readmore , .colorskin-custom .pricing-plan2 .ppfooter .readmore , .colorskin-custom .w-pricing-table.pt-type2.featured > span , .colorskin-custom .w-pricing-table.pt-type3 .pt-footer a,.colorskin-custom .w-pricing-table.pt-type3.featured .pt-footer a , .colorskin-custom .w-login #user-logged .author-avatar img , .colorskin-custom .icon-box16 a.magicmore , #wrap.colorskin-custom .wp-pagenavi span.current,#wrap.colorskin-custom .wp-pagenavi a:hover { border-color: <?php echo esc_attr( $color ); ?>}

  /* == svg icon
  ------------------ */
  .colorskin-custom #wpc-weather .now .time_symbol.climacon svg
  { fill: <?php echo esc_attr( $color ); ?>}

  /* == border topcolor
  -------------------- */
  .colorskin-custom .hpg-title:before,.colorskin-custom .woocommerce-message,.colorskin-custom .latestposts-eleven .latest-b11, #wrap.colorskin-custom .latestposts-eleven .latest-b11, #wrap.colorskin-custom .w-pricing-table.pt-type5 .pt-header h4:after, #wrap.colorskin-custom #bridge .navbar .nav li.dropdown .dropdown-toggle .caret, #wrap.colorskin-custom #bridge .navbar .nav li.dropdown.open .caret, .colorskin-custom .w-pricing-table.pt-type1.featured .plan-price:after, .colorskin-custom #header.header-type-12 #lang_sel:hover ul li > a.lang_sel_sel:after,.colorskin-custom .title-plus-text.type-1 h3:before
  { border-top-color: <?php echo esc_attr( $color ); ?>;}

  /* == border bottom
  -------------------- */

   .colorskin-custom .max-title3 h1:before, .colorskin-custom .max-title3 h2:before, .colorskin-custom .max-title3 h3:before, .colorskin-custom .max-title3 h4:before, .colorskin-custom .max-title3 h5:before, .colorskin-custom .max-title3 h6:before,.colorskin-custom .max-title2 .before,.colorskin-custom .teaser-box7 h4:before, #wrap.colorskin-custom .vc_tta-color-white.vc_tta-style-flat .vc_tta-tab.vc_active,#wrap.colorskin-custom .max-title2 h1:before, #wrap.colorskin-custom .max-title2 h2:before, #wrap.colorskin-custom .max-title2 h3:before, #wrap.colorskin-custom .max-title2 h4:before, #wrap.colorskin-custom .max-title2 h5:before, #wrap.colorskin-custom .max-title2 h6:before, #wrap.colorskin-custom .subtitle-element2 h4:before
  { border-bottom-color: <?php echo esc_attr( $color ); ?>;}

  /* == Important
  ------------------------------- */

  /* == color
  -------------------- */
  #wrap.colorskin-custom .icon-box14 a.magicmore:hover, #wrap.colorskin-custom .internalpadding form input[type="submit"], #wrap.colorskin-custom #bridge .navbar .nav > li > a:hover, #wrap.colorskin-custom #slide-6-layer-35, #wrap.colorskin-custom .transparent-header-w.t-dark-w, #wrap.colorskin-custom .top-bar .top-links a:hover, #wrap.colorskin-custom .transparent-header-w #header.horizontal-w #nav > li:hover > a, #wrap.colorskin-custom #nav li.current > a, #wrap.colorskin-custom #nav ul li:hover > a, #wrap.colorskin-custom .transparent-header-w.t-dark-w, #wrap.colorskin-custom #header.horizontal-w #nav > li:hover > a, #wrap.colorskin-custom .icon-box3:hover a.magicmore, .colorskin-custom .colorf .spl, .colorskin-custom .our-team4 .social-team a i:before, .colorskin-custom article.title-plus-text h2.part-2, .colorskin-custom .tp-caption.colorf, .colorskin-custom .icon-box7 i
  { color: <?php echo esc_attr( $color ); ?> !important;}

  /* == Background color
  -------------------- */
  #wrap.colorskin-custom .tg-slider-bullets li.tg-active-item span, #wrap.colorskin-custom .tg-page-number.tg-page-current, #wrap.colorskin-custom .tg-page-number:not(.dots):hover, #wrap.colorskin-custom .w-pricing-table.pt-type6 .pt-header, #wrap.colorskin-custom [data-alias="Host-slider"] #slide-5-layer-5, #wrap.colorskin-custom [data-alias="Host-slider"] #slide-4-layer-6, #wrap.colorskin-custom [data-alias="Host-slider"] #slide-6-layer-20, #wrap.colorskin-custom [data-alias="Host-slider"] #slide-6-layer-5, #wrap.colorskin-custom [data-alias="Host-slider"] #slide-6-layer-35:hover, #wrap.colorskin-custom .icon-box14 a.magicmore:hover:before, #wrap.colorskin-custom .Button-Style,#wrap.colorskin-custom div#slide-7-layer-8,#wrap.colorskin-custom div#slide-5-layer-8,#wrap.colorskin-custom div#slide-6-layer-8,#wrap.colorskin-custom .mec-wrap .mec-event-countdown-style2,#wrap.colorskin-custom .mec-wrap .mec-bg-color-hover:hover,#wrap.colorskin-custom .colorskin-custom .mec-event-sharing-wrap:hover > li,#wrap.colorskin-custom div#slide-4-layer-8
  { background-color: <?php echo esc_attr( $color ); ?> !important;}

  /* == border color
  -------------------- */
  #wrap.colorskin-custom .w-pricing-table.pt-type6, #wrap.colorskin-custom #slide-6-layer-35, #wrap.colorskin-custom .w-pricing-table.pt-type6:nth-of-type(4n+4),#wrap.colorskin-custom .icon-box14 a.magicmore:hover:before,#wrap.colorskin-custom .esg-filterbutton.selected,.colorskin-custom .title-plus-text.type-1 h3:before
  { border-color: <?php echo esc_attr( $color ); ?> !important;}


  /* == Woocommerce Specifics
  --------------------------- */
  .colorskin-custom .woocommerce div.product .woocommerce-tabs ul.tabs li.active
  { border-top-color: <?php echo esc_attr( $color ); ?> !important;}


/* ==  Slider button hover color
  --------------------------- */
  #wrap.colorskin-custom .tp-caption.Button-Style:hover, #wrap.colorskin-custom .Button-Style:hover { background: rgba(28,28,28,1.00) !important;}
  
<?php }


/*
 * Custom CSS
*/
$thm_options['vision_church_custom_css'] = isset( $thm_options['vision_church_custom_css'] ) ? $thm_options['vision_church_custom_css'] : '' ;
echo strip_tags($thm_options['vision_church_custom_css']);

$out = $GLOBALS['vision_church_dyncss'] = '';
$out = ob_get_contents();
$out = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $out);
$GLOBALS['vision_church_dyncss'] = str_replace(array("\r\n", "\r", "\n", "\t", '    '), '', $out);
ob_end_clean();


add_action( 'wp_head', 'dynamic_style', 250 );
function dynamic_style() {
  $wn_color = rwmb_meta( 'vision_church_wrap_color_meta' );
  $wn_bg_color =  rwmb_meta( 'vision_church_body_bg_color_meta' );
  $wn_bg_image = rwmb_meta( 'vision_church_body_bg_img_meta' );

  $wrap_color = ! empty( $wn_color ) ? $wn_color : '' ;
  $bgcolor  = ! empty( $wn_bg_color ) ? $wn_bg_color : '' ;
  $bgimages = ! empty( $wn_bg_image ) ? $wn_bg_image : '' ;
  
  $bgimage  = '';
  if ( $bgimages ) :
    foreach ( $bgimages as $bgimage ) :
      $bgimage = $bgimage['full_url'];
    endforeach;
    endif;
    $bgpercent  = rwmb_meta( 'vision_church_body_bg_image_100_meta' );
    $bgrepeat = rwmb_meta( 'vision_church_body_bg_image_repeat_meta' );
    $out = "";
    echo '<style type="text/css" media="screen">body { ';
    if( ! empty( $bgcolor ) ) {
      echo esc_attr( "background-image:url('');background-color: $bgcolor ; "  );
    }
    if( ! empty( $bgimage ) ) {
      if( $bgrepeat == 1 )
        echo  esc_attr( " background-image:url(' $bgimage '); background-repeat:repeat;" );
      else if( $bgrepeat == 2 )
        echo  esc_attr( " background-image:url(' $bgimage '); background-repeat:repeat-x;" );
      else if( $bgrepeat == 3 )
        echo  esc_attr( " background-image:url(' $bgimage '); background-repeat:repeat-y;" );
      else if( $bgrepeat == 0 ) {
        if( $bgpercent )
          echo  esc_attr( " background-image:url(' $bgimage '); background-repeat:no-repeat; background-size:100% auto; " );
        else
          echo  esc_attr( " background-image:url(' $bgimage '); background-repeat:no-repeat; " );
      }
    }
    if( $bgpercent && !empty( $bgimage )){
      echo esc_attr( 'background-size:cover; background-attachment:fixed; background-position:center;' );
    }
    if( $wrap_color ){
      echo esc_attr( '} #wrap{background:'.$wrap_color.';' );
      if ( $bgimage ) {
        echo esc_attr( 'background: none;' );
      }
    }
    if ( !$wrap_color && $bgimage ) {
      echo esc_attr( '} #wrap{background: none;' );
    }
    echo '}</style>';

  // dyncss
  $out = $GLOBALS['vision_church_dyncss'];
  wp_enqueue_style( 'vision-church-dynamic-styles', get_template_directory_uri() . '/css/dyncss.css' );
  wp_add_inline_style( 'vision-church-dynamic-styles', $GLOBALS['vision_church_dyncss']);
}