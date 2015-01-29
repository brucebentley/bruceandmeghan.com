<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'thm_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function thm_register_meta_boxes( $meta_boxes )
{
    /**
     * Prefix of meta keys (optional)
     * Use underscore (_) at the beginning to make keys hidden
     * Alt.: You also can make prefix empty to disable it
     */
    // Better has an underscore as last sign
    $prefix = 'thm_';

        // 1st meta box
    $meta_boxes[] = array(
        'id' => 'post-meta-quote',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Post Quote Settings', 'wedding' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'post'),

        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',

        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',

        // Auto save: true, false (default). Optional.
        'autosave' => true,

        // List of meta fields
        'fields' => array(
            array(
                // Field name - Will be used as label
                'name'  => __( 'Qoute Text', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}qoute",
                'desc'  => __( 'Write Your Qoute Here', 'wedding' ),
                'type'  => 'textarea',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Qoute Author', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}qoute_author",
                'desc'  => __( 'Write Qoute Author or Source', 'wedding' ),
                'type'  => 'text',
                // Default value (optional)
                'std'   => ''
            )

        )
    );

    $meta_boxes[] = array(
        'id' => 'post-meta-chat',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Post Chat Settings', 'wedding' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'post'),

        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',

        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',

        // Auto save: true, false (default). Optional.
        'autosave' => true,

        // List of meta fields
        'fields' => array(
            array(
                // Field name - Will be used as label
                'name'  => __( 'Chat Message', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}chat_text",
                'type' => 'wysiwyg',
                'raw'  => false,
                'options' => array(
                    'textarea_rows' => 4,
                    'teeny'         => false,
                    'media_buttons' => false,
                )
            )

        )
    );


    $meta_boxes[] = array(
        'id' => 'post-meta-link',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Post Link Settings', 'wedding' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'post'),

        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',

        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',

        // Auto save: true, false (default). Optional.
        'autosave' => true,

        // List of meta fields
        'fields' => array(
            array(
                // Field name - Will be used as label
                'name'  => __( 'Link URL', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}link",
                'desc'  => __( 'Write Your Link', 'wedding' ),
                'type'  => 'text',
                // Default value (optional)
                'std'   => ''
            )

        )
    );


    $meta_boxes[] = array(
        'id' => 'post-meta-audio',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Post Audio Settings', 'wedding' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'post'),

        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',

        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',

        // Auto save: true, false (default). Optional.
        'autosave' => true,

        // List of meta fields
        'fields' => array(
            array(
                // Field name - Will be used as label
                'name'  => __( 'Audio Embed Code', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}audio_code",
                'desc'  => __( 'Write Your Audio Embed Code Here', 'wedding' ),
                'type'  => 'textarea',
                // Default value (optional)
                'std'   => ''
            )

        )
    );

    $meta_boxes[] = array(
        'id' => 'post-meta-status',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Post Status Settings', 'wedding' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'post'),

        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',

        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',

        // Auto save: true, false (default). Optional.
        'autosave' => true,

        // List of meta fields
        'fields' => array(
            array(
                // Field name - Will be used as label
                'name'  => __( 'Status URL', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}status_url",
                'desc'  => __( 'Write Facebook, Twitter etc status link', 'wedding' ),
                'type'  => 'textarea',
                // Default value (optional)
                'std'   => ''
            )

        )
    );


    $meta_boxes[] = array(
        'id' => 'post-meta-video',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Post Video Settings', 'wedding' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'post'),

        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',

        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',

        // Auto save: true, false (default). Optional.
        'autosave' => true,

        // List of meta fields
        'fields' => array(
            array(
                // Field name - Will be used as label
                'name'  => __( 'Video Embed Code/ID', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}video",
                'desc'  => __( 'Write Your Vedio Embed Code/ID Here', 'wedding' ),
                'type'  => 'textarea',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                'name'     => __( 'Select Vedio Type/Source', 'wedding' ),
                'id'       => "{$prefix}video_source",
                'type'     => 'select',
                // Array of 'value' => 'Label' pairs for select box
                'options'  => array(
                    '1' => __( 'Embed Code', 'wedding' ),
                    '2' => __( 'YouTube', 'wedding' ),
                    '3' => __( 'Vimeo', 'wedding' ),
                ),
                // Select multiple values, optional. Default is false.
                'multiple'    => false,
                'std'         => '1'
            ),

        )
    );


    $meta_boxes[] = array(
        'id' => 'post-meta-gallery',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Post Gallery Settings', 'wedding' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'post'),

        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',

        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',

        // Auto save: true, false (default). Optional.
        'autosave' => true,

        // List of meta fields
        'fields' => array(
            array(
                'name'             => __( 'Gallery Image Upload', 'wedding' ),
                'id'               => "{$prefix}gallery_images",
                'type'             => 'image_advanced',
                'max_file_uploads' => 5,
            )
        )
    );


    $meta_boxes[] = array(
        'id' => 'page-meta-settings',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Page Settings', 'wedding' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'page'),

        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',

        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',

        // List of meta fields
        'fields' => array(
            array(
                // Field name - Will be used as label
                'name'  => __( 'Alternative Title', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}page_title",
                'type'  => 'text',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Subtitle', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}page_subtitle",
                'type'  => 'text',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Disable Title', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}no_title",
                'type'  => 'checkbox',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Open in New Page', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}no_hash",
                'type'  => 'checkbox',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Page Section Background', 'wedding' ),
                'desc'  => 'One Page Section Color',
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}bg_color",
                'type'  => 'color',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Disable From Menu', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}disable_menu",
                'type'  => 'checkbox',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                'name'     => __( 'Page Section Type', 'wedding' ),
                'id'       => "{$prefix}section_type",
                'type'     => 'select',
                // Array of 'value' => 'Label' pairs for select box
                'options'  => array(
                    'default'   => __( 'Default', 'wedding' ),
                    'full'      => __( 'Full-Width', 'wedding' ),
                    'parallax'  => __( 'Parallax', 'wedding' )
                ),
                // Select multiple values, optional. Default is false.
                'multiple'    => false,
                'std'         => 'default'
            ),

            array(
                'name'    => __( 'Background Url', 'wedding' ),
                'id'      => "{$prefix}background_url",
                'type'    => 'text'
            )

        )
    );

    $meta_boxes[] = array(
        'id' => 'slider-meta-setting',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Additional Infomation', 'wedding' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'slider'),

        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',

        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',

        // Auto save: true, false (default). Optional.
        'autosave' => true,

        // List of meta fields
        'fields' => array(
            array(
                // Field name - Will be used as label
                'name'  => __( 'Button Text', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}btn_text",
                'type'  => 'text',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Button Link', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}btn_link",
                'type'  => 'text',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Button Two Text', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}btn_two_text",
                'type'  => 'text',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Button Two Link', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}btn_two_link",
                'type'  => 'text',
                // Default value (optional)
                'std'   => ''
            )
        )
    );

    //Team Metabox
    $meta_boxes[] = array(
        'id' => 'team-meta-setting',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Additional Infomation', 'wedding' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'team'),

        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',

        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',

        // Auto save: true, false (default). Optional.
        'autosave' => true,

        // List of meta fields
        'fields' => array(
            array(
                // Field name - Will be used as label
                'name'  => __( 'Designation', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}designation",
                'type'  => 'text',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Facebook Url', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}facebook_url",
                'type'  => 'text',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Twitter Url', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}twitter_url",
                'type'  => 'text',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Google Plus Url', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}plusone_url",
                'type'  => 'text',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Pinterest Url', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}pinterest_url",
                'type'  => 'text',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Linkedin Url', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}linkedin_url",
                'type'  => 'text',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Dribbble Url', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}dribbble_url",
                'type'  => 'text',
                // Default value (optional)
                'std'   => ''
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Flickr Url', 'wedding' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}flickr_url",
                'type'  => 'text',
                // Default value (optional)
                'std'   => ''
            )
        )
    );

    return $meta_boxes;
}