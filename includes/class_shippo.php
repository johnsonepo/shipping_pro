<?php
class Shippo {

    private static $instance;

    public static function run() {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    private function __construct() {
        add_action('init', array($this, 'create_shipment_post_type'));
        add_action('admin_menu', array($this, 'add_actions'));
        add_filter('wp_insert_post_data', array($this, 'set_post_type_on_save'), 10, 2);
        add_filter('gettext', array($this, 'modify_add_new_post_text'));

        Shippo_Meta_Boxes::init();
    }

    public function create_shipment_post_type() {
        $args = array(
            'labels' => array(
                'name'          => __('Shipments', 'shippo-x'),
                'singular_name' => __('Shipment', 'shippo-x'),
                'add_new'       => __('Add New Shipment', 'shippo-x'),
            ),
            'public'             => true,
            'publicly_queryable' => false, 
            'has_archive'        => true,
            'menu_icon'          => 'dashicons-airplane',
            'supports'           => array('title', 'editor'),
        );

        register_post_type('shippo_shipment', $args);
    }

    public function add_actions() {
        add_action('admin_menu', array($this, 'add_new_shipment_sub_menu'));
        add_action('admin_menu', array($this, 'customize_shipmet_title'));
    }

    public function add_new_shipment_sub_menu() {
        add_submenu_page(
            'edit.php?post_type=shippo_shipment',
            __('Add new shipment', 'shippo-x'),
            __('Add new shipment', 'shippo-x'),
            'manage_options',
            'post-new.php?post_type=shippo_shipment'
        );
    }

    public function customize_shipmet_title() {
        global $submenu;
        $submenu['edit.php?post_type=shippo_shipment'][10][0] = __('Add New Shipment', 'shippo-x');
        remove_submenu_page('edit.php?post_type=shippo_shipment', 'post-new.php?post_type=shippo_shipment');
    }

    public function set_post_type_on_save($data, $postarr) {
        if ($data['post_type'] === 'post' && isset($postarr['shippo_shipment'])) {
            $data['post_type'] = 'shippo_shipment';
        }
        return $data;
    }

    public function modify_add_new_post_text($translated_text) {
        if ($translated_text == 'Add New Post') {
            return __('Add New Shipment', 'shippo-x');
        }
        return $translated_text;
    }
}
