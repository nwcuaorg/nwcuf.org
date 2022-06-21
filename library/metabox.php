<?php


// init cmb2
require_once( 'cmb2/init.php' );


define( 'CMB_PREFIX', '' );


function cmb2_relative_urls( $value, $field_args, $field ) {
    if ( stristr( $value, 'http' ) ) {
        $value = str_replace( get_site_url(), '', $value );
    }
    return $value;
}



// add metabox(es)
function page_metaboxes( $meta_boxes ) {


    // global vars we're using to store CU Match up questions.
    global $goals, $stages;


    // set up the colors
    $colors = array(
        'teal' => 'Teal',
        'navy' => 'Navy',
        'lime' => 'Lime'
    );



    // showcase metabox
    $showcase_metabox = new_cmb2_box( array(
        'id' => 'showcase_metabox',
        'title' => 'Showcase',
        'object_types' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $showcase_metabox_group = $showcase_metabox->add_field( array(
        'id' => CMB_PREFIX . 'showcase',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Slide', 'cmb2'),
            'remove_button' => __('Remove Slide', 'cmb2'),
            'group_title'   => __( 'Slide {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Link',
        'id'   => 'link',
        'type' => 'text',
        'sanitization_cb' => 'cmb2_relative_urls',
    ) );

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Image/Video',
        'id'   => 'image',
        'type' => 'file',
        'sanitization_cb' => 'cmb2_relative_urls',
        'preview_size' => array( 200, 100 )
    ) );



    // showcase metabox
    $title_metabox = new_cmb2_box( array(
        'id' => 'title_metabox',
        'title' => 'Large Title',
        'object_types' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ));

    $title_metabox->add_field( array(
        'name' => 'Title',
        'id'   => CMB_PREFIX . 'large-title',
        'type' => 'text',
    ) );

    $title_metabox->add_field( array(
        'name' => 'Icon',
        'id'   => CMB_PREFIX . 'large-title-icon',
        'type' => 'file',
        'desc' => 'Suggested: 100x100 pixels, transparent background, white icon.',
        'sanitization_cb' => 'cmb2_relative_urls',
        'preview_size' => array( 100, 100 )
    ) );

    $title_metabox->add_field( array(
        'name' => 'Color',
        'id'   => CMB_PREFIX . 'large-title-color',
        'type' => 'select',
        'default' => 'teal',
        'options' => $colors
    ) );



    // accordion metabox
    $home_thirds_metabox = new_cmb2_box( array(
        'id' => 'home_thirds_metabox',
        'title' => 'Home Thirds',
        'object_types' => array( 'page' ), // post type
        'show_on' => array(
            'key' => 'template',
            'value' => array( "page-front" )
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Left Column',
        'desc' => 'Enter the contents of the left column.',
        'type' => 'title',
        'id'   => CMB_PREFIX . 'home_third_1_section',
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Color (#1)',
        'id'   => CMB_PREFIX . 'home_third_1_color',
        'type' => 'select',
        'default' => 'teal',
        'options' => $colors
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Link URL (#1)',
        'id'   => CMB_PREFIX . 'home_third_1_url',
        'type' => 'text',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Icon (#1)',
        'id'   => CMB_PREFIX . 'home_third_1_icon',
        'type' => 'file',
        'desc' => 'Suggested: 100x100 pixels, transparent background, white icon.',
        'preview_size' => array( 100, 100 ),
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Title (#1)',
        'id'   => CMB_PREFIX . 'home_third_1_title',
        'type' => 'text',
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Subtitle (#1)',
        'id'   => CMB_PREFIX . 'home_third_1_subtitle',
        'type' => 'text',
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Statistic Number (#1)',
        'id'   => CMB_PREFIX . 'home_third_1_stat_number',
        'type' => 'text',
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Statistic Label (#1)',
        'id'   => CMB_PREFIX . 'home_third_1_stat_label',
        'type' => 'text',
    ) );


    $home_thirds_metabox->add_field( array(
        'name' => 'Center Column',
        'desc' => 'Enter the contents of the center column.',
        'type' => 'title',
        'id'   => CMB_PREFIX . 'home_third_2_section',
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Color (#2)',
        'id'   => CMB_PREFIX . 'home_third_2_color',
        'type' => 'select',
        'default' => 'teal',
        'options' => $colors
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Link URL (#2)',
        'id'   => CMB_PREFIX . 'home_third_2_url',
        'type' => 'text',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Icon (#2)',
        'id'   => CMB_PREFIX . 'home_third_2_icon',
        'type' => 'file',
        'desc' => 'Suggested: 100x100 pixels, transparent background, white icon.',
        'preview_size' => array( 100, 100 ),
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Title (#2)',
        'id'   => CMB_PREFIX . 'home_third_2_title',
        'type' => 'text',
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Subtitle (#2)',
        'id'   => CMB_PREFIX . 'home_third_2_subtitle',
        'type' => 'text',
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Statistic Number (#2)',
        'id'   => CMB_PREFIX . 'home_third_2_stat_number',
        'type' => 'text',
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Statistic Label (#2)',
        'id'   => CMB_PREFIX . 'home_third_2_stat_label',
        'type' => 'text',
    ) );


    $home_thirds_metabox->add_field( array(
        'name' => 'Right Column',
        'desc' => 'Enter the contents of the right column.',
        'type' => 'title',
        'id'   => CMB_PREFIX . 'home_third_3_section',
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Color (#3)',
        'id'   => CMB_PREFIX . 'home_third_3_color',
        'type' => 'select',
        'default' => 'teal',
        'options' => $colors
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Link URL (#3)',
        'id'   => CMB_PREFIX . 'home_third_3_url',
        'type' => 'text',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Icon (#3)',
        'id'   => CMB_PREFIX . 'home_third_3_icon',
        'type' => 'file',
        'desc' => 'Suggested: 100x100 pixels, transparent background, white icon.',
        'preview_size' => array( 100, 100 ),
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Title (#3)',
        'id'   => CMB_PREFIX . 'home_third_3_title',
        'type' => 'text',
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Subtitle (#3)',
        'id'   => CMB_PREFIX . 'home_third_3_subtitle',
        'type' => 'text',
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Statistic Number (#3)',
        'id'   => CMB_PREFIX . 'home_third_3_stat_number',
        'type' => 'text',
    ) );

    $home_thirds_metabox->add_field( array(
        'name' => 'Statistic Label (#3)',
        'id'   => CMB_PREFIX . 'home_third_3_stat_label',
        'type' => 'text',
    ) );



    // showcase metabox
    $showcase_footer_metabox = new_cmb2_box( array(
        'id' => 'showcase_footer_metabox',
        'title' => 'Footer Showcase',
        'object_types' => array( 'page' ), // post type
        'show_on' => array(
            'key' => 'template',
            'value' => array( "page-front" )
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $showcase_footer_metabox_group = $showcase_footer_metabox->add_field( array(
        'id' => CMB_PREFIX . 'showcase-footer',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Slide', 'cmb2'),
            'remove_button' => __('Remove Slide', 'cmb2'),
            'group_title'   => __( 'Slide {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $showcase_footer_metabox->add_group_field( $showcase_footer_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );

    $showcase_footer_metabox->add_group_field( $showcase_footer_metabox_group, array(
        'name' => 'Link',
        'id'   => 'link',
        'type' => 'text',
        'sanitization_cb' => 'cmb2_relative_urls',
    ) );

    $showcase_footer_metabox->add_group_field( $showcase_footer_metabox_group, array(
        'name' => 'Image/Video',
        'id'   => 'image',
        'type' => 'file',
        'sanitization_cb' => 'cmb2_relative_urls',
        'preview_size' => array( 200, 100 )
    ) );



    // job metabox
    $job_metabox = new_cmb2_box( array(
        'id' => 'job_metabox',
        'title' => 'Job',
        'object_types' => array( 'job' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ));

    $job_metabox->add_field( array(
        'name' => 'Region',
        'id'   => CMB_PREFIX . 'job_region',
        'type' => 'text',
    ) );

    $job_metabox->add_field( array(
        'name' => 'Company',
        'id'   => CMB_PREFIX . 'job_company',
        'type' => 'text',
    ) );

    $job_metabox->add_field( array(
        'name' => 'Job Type',
        'id'   => CMB_PREFIX . 'job_type',
        'type' => 'select',
        'options' => array(
            'Staff' => 'Staff',
            'Management' => 'Management'
        ),
        'default' => 'Staff'
    ) );

    $job_metabox->add_field( array(
        'name' => 'Education',
        'id'   => CMB_PREFIX . 'job_education',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );

    $job_metabox->add_field( array(
        'name' => 'Comments',
        'id'   => CMB_PREFIX . 'job_comments',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );

    $job_metabox->add_field( array(
        'name' => 'Contact Name',
        'id'   => CMB_PREFIX . 'job_contact_name',
        'type' => 'text'
    ) );

    $job_metabox->add_field( array(
        'name' => 'Contact Title',
        'id'   => CMB_PREFIX . 'job_contact_title',
        'type' => 'text'
    ) );

    $job_metabox->add_field( array(
        'name' => 'Contact Email',
        'id'   => CMB_PREFIX . 'job_contact_email',
        'type' => 'text_email'
    ) );

    $job_metabox->add_field( array(
        'name' => 'Contact Phone',
        'id'   => CMB_PREFIX . 'job_contact_phone',
        'type' => 'text'
    ) );

    $job_metabox->add_field( array(
        'name' => 'Contact Fax',
        'id'   => CMB_PREFIX . 'job_contact_fax',
        'type' => 'text'
    ) );



    // impact statistic metabox
    $stat_metabox = new_cmb2_box( array(
        'id' => 'stat_metabox',
        'title' => 'Impact Statistic',
        'object_types' => array( 'page' ), // post type
        'show_on' => array(
            'key' => 'template',
            'value' => array( 'page-product' )
        ),
        'context' => 'normal',
        'priority' => 'high',
    ));

    $stat_metabox->add_field( array(
        'name' => 'Number',
        'id'   => CMB_PREFIX . 'stat_number',
        'type' => 'text',
    ) );

    $stat_metabox->add_field( array(
        'name' => 'Label',
        'id'   => CMB_PREFIX . 'stat_label',
        'type' => 'text',
    ) );

    $stat_metabox->add_field( array(
        'name' => 'Content',
        'id'   => CMB_PREFIX . 'stat_content',
        'type' => 'textarea',
        'desc' => 'Displayed in the right column.'
    ) );



    // showcase metabox
    $work_metabox = new_cmb2_box( array(
        'id' => 'work_metabox',
        'title' => 'Columns',
        'desc' => 'Repeatable content that displays in 3 columns. Has 2 optional buttons per item.',
        'object_types' => array( 'page' ), // post type
        'show_on' => array(
            'key' => 'template',
            'value' => array( 'page-pillar', 'page-product' )
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $work_metabox->add_field( array(
        'name' => 'Section title',
        'id'   => CMB_PREFIX . 'work_title',
        'type' => 'text',
    ) );

    $work_metabox_group = $work_metabox->add_field( array(
        'id' => CMB_PREFIX . 'work',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Item', 'cmb2'),
            'remove_button' => __('Remove Item', 'cmb2'),
            'group_title'   => __( 'Item {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $work_metabox->add_group_field( $work_metabox_group, array(
        'name' => 'Image',
        'id'   => 'image',
        'type' => 'file',
        'preview_size' => array( 100, 100 ),
        'desc' => 'Suggested: 100x100 pixels, transparent background, white icon.',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $work_metabox->add_group_field( $work_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );

    $work_metabox->add_group_field( $work_metabox_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
    ) );

    $work_metabox->add_group_field( $work_metabox_group, array(
        'name' => 'Orange Button Text',
        'id'   => 'orange_text',
        'type' => 'text',
    ) );

    $work_metabox->add_group_field( $work_metabox_group, array(
        'name' => 'Orange Button Link',
        'id'   => 'orange_link',
        'type' => 'text',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $work_metabox->add_group_field( $work_metabox_group, array(
        'name' => 'Second Button Text',
        'id'   => 'second_text',
        'type' => 'text',
    ) );

    $work_metabox->add_group_field( $work_metabox_group, array(
        'name' => 'Second Button Link',
        'id'   => 'second_link',
        'type' => 'text',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $work_metabox->add_group_field( $work_metabox_group, array(
        'name' => 'Under Button Text',
        'id'   => 'quiet',
        'type' => 'text',
    ) );



    // showcase metabox
    $columns_1_metabox = new_cmb2_box( array(
        'id' => 'columns_1_metabox',
        'title' => 'Columns (First Section)',
        'desc' => 'Repeatable content that displays in 3 columns with a wysiwyg before.',
        'object_types' => array( 'page' ), // post type
        'show_on' => array(
            'key' => 'template',
            'value' => array( 'page-monolith' )
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $columns_1_metabox->add_field( array(
        'name' => 'Section title',
        'id'   => CMB_PREFIX . 'columns_1_title',
        'type' => 'text',
    ) );

    $columns_1_metabox->add_field( array(
        'name' => 'Section Color',
        'id'   => CMB_PREFIX . 'columns_1_color',
        'type' => 'select',
        'default' => 'teal',
        'options' => $colors
    ) );

    $columns_1_metabox->add_field( array(
        'name' => 'Section Content',
        'id'   => CMB_PREFIX . 'columns_1_content',
        'type' => 'wysiwyg',
    ) );

    $columns_1_metabox_group = $columns_1_metabox->add_field( array(
        'id' => CMB_PREFIX . 'columns_1',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Item', 'cmb2'),
            'remove_button' => __('Remove Item', 'cmb2'),
            'group_title'   => __( 'Item {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $columns_1_metabox->add_group_field( $columns_1_metabox_group, array(
        'name' => 'Image',
        'id'   => 'image',
        'type' => 'file',
        'preview_size' => array( 100, 100 ),
        'desc' => 'Suggested: 100x100 pixels, transparent background, grey icon - or a photo.',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $columns_1_metabox->add_group_field( $columns_1_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );

    $columns_1_metabox->add_group_field( $columns_1_metabox_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $columns_1_metabox->add_group_field( $columns_1_metabox_group, array(
        'name' => 'Orange Button Text',
        'id'   => 'orange_text',
        'type' => 'text',
    ) );

    $columns_1_metabox->add_group_field( $columns_1_metabox_group, array(
        'name' => 'Orange Button Link',
        'id'   => 'orange_link',
        'type' => 'text',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $columns_1_metabox->add_group_field( $columns_1_metabox_group, array(
        'name' => 'Second Button Text',
        'id'   => 'second_text',
        'type' => 'text',
    ) );

    $columns_1_metabox->add_group_field( $columns_1_metabox_group, array(
        'name' => 'Second Button Link',
        'id'   => 'second_link',
        'type' => 'text',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $columns_1_metabox->add_group_field( $columns_1_metabox_group, array(
        'name' => 'Under Button Text',
        'id'   => 'quiet',
        'type' => 'text',
    ) );



    // showcase metabox
    $columns_2_metabox = new_cmb2_box( array(
        'id' => 'columns_2_metabox',
        'title' => 'Columns (Second Section)',
        'desc' => 'Repeatable content that displays in 3 columns with a wysiwyg before.',
        'object_types' => array( 'page' ), // post type
        'show_on' => array(
            'key' => 'template',
            'value' => array( 'page-monolith' )
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $columns_2_metabox->add_field( array(
        'name' => 'Section title',
        'id'   => CMB_PREFIX . 'columns_2_title',
        'type' => 'text',
    ) );

    $columns_2_metabox->add_field( array(
        'name' => 'Section Color',
        'id'   => CMB_PREFIX . 'columns_2_color',
        'type' => 'select',
        'default' => 'teal',
        'options' => $colors
    ) );

    $columns_2_metabox->add_field( array(
        'name' => 'Section Content',
        'id'   => CMB_PREFIX . 'columns_2_content',
        'type' => 'wysiwyg',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $columns_2_metabox_group = $columns_2_metabox->add_field( array(
        'id' => CMB_PREFIX . 'columns_2',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Item', 'cmb2'),
            'remove_button' => __('Remove Item', 'cmb2'),
            'group_title'   => __( 'Item {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $columns_2_metabox->add_group_field( $columns_2_metabox_group, array(
        'name' => 'Image',
        'id'   => 'image',
        'type' => 'file',
        'preview_size' => array( 100, 100 ),
        'desc' => 'Suggested: 100x100 pixels, transparent background, grey icon - or a photo.',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $columns_2_metabox->add_group_field( $columns_2_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );

    $columns_2_metabox->add_group_field( $columns_2_metabox_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $columns_2_metabox->add_group_field( $columns_2_metabox_group, array(
        'name' => 'Orange Button Text',
        'id'   => 'orange_text',
        'type' => 'text',
    ) );

    $columns_2_metabox->add_group_field( $columns_2_metabox_group, array(
        'name' => 'Orange Button Link',
        'id'   => 'orange_link',
        'type' => 'text',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $columns_2_metabox->add_group_field( $columns_2_metabox_group, array(
        'name' => 'Second Button Text',
        'id'   => 'second_text',
        'type' => 'text',
    ) );

    $columns_2_metabox->add_group_field( $columns_2_metabox_group, array(
        'name' => 'Second Button Link',
        'id'   => 'second_link',
        'type' => 'text',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $columns_2_metabox->add_group_field( $columns_2_metabox_group, array(
        'name' => 'Under Button Text',
        'id'   => 'quiet',
        'type' => 'text',
    ) );



    // showcase metabox
    $columns_3_metabox = new_cmb2_box( array(
        'id' => 'columns_3_metabox',
        'title' => 'Columns (Third Section)',
        'desc' => 'Repeatable content that displays in 3 columns with a wysiwyg before.',
        'object_types' => array( 'page' ), // post type
        'show_on' => array(
            'key' => 'template',
            'value' => array( 'page-monolith' )
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $columns_3_metabox->add_field( array(
        'name' => 'Section title',
        'id'   => CMB_PREFIX . 'columns_3_title',
        'type' => 'text',
    ) );

    $columns_3_metabox->add_field( array(
        'name' => 'Section Color',
        'id'   => CMB_PREFIX . 'columns_3_color',
        'type' => 'select',
        'default' => 'teal',
        'options' => $colors
    ) );

    $columns_3_metabox->add_field( array(
        'name' => 'Section Content',
        'id'   => CMB_PREFIX . 'columns_3_content',
        'type' => 'wysiwyg',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $columns_3_metabox_group = $columns_3_metabox->add_field( array(
        'id' => CMB_PREFIX . 'columns_3',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Item', 'cmb2'),
            'remove_button' => __('Remove Item', 'cmb2'),
            'group_title'   => __( 'Item {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $columns_3_metabox->add_group_field( $columns_3_metabox_group, array(
        'name' => 'Image',
        'id'   => 'image',
        'type' => 'file',
        'preview_size' => array( 100, 100 ),
        'desc' => 'Suggested: 100x100 pixels, transparent background, grey icon - or a photo.',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $columns_3_metabox->add_group_field( $columns_3_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );

    $columns_3_metabox->add_group_field( $columns_3_metabox_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $columns_3_metabox->add_group_field( $columns_3_metabox_group, array(
        'name' => 'Orange Button Text',
        'id'   => 'orange_text',
        'type' => 'text',
    ) );

    $columns_3_metabox->add_group_field( $columns_3_metabox_group, array(
        'name' => 'Orange Button Link',
        'id'   => 'orange_link',
        'type' => 'text',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $columns_3_metabox->add_group_field( $columns_3_metabox_group, array(
        'name' => 'Second Button Text',
        'id'   => 'second_text',
        'type' => 'text',
    ) );

    $columns_3_metabox->add_group_field( $columns_3_metabox_group, array(
        'name' => 'Second Button Link',
        'id'   => 'second_link',
        'type' => 'text',
        'sanitization_cb' => 'cmb2_relative_urls'
    ) );

    $columns_3_metabox->add_group_field( $columns_3_metabox_group, array(
        'name' => 'Under Button Text',
        'id'   => 'quiet',
        'type' => 'text',
    ) );



    // impact statistic metabox
    $article_tag_metabox = new_cmb2_box( array(
        'id' => 'article_cat_metabox',
        'title' => 'Article Category',
        'object_types' => array( 'page' ), // post type
        'show_on' => array(
            'key' => 'template',
            'value' => array( 'page-product', 'page-pillar' )
        ),
        'context' => 'normal',
        'priority' => 'high',
    ));

    $article_tag_metabox->add_field( array(
        'name'           => 'Category',
        'desc'           => 'Select a post category to output articles.',
        'id'             => CMB_PREFIX . 'article_cat',
        'taxonomy'       => 'category', //Enter Taxonomy Slug
        'type'           => 'taxonomy_select',
        'remove_default' => 'true' // Removes the default metabox provided by WP core.
    ) );


}
add_filter( 'cmb2_init', 'page_metaboxes' );



// get CMB value
function get_cmb_value( $field ) {
    return get_post_meta( get_the_ID(), CMB_PREFIX . $field, 1 );
}


// get CMB value
function has_cmb_value( $field ) {
    $cval = get_cmb_value( $field );
    return ( !empty( $cval ) ? true : false );
}


// get CMB value
function show_cmb_value( $field, $default='' ) {
    $val = get_cmb_value( $field );
    print ( !empty( $val ) ? $val : $default );
}


// get CMB value
function show_cmb_wysiwyg_value( $field ) {
    print apply_filters( 'the_content', get_cmb_value( $field ) );
}


function cmb2_metabox_show_on_template( $display, $meta_box ) {
    if ( isset( $meta_box['show_on']['key'] ) && isset( $meta_box['show_on']['value'] ) ) :
        if( 'template' !== $meta_box['show_on']['key'] )
            return $display;

        // Get the current ID
        if( isset( $_GET['post'] ) ) $post_id = $_GET['post'];
        elseif( isset( $_POST['post_ID'] ) ) $post_id = $_POST['post_ID'];
        if( !isset( $post_id ) ) return false;

        $template_name = get_page_template_slug( $post_id );
        if ( !empty( $template_name ) ) $template_name = substr($template_name, 0, -4);

        // If value isn't an array, turn it into one
        $meta_box['show_on']['value'] = !is_array( $meta_box['show_on']['value'] ) ? array( $meta_box['show_on']['value'] ) : $meta_box['show_on']['value'];

        // See if there's a match
        return in_array( $template_name, $meta_box['show_on']['value'] );
    else:
        return $display;
    endif;
}
add_filter( 'cmb2_show_on', 'cmb2_metabox_show_on_template', 10, 2 );



?>