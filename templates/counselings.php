<?php
$loop = new WP_Query( [ 'post_type' => 'acf', 'posts_per_page' => 1 ] );

if ($loop->have_posts()) {
  echo 'Counseling';
}else{
  echo 'no counseling found';
}

