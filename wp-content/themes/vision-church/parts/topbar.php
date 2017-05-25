<?php $vision_church_options = vision_church_options();
$vision_church_options['vision_church_header_topbar_enable'] = isset( $vision_church_options['vision_church_header_topbar_enable'] ) ? $vision_church_options['vision_church_header_topbar_enable'] : '2';
if ( $vision_church_options['vision_church_header_topbar_enable'] == '1' ) {
?>
<section class="top-bar 
  <?php
  $vision_church_options['vision_church_topbar_bgcolor_style'] = isset( $vision_church_options['vision_church_topbar_bgcolor_style'] ) ? $vision_church_options['vision_church_topbar_bgcolor_style'] : '1' ;
  if( $vision_church_options['vision_church_topbar_bgcolor_style'] == 2 ) echo ' litex'; ?>">
<div class="container">
<?php
  vision_church_topbar();
?>
</div>
</section>
<?php
}