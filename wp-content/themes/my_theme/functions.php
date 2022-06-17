<?php

add_action('woocommerce_product_options_general_product_data', 'art_woo_add_custom_fields');
add_action('woocommerce_process_product_meta', 'art_woo_custom_fields_save', 10);

function art_woo_add_custom_fields()
{
    global $product, $post;
    echo '<div class="options_group">';
    woocommerce_wp_text_input(array(
        'id' => '_number_days',
        'label' => __('days', 'woocommerce'),
        'placeholder' => 'days',
        'description' => __('Количество дней', 'woocommerce'),
        'type' => 'number',
        'custom_attributes' => array(
            'step' => 'any',
            'min' => '0',
        ),
    ));
    woocommerce_wp_text_input(
        [
            'id' => '_text_synonyms',
            'label' => __('Синонимы', 'woocommerce'),
            'placeholder' => 'synonyms',
            'desc_tip' => 'true',
            'description' => __('Синонимы', 'woocommerce'),
        ]
    );
    woocommerce_wp_text_input(
        [
            'id' => '_text_note',
            'label' => __('Заметки', 'woocommerce'),
            'placeholder' => 'Текстовое поле',
            'desc_tip' => 'true',
            'description' => __('note', 'woocommerce'),
        ]
    );
    echo '</div>';
}

function art_woo_custom_fields_save($post_id)
{
    $woocommerce_number_field = $_POST['_number_days'];
    if (!empty($woocommerce_number_field)) {
        update_post_meta($post_id, '_number_days', esc_attr($woocommerce_number_field));
    }
    $woocommerce_number_field = $_POST['_text_synonyms'];
    if (!empty($woocommerce_number_field)) {
        update_post_meta($post_id, '_text_synonyms', esc_attr($woocommerce_number_field));
    }
    $woocommerce_number_field = $_POST['_text_note'];
    if (!empty($woocommerce_number_field)) {
        update_post_meta($post_id, '_text_note', esc_attr($woocommerce_number_field));
    }
}

add_action('rest_api_init', function () {
    register_rest_route('my_theme/v3', 'products/', array(
        'methods' => 'GET',
        'callback' => 'get_latest_posts_by_category'
    ));
});
function get_latest_posts_by_category()
{

    $args = array(
        'post_type' => 'product'
    );

    $posts = get_posts($args);
    foreach ($posts as $k => $post) {
        $price = get_post_meta($post->ID, '_regular_price', true);
        $sale_price = get_post_meta($post->ID, '_price', true);
        $days = get_post_meta($post->ID, '_number_days', true);
        $synonyms = get_post_meta($post->ID, '_text_synonyms', true);
        $note = get_post_meta($post->ID, '_text_note', true);

        $result[$k]->ID = $post->ID;
        $result[$k]->title = $post->post_title;
        $result[$k]->price = $price;
        $result[$k]->sale_price = $sale_price;
        $result[$k]->days = $days;
        $result[$k]->synonyms = $synonyms;
        $result[$k]->note = $note;
    }
//    var_dump($result);
    if (empty($posts)) {
        return new WP_Error('empty_category', 'There are no posts to display', array('status' => 404));

    }

    $response = new WP_REST_Response($result);
    $response->set_status(200);

    return $response;
}

add_action('rest_api_init', function () {
    register_rest_route('my_theme/v3', 'edit_product/(?P<id>\d+)', array(
        'methods' => 'PUT',
        'callback' => 'add_product'
    ));
});
add_action('rest_api_init', function () {
    register_rest_route('my_theme/v3', 'add_product/', array(
        'methods' => 'POST',
        'callback' => 'add_product'
    ));
});
function add_product($request)
{
    var_dump($request['title']);
    var_dump($_SERVER['REQUEST_METHOD']);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $my_post = array(
            'post_title'    => wp_strip_all_tags( $request['title'] ),
            'post_author'   => 1,
            'post_status'  => 'publish',
        );

        wp_insert_post( $my_post );
    }
    else {
//        $wpdb->update(
//            $table,
//            array('count' => $count),
//            array('post_id' => $postID),
//            array('%d'),
//            array('%d'));
    }

//    if ($)
    $result = $wpdb->get_results("SELECT * FROM $table WHERE post_id = $request->ID");
    foreach ($result as $c) {
        $count = $c->count;
    }
    var_dump($count);
    /*if (!isset($count)) {
        $count = 1;
        $wpdb->insert($table,
            array('post_id' => $postID, 'count' => $count),
            array('%d', '%d')
        );
    } else {
        $count = $count + 1;
        $wpdb->update(
            $table,
            array('count' => $count),
            array('post_id' => $postID),
            array('%d'),
            array('%d'));
    }*/
//    var_dump($count);
}