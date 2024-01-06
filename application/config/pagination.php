<?php
//confog
$config['base_url'] = 'http://localhost/CI_APP/peoples/index';

$config['num_link'] = 2;

//paginationm
$config['full_tag_open'] = '<nav aria-label="Page navigation"><ul class="m-4 lh-sm top-50 start-50  pagination">';
$config['full_tag_close'] = '</ul></nav>';

$config['next_link'] = '&raquo;';
$config['next_tag_open'] = '<li class="page-item">';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = '&laquo;';
$config['prev_tag_open'] = '<li class="page-item">';
$config['prev_tag_close'] = '</li>';

$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
$config['cur_tag_close'] = '<span class="sr-only"></span></span></li>';

$config['display_pages'] = true;


// Atur styling untuk pagination
$config['attributes'] = array('class' => 'page-link');

