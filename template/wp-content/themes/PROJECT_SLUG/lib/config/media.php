<?php
/**
 * More info:
 * https://codex.wordpress.org/Function_Reference/add_image_size
 *
 * Medium & Large are reserved image size names so they need to be set with
 * update_option
 */
add_image_size('small', 640, 640);

update_option('medium_size_w', 1280);
update_option('medium_size_h', 1280);

update_option('large_size_w', 2560);
update_option('large_size_h', 2560);
