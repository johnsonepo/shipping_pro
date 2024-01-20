<?php
class Shippo_Meta_Boxes {
    private static $instance;
    public $shipment;

    public static function init() {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    private function __construct() {
        add_action('add_meta_boxes_shippo_shipment', array($this, 'add_custom_meta_boxes'));
        add_action('save_post_shippo_shipment', array($this, 'save_custom_meta_data'));
        add_filter('enter_title_here', array($this, 'change_title_placeholder'));

        add_action('admin_head', array($this, 'remove_content_editor'));
        add_action('admin_enqueue_scripts', array($this, 'shippo_enqueue_styles'));
        add_filter('wp_insert_post_data', array($this, 'unique_tracking_number'), 10, 2);

        add_filter('manage_edit-shippo_shipment_columns', array($this, 'table_columns'));
        add_action('manage_shippo_shipment_posts_custom_column', array($this, 'render_ctable_columns'), 10, 2);
        add_filter('manage_edit-shippo_shipment_sortable_columns', array($this, 'sortable_columns'));
        add_action('pre_get_posts', array($this, 'custom_orderby'));

        add_shortcode('shippo_tracking', array($this, 'shippo_tracking_shortcode'));
        add_action('init', array($this, 'process_tracking_form'));

    }
    function shippo_enqueue_styles() {
        wp_enqueue_style('shippo-styles', plugin_dir_url(__FILE__) . '../assets/css/style.css');
    }
    public function table_columns($columns) {
        $new_columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __('Tracking ID', 'shippo-x'),
            'sender_name' => __('Sender Name', 'shippo-x'),
            'receiver_name' => __('Receiver Name', 'shippo-x'),
            'sender_location' => __('Sender Location', 'shippo-x'),
            'receiver_location' => __('Receiver Location', 'shippo-x'),
            'status' => __('Status', 'shippo-x'),
            'date' => __('Date', 'shippo-x'),
        );

        return $new_columns;
    }
    public function shippo_tracking_shortcode() {
        ob_start();
        include(plugin_dir_path(__FILE__) . '../includes/shippo-tracking-form.php');
        return ob_get_clean();
    }

