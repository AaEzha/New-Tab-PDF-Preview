<?php

/**
 * Plugin Name: New Tab Preview PDF
 * Plugin URI: https://elx.web.id/pdf-viewer
 * Description: Menampilkan preview PDF di new tab menggunakan Google Docs Viewer
 * Version: 1.0
 * Text Domain: new-tab-preview-pdf
 * Author: Reza Nurfachmi
 * Author URI: https://nurfachmi.com
 */

function reza_pdf_viewer($atts = array())
{
    // set up default parameters
    extract(shortcode_atts(array(
        'url' => 'https://elx.web.id/wp-content/uploads/2021/07/output.pdf',
        'title' => 'Preview',
        'inpage' => 'no',
    ), $atts));

    switch($inpage) {
        case 'yes':
            $Content = '<iframe src="https://docs.google.com/viewer?url=' . $url . '&embedded=true" style="width:100%; height:500px;" frameborder="0"></iframe>';
            break;

        default:
            $Content = '<a href="https://docs.google.com/viewerng/viewer?url=' . $url . '" target="_blank" alt="Preview ' . $title . '" title="Preview ' . $title . '">' . $title . '</a>';
            break;
    }

    return $Content;
}

add_shortcode('npdfview', 'reza_pdf_viewer');
