<?php
/*
	WP SEO Image Optimizer - Improve the SEO of your images.
	Copyright (C) 2018 Rafaël De Jongh & Yogensia

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see http://www.gnu.org/licenses/.
*/

/* Do not open this file directly. */
if(!defined('ABSPATH'))die();

/* Settings in Media section of admin panel. */
function seoio_settings_api_init() {
	// Add the section to media settings page.
	// (id, title, callback, page)
	add_settings_section(
		'seoio_image_meta',
		'SEO Image Optimizer',
		'seoio_settings_callback',
		'media'
	);

	// Add the fields to the new section.
	// (id, title, callback, page, section, args)
	add_settings_field(
		'seoio_clean_image_titles',
		'Clean Image Titles on Upload',
		'seoio_clean_image_titles_callback',
		'media',
		'seoio_image_meta'
	);

	add_settings_field(
		'seoio_capitalize_image_titles',
		'Capitalize Image Titles on Upload',
		'seoio_capitalize_image_titles_callback',
		'media',
		'seoio_image_meta'
	);

	add_settings_field(
		'seoio_title_to_alt',
		'Copy Title to Alternative Text',
		'seoio_title_to_alt_callback',
		'media',
		'seoio_image_meta'
	);

	add_settings_field(
		'seoio_title_to_desc',
		'Copy Title to Description',
		'seoio_title_to_desc_callback',
		'media',
		'seoio_image_meta'
	);

	add_settings_field(
		'seoio_title_to_caption',
		'Copy Title to Caption',
		'seoio_title_to_caption_callback',
		'media',
		'seoio_image_meta'
	);

	add_settings_field(
		'seoio_overwrite_data',
		'Overwrite Fields',
		'seoio_overwrite_data_callback',
		'media',
		'seoio_image_meta'
	);

	register_setting( 'media', 'seoio_clean_image_titles' );
	register_setting( 'media', 'seoio_capitalize_image_titles' );
	register_setting( 'media', 'seoio_title_to_alt' );
	register_setting( 'media', 'seoio_title_to_desc' );
	register_setting( 'media', 'seoio_title_to_caption' );
	register_setting( 'media', 'seoio_overwrite_data' );
}
add_action( 'admin_init', 'seoio_settings_api_init', 1 );

// Callback functions.
function seoio_settings_callback() {
	echo '<p>Choose your image title clean up options and if you want to copy the title to the alt, description and caption fields of new image uploads.</p>';
}

function seoio_clean_image_titles_callback() {
	echo '<input name="seoio_clean_image_titles" type="checkbox" id="seoio_clean_image_titles" value="1"';

	$seoio_clean_image_titles = get_option( 'seoio_clean_image_titles' );

	if ( $seoio_clean_image_titles == 1 ) {
		echo ' checked';
	}

	echo '/>';
	echo '<label for="seoio_clean_image_titles">Replace dashes and underscores with spaces</label>';
}

function seoio_capitalize_image_titles_callback() {
	echo '<input name="seoio_capitalize_image_titles" type="checkbox" id="seoio_capitalize_image_titles" value="1"';

	$seoio_capitalize_image_titles = get_option( 'seoio_capitalize_image_titles' );

	if ( $seoio_capitalize_image_titles == 1 ) {
		echo ' checked';
	}

	echo '/>';
	echo '<label for="seoio_capitalize_image_titles">Capitalize every word in the title of images</label>';
}

function seoio_title_to_alt_callback() {
	echo '<input name="seoio_title_to_alt" type="checkbox" id="seoio_title_to_alt" value="1"';

	$seoio_title_to_alt = get_option( 'seoio_title_to_alt' );

	if ( $seoio_title_to_alt == 1 ) {
		echo ' checked';
	}

	echo '/>';
	echo '<label for="seoio_title_to_alt">Copy title to alternative text</label>';
}

function seoio_title_to_desc_callback() {
	echo '<input name="seoio_title_to_desc" type="checkbox" id="seoio_title_to_desc" value="1"';

	$seoio_title_to_desc = get_option( 'seoio_title_to_desc' );

	if ( $seoio_title_to_desc == 1 ) {
		echo ' checked';
	}

	echo '/>';
	echo '<label for="seoio_title_to_desc">Copy title to description</label>';
}

function seoio_title_to_caption_callback() {
	echo '<input name="seoio_title_to_caption" type="checkbox" id="seoio_title_to_caption" value="1"';

	$seoio_title_to_caption = get_option( 'seoio_title_to_caption' );

	if ( $seoio_title_to_caption == 1 ) {
		echo ' checked';
	}

	echo '/>';
	echo '<label for="seoio_title_to_caption">Copy title to caption</label>';
}

function seoio_overwrite_data_callback() {
	echo '<input name="seoio_overwrite_data" type="checkbox" id="seoio_overwrite_data" value="1"';

	$seoio_overwrite_data = get_option( 'seoio_overwrite_data' );

	if ( $seoio_overwrite_data == 1 ) {
		echo ' checked';
	}

	echo '/>';
	echo '<label for="seoio_overwrite_data">Allow to overwrite fields when auto-populating alt text, caption or descriptions of existing images.<br />';
	echo '<span style="color:#a00;"><strong>Important:</strong> Enabling this may cause irreversible loss of data. Make a backup first!</span></label>';
}
