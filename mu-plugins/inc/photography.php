<?php
 /*
  * Photography Post Type
  * These are styles posted in the Photography Section
  */


  add_action('init', 'create_photography_style_post_type');
  function create_photography_style_post_type() {
    $labels = array(
	      'name'               => __( 'Photography' ),
	      'singular_name'      => __( 'Photography Style' ),
	      'add_new'            => __( 'Add New' ),
	      'add_new_style'       => __( 'Add New Photography Style' ),
	      'edit'               => __( 'Edit Photography Style' ),
	      'new_style'           => __( 'New Photography Style' ),
	      'search_styles'       => __( 'Search Photography Styles' ),
	      'not_found'          => __( 'No photography styles found' ),
	      'not_found_in_trash' => __( 'No photography styles were found in the trash' ),
    );

    $args = array(
    	  'labels'   => $labels,
    	  'supports' => array('title', 'editor', 'thumbnail'),
        'public'   => true,
        'rewrite'  => false,
        'taxonomies' => array('photography_taxonomy')
    );

    register_post_type('photography', $args);
    flush_rewrite_rules();
  }


  // -------------------------------------------------------------
  // Add Meta Boxes
  // -------------------------------------------------------------

  $photography_style_metabox = array(
    'id'       => 'photography_style_metabox',
    'title'    => 'Meta Fields',
    'page'     => 'photography',
    'context'  => 'normal',
    'priority' => 'default',
    'fields'   => array(
      array(
        'name' => 'Type of Style',
        'desc' => '',
        'id'   => 'photography_style_type_of_style',
        'type' => 'text',
        'std'  => ''
      ),
    )
  );

  // Display Meta Box
  add_action( 'admin_menu', 'photography_style_add_box' );
  function photography_style_add_box() {
    global $photography_style_metabox;
    add_meta_box(
      $photography_style_metabox['id'],
      $photography_style_metabox['title'],
      'photography_style_show_box',
      $photography_style_metabox['page'],
      $photography_style_metabox['context'],
      $photography_style_metabox['priority']
    );
  }

  function photography_style_show_box()
  {
    global $photography_style_metabox, $post;
    //echo '<input type="hidden" name="product_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table">';
    foreach ($photography_style_metabox['fields'] as $field) {
      // get current post meta data
      $meta = get_post_meta($post->ID, $field['id'], true);

      echo '<tr>',
        '<th style="width:27%; font-weight:bold;"><label for="', $field['id'], '">', $field['name'], '</label></th>',
        '<td>';
      switch ($field['type']) {

      case 'text':
        echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
          '<br />', $field['desc'];
        break;

     case 'textarea':
        echo '<textarea rows="5" cols="75" name="', $field['id'], '" id="', $field['id'], '">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
        break;

     case 'checkbox':
        echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>
          <label for="'.$field['id'].'">'.$field['desc'].'</label>';
        break;

      }

      echo '<td>',
      '</tr>';
    }
    echo '</table>';
  }

  // -------------------------------------------------------------
  // Setters
  // -------------------------------------------------------------
  add_action( 'save_post', 'update_photography_style_metadata' );
  function update_photography_style_metadata() {
    global $post_id;
    global $photography_style_metabox;

    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return $post_id;
    }

    foreach($photography_style_metabox['fields'] as $field) {
       //echo $_POST[$field['id']];
        update_post_meta($post_id, $field['id'], $_POST[$field['id']]);
    }
  }



?>
