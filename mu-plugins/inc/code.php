<?php
 /*
  * Code Post Type
  * These are projects posted in the Code Section
  */


  add_action('init', 'create_code_project_post_type');
  function create_code_project_post_type() {
    $labels = array(
	      'name'               => __( 'Code' ),
	      'singular_name'      => __( 'Code Project' ),
	      'add_new'            => __( 'Add New' ),
	      'add_new_project'       => __( 'Add New Code Project' ),
	      'edit'               => __( 'Edit Code Project' ),
	      'new_project'           => __( 'New Code Project' ),
	      'search_projects'       => __( 'Search Code Projects' ),
	      'not_found'          => __( 'No code projects found' ),
	      'not_found_in_trash' => __( 'No code projects were found in the trash' ),
    );

    $args = array(
    	  'labels'   => $labels,
    	  'supports' => array('title', 'editor', 'thumbnail'),
        'public'   => true,
        'rewrite'  => false,
        'taxonomies' => array('code_taxonomy')
    );

    register_post_type('code', $args);
    flush_rewrite_rules();
  }


  // -------------------------------------------------------------
  // Add Meta Boxes
  // -------------------------------------------------------------

  $code_project_metabox = array(
    'id'       => 'code_project_metabox',
    'title'    => 'Meta Fields',
    'page'     => 'code',
    'context'  => 'normal',
    'priority' => 'default',
    'fields'   => array(
      array(
        'name' => 'Type of Project',
        'desc' => '',
        'id'   => 'code_project_type_of_project',
        'type' => 'text',
        'std'  => ''
      ),
      array(
        'name' => 'Video ID (YouTube)',
        'desc' => '',
        'id'   => 'code_project_video_url',
        'type' => 'text',
        'std'  => ''
      ),
      array(
        'name' => 'Featured',
        'desc' => '',
        'id'   => 'code_project_front_page',
        'type' => 'checkbox',
        'std'  => ''
      )
    )
  );

  // Display Meta Box
  add_action( 'admin_menu', 'code_project_add_box' );
  function code_project_add_box() {
    global $code_project_metabox;
    add_meta_box(
      $code_project_metabox['id'],
      $code_project_metabox['title'],
      'code_project_show_box',
      $code_project_metabox['page'],
      $code_project_metabox['context'],
      $code_project_metabox['priority']
    );
  }

  function code_project_show_box()
  {
    global $code_project_metabox, $post;
    //echo '<input type="hidden" name="product_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table">';
    foreach ($code_project_metabox['fields'] as $field) {
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
  add_action( 'save_post', 'update_code_project_metadata' );
  function update_code_project_metadata() {
    global $post_id;
    global $code_project_metabox;

    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return $post_id;
    }

    foreach($code_project_metabox['fields'] as $field) {
       //echo $_POST[$field['id']];
        update_post_meta($post_id, $field['id'], $_POST[$field['id']]);
    }
  }



?>