    public function process_tracking_form() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['tracking_number'])) {
            $shipping_id = sanitize_text_field($_GET['tracking_number']);
    
            $tracking_post = get_page_by_title($shipping_id, OBJECT, 'shippo_shipment');
    
            if ($tracking_post && $tracking_post->post_type === 'shippo_shipment') {
                $meta_fields = get_post_meta($tracking_post->ID);
    
                $tracking_data = new stdClass();
    
                foreach ($meta_fields as $meta_key => $meta_value) {
                    $property_name = $this->convert_to_snake_case($meta_key);
                    $tracking_data->$property_name = is_array($meta_value) ? esc_html($meta_value[0]) : esc_html($meta_value);
                }
                $tracking_data->_id = $shipping_id;
                $this->shipment = $tracking_data;

            } else {
                echo '<p>Error: Tracking information not found.</p>';
            }
        }
    }
    private function convert_to_snake_case($input) {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
    }
    
    public function render_ctable_columns($column, $post_id) {
        switch ($column) {
            case 'title':
                echo esc_html(get_the_title($post_id));
                break;

            case 'sender_name':
                echo esc_html(get_post_meta($post_id, '_sender_name', true));
                break;

            case 'receiver_name':
                echo esc_html(get_post_meta($post_id, '_receiver_name', true));
                break;

            case 'sender_location':
                echo esc_html(get_post_meta($post_id, '_sender_city', true) . ', ' . get_post_meta($post_id, '_sender_state', true));
                break;

            case 'receiver_location':
                echo esc_html(get_post_meta($post_id, '_receiver_city', true) . ', ' . get_post_meta($post_id, '_receiver_state', true));
                break;

            case 'status':
                echo esc_html(get_post_meta($post_id, '_status', true));
                break;

            default:
                break;
        }
    }

    public function sortable_columns($columns) {
        $columns['title'] = 'title';
        $columns['status'] = 'status';
        return $columns;
    }

    public function custom_orderby($query) {
        if (!is_admin() || !$query->is_main_query()) {
            return;
        }

        $orderby = $query->get('orderby');

        if ('status' == $orderby) {
            $query->set('meta_key', '_status');
            $query->set('orderby', 'meta_value');
        }
    }

    public function add_custom_meta_boxes() {
        add_meta_box(
            'shippo_sender_info',
            __('Sender Information', 'shippo-x'),
            array($this, 'render_sender_info_meta_box'),
            'shippo_shipment',
            'normal',
            'high'
        );

        add_meta_box(
            'shippo_receiver_info',
            __('Receiver Information', 'shippo-x'),
            array($this, 'render_receiver_info_meta_box'),
            'shippo_shipment',
            'normal',
            'high'
        );

        add_meta_box(
            'shippo_package_details',
            __('Package Details', 'shippo-x'),
            array($this, 'render_package_details_meta_box'),
            'shippo_shipment',
            'normal',
            'high'
        );
    }

    public function render_sender_info_meta_box($post) {
        $sender_name = get_post_meta($post->ID, '_sender_name', true);
        $sender_email = get_post_meta($post->ID, '_sender_email', true);
        $sender_phone = get_post_meta($post->ID, '_sender_phone', true);
        $sender_state = get_post_meta($post->ID, '_sender_state', true);
        $sender_city = get_post_meta($post->ID, '_sender_city', true);

        ?>
        <label for="shippo_sender_name"><?php _e('Sender Name', 'shippo-x'); ?></label>
        <input type="text" id="shippo_sender_name" name="shippo_sender_name" value="<?php echo esc_attr($sender_name); ?>"><br>

        <label for="shippo_sender_email"><?php _e('Sender Email', 'shippo-x'); ?></label>
        <input type="text" id="shippo_sender_email" name="shippo_sender_email" value="<?php echo esc_attr($sender_email); ?>"><br>

        <label for="shippo_sender_phone"><?php _e('Sender Phone', 'shippo-x'); ?></label>
        <input type="text" id="shippo_sender_phone" name="shippo_sender_phone" value="<?php echo esc_attr($sender_phone); ?>"><br>

        <label for="shippo_sender_state"><?php _e('Sender State', 'shippo-x'); ?></label>
        <input type="text" id="shippo_sender_state" name="shippo_sender_state" value="<?php echo esc_attr($sender_state); ?>"><br>

        <label for="shippo_sender_city"><?php _e('Sender City', 'shippo-x'); ?></label>
        <input type="text" id="shippo_sender_city" name="shippo_sender_city" value="<?php echo esc_attr($sender_city); ?>"><br>
        <?php
    }

    public function render_receiver_info_meta_box($post) {
        $receiver_name = get_post_meta($post->ID, '_receiver_name', true);
        $receiver_email = get_post_meta($post->ID, '_receiver_email', true);
        $receiver_phone = get_post_meta($post->ID, '_receiver_phone', true);
        $receiver_state = get_post_meta($post->ID, '_receiver_state', true);
        $receiver_city = get_post_meta($post->ID, '_receiver_city', true);

        ?>
        <label for="shippo_receiver_name"><?php _e('Receiver Name', 'shippo-x'); ?></label>
        <input type="text" id="shippo_receiver_name" name="shippo_receiver_name" value="<?php echo esc_attr($receiver_name); ?>"><br>

        <label for="shippo_receiver_email"><?php _e('Receiver Email', 'shippo-x'); ?></label>
        <input type="text" id="shippo_receiver_email" name="shippo_receiver_email" value="<?php echo esc_attr($receiver_email); ?>"><br>

        <label for="shippo_receiver_phone"><?php _e('Receiver Phone', 'shippo-x'); ?></label>
        <input type="text" id="shippo_receiver_phone" name="shippo_receiver_phone" value="<?php echo esc_attr($receiver_phone); ?>"><br>

        <label for="shippo_receiver_state"><?php _e('Receiver State', 'shippo-x'); ?></label>
        <input type="text" id="shippo_receiver_state" name="shippo_receiver_state" value="<?php echo esc_attr($receiver_state); ?>"><br>

        <label for="shippo_receiver_city"><?php _e('Receiver City', 'shippo-x'); ?></label>
        <input type="text" id="shippo_receiver_city" name="shippo_receiver_city" value="<?php echo esc_attr($receiver_city); ?>"><br>
        <?php
    }

    public function render_package_details_meta_box($post) {
        $package_weight = get_post_meta($post->ID, '_package_weight', true);
        $original_destination = get_post_meta($post->ID, '_original_destination', true);
        $final_destination = get_post_meta($post->ID, '_final_destination', true);
        $current_location = get_post_meta($post->ID, '_current_location', true);
        $status = get_post_meta($post->ID, '_status', true);
        $sending_date = get_post_meta($post->ID, '_sending_date', true);
        $expected_delivery_date = get_post_meta($post->ID, '_expected_delivery_date', true);

        ?>
        <label for="shippo_package_weight"><?php _e('Package Weight', 'shippo-x'); ?></label>
        <input type="text" id="shippo_package_weight" name="shippo_package_weight" value="<?php echo esc_attr($package_weight); ?>"><br>

        <label for="shippo_original_destination"><?php _e('Original Destination', 'shippo-x'); ?></label>
        <input type="text" id="shippo_original_destination" name="shippo_original_destination" value="<?php echo esc_attr($original_destination); ?>"><br>

        <label for="shippo_final_destination"><?php _e('Final Destination', 'shippo-x'); ?></label>
        <input type="text" id="shippo_final_destination" name="shippo_final_destination" value="<?php echo esc_attr($final_destination); ?>"><br>

        <label for="shippo_current_location"><?php _e('Current Location', 'shippo-x'); ?></label>
        <input type="text" id="shippo_current_location" name="shippo_current_location" value="<?php echo esc_attr($current_location); ?>"><br>

        <label for="shippo_status"><?php _e('Status', 'shippo-x'); ?></label>
        <input type="text" id="shippo_status" name="shippo_status" value="<?php echo esc_attr($status); ?>"><br>

        <label for="shippo_sending_date"><?php _e('Sending Date', 'shippo-x'); ?></label>
        <input type="datetime-local" id="shippo_sending_date" name="shippo_sending_date" value="<?php echo esc_attr($sending_date); ?>"><br>

        <label for="shippo_expected_delivery_date"><?php _e('Expected Delivery Date', 'shippo-x'); ?></label>
        <input type="datetime-local" id="shippo_expected_delivery_date" name="shippo_expected_delivery_date" value="<?php echo esc_attr($expected_delivery_date); ?>"><br>
        <?php
    }

    public function save_custom_meta_data($post_id) {
        // Sender Information
        if (isset($_POST['shippo_sender_name'])) {
            update_post_meta($post_id, '_sender_name', sanitize_text_field($_POST['shippo_sender_name']));
        }
    
        if (isset($_POST['shippo_sender_email'])) {
            update_post_meta($post_id, '_sender_email', sanitize_text_field($_POST['shippo_sender_email']));
        }
    
        if (isset($_POST['shippo_sender_phone'])) {
            update_post_meta($post_id, '_sender_phone', sanitize_text_field($_POST['shippo_sender_phone']));
        }
    
        if (isset($_POST['shippo_sender_state'])) {
            update_post_meta($post_id, '_sender_state', sanitize_text_field($_POST['shippo_sender_state']));
        }
    
        if (isset($_POST['shippo_sender_city'])) {
            update_post_meta($post_id, '_sender_city', sanitize_text_field($_POST['shippo_sender_city']));
        }
    
        // Receiver Information
        if (isset($_POST['shippo_receiver_name'])) {
            update_post_meta($post_id, '_receiver_name', sanitize_text_field($_POST['shippo_receiver_name']));
        }
    
        if (isset($_POST['shippo_receiver_email'])) {
            update_post_meta($post_id, '_receiver_email', sanitize_text_field($_POST['shippo_receiver_email']));
        }
    
        if (isset($_POST['shippo_receiver_phone'])) {
            update_post_meta($post_id, '_receiver_phone', sanitize_text_field($_POST['shippo_receiver_phone']));
        }
    
        if (isset($_POST['shippo_receiver_state'])) {
            update_post_meta($post_id, '_receiver_state', sanitize_text_field($_POST['shippo_receiver_state']));
        }
    
        if (isset($_POST['shippo_receiver_city'])) {
            update_post_meta($post_id, '_receiver_city', sanitize_text_field($_POST['shippo_receiver_city']));
        }
    
        // Package Information
        if (isset($_POST['shippo_package_weight'])) {
            update_post_meta($post_id, '_package_weight', sanitize_text_field($_POST['shippo_package_weight']));
        }
    
        if (isset($_POST['shippo_original_destination'])) {
            update_post_meta($post_id, '_original_destination', sanitize_text_field($_POST['shippo_original_destination']));
        }
    
        if (isset($_POST['shippo_final_destination'])) {
            update_post_meta($post_id, '_final_destination', sanitize_text_field($_POST['shippo_final_destination']));
        }
    
        if (isset($_POST['shippo_current_location'])) {
            update_post_meta($post_id, '_current_location', sanitize_text_field($_POST['shippo_current_location']));
        }
    
        // Other Information
        if (isset($_POST['shippo_status'])) {
            update_post_meta($post_id, '_status', sanitize_text_field($_POST['shippo_status']));
        }
    
        if (isset($_POST['shippo_sending_date'])) {
            update_post_meta($post_id, '_sending_date', sanitize_text_field($_POST['shippo_sending_date']));
        }
    
        if (isset($_POST['shippo_expected_delivery_date'])) {
            update_post_meta($post_id, '_expected_delivery_date', sanitize_text_field($_POST['shippo_expected_delivery_date']));
        }
    }    

    public function remove_content_editor() {
        remove_post_type_support('shippo_shipment', 'editor');
    }

    public function unique_tracking_number($data, $postarr) {
        if ($data['post_type'] == 'shippo_shipment' && isset($_POST['post_title'])) {
            $tracking_number = sanitize_title($_POST['post_title']);
            $existing_post = get_page_by_title($tracking_number, OBJECT, 'shippo_shipment');
            
            if ($existing_post && $existing_post->ID != $postarr['ID']) {
                $suffix = 1;
                $new_title = $tracking_number . '-' . $suffix;
                
                while (get_page_by_title($new_title, OBJECT, 'shippo_shipment')) {
                    $suffix++;
                    $new_title = $tracking_number . '-' . $suffix;
                }
                
                $data['post_title'] = $new_title;
            }
        }
        return $data;
    }

    public function change_title_placeholder($title_placeholder) {
        $screen = get_current_screen();
        if ($screen->post_type == 'shippo_shipment') {
            $title_placeholder = __('Enter Tracking Number', 'shippo-x');
        }
        return $title_placeholder;
    }
}

Shippo_Meta_Boxes::init();

