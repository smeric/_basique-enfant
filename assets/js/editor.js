/**
 * Ajout de styles aux blocks dans Gutenberg
 * 
 * @package WordPress
 * @subpackage _basique-enfant
 **/

/**
 * List of block names
 *
 * You need to know the full block name in order to attach or remove styles from it.
 * Here’s a list of all the core blocks (excluding all the embed ones):
 *
 * core/paragraph
 * core/image
 * core/heading
 * core/gallery
 * core/list﻿
 * core/quote
 * core/audio
 * core/cover
 * core/file
 * core/video
 * core/preformatted
 * core/code
 * core/freeform
 * core/html
 * core/pullquote
 * core/table
 * core/verse
 * core/button
 * core/columns
 * core/media-text
 * core/more
 * core/nextpage
 * core/separator
 * core/spacer
 * core/shortcode
 * core/archives
 * core/categories
 * core/latest-comments
 * core/latest-posts
 *
 * @link https://www.billerickson.net/block-styles-in-gutenberg/
 **/

wp.domReady( () => {

    /* Adding Heading Block Styles */
    wp.blocks.registerBlockStyle(
        'core/heading', [
            {
                name: 'default',
                label: 'Default',
                isDefault: true,
            },{
                name: 'alt',
                label: 'Alternate',
            }
        ]
    );

    /* Removing Button Block Styles */
    wp.blocks.unregisterBlockStyle(
        'core/button', [
            'default',
            'outline',
            'squared',
            'fill'
        ]
    );

    /* Adding Button Block Styles */
    wp.blocks.registerBlockStyle(
        'core/button', [
            {
                name: 'default',
                label: 'Default',
                isDefault: true,
            },{
                name: 'full',
                label: 'Full Width',
            }
        ]
    );

});

