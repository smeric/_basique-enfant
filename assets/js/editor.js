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

    const { __ } = wp.i18n;

    /* Adding Heading Block Styles */
    wp.blocks.registerBlockStyle(
        'core/heading', [
            {
                name: 'default',
                label: __( 'Default', '_basique-enfant' ),
                isDefault: true,
            },{
                name: 'alt',
                label: __( 'Alternate', '_basique-enfant' ),
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
                label: __( 'Default', '_basique-enfant' ),
                isDefault: true,
            },{
                name: 'full',
                label: __( 'Full Width', '_basique-enfant' ),
            }
        ]
    );

});


!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=1)}([function(e,t){!function(){e.exports=this.wp.element}()},function(e,t,n){"use strict";n.r(t);var r=n(0),o=wp.plugins.registerPlugin,u=wp.editPost.PluginDocumentSettingPanel;o("plugin-document-setting-panel-demo",{render:function(){return Object(r.createElement)(u,{name:"custom-panel",title:"Custom Panel",className:"custom-panel"},"Custom Panel Contents")}})}]);


