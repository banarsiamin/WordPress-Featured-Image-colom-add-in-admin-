<?php 



add_filter('manage_posts_columns', 'add_img_column_by_ntier');
add_filter('manage_pages_columns', 'add_img_column_by_ntier');
add_filter('manage_posts_custom_column', 'manage_img_column_by_ntier', 10, 2);
add_filter('manage_pages_custom_column', 'manage_img_column_by_ntier', 10, 2);

function add_img_column_by_ntier($columns) {
  $columns = array_slice($columns, 0, 1, true) + array("img" => "Featured Image") + array_slice($columns, 1, count($columns) - 1, true);
  return $columns;
}

function manage_img_column_by_ntier($column_name, $post_id) {
 if( $column_name == 'img' ) {
  echo get_the_post_thumbnail($post_id, 'thumbnail');
 }
 return $column_name;
}
