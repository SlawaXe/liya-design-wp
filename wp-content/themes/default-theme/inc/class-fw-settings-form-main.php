<?php if (!defined('FW')) die('Forbidden');

class FW_Settings_Form_Main extends FW_Settings_Form {
    public function get_values() {
        return get_option('main_fw_settings_form', array());
    }

    public function set_values($values) {
        update_option('main_fw_settings_form', $values, false);
    }

    public function get_options() {
        return array(
            'site_favicon' => array(
                'type'        => 'upload',
                'label'       => 'Иконка сайта',
                'images_only' => true,
            ),
            'site_logo' => array(
                'type'        => 'upload',
                'label'       => 'Логотип',
                'images_only' => true,
            ),
            'site_phone' => array(
                'type'  => 'text',
                'label' => 'Телефон',
            ),
        );
    }

    protected function _init() {
        add_action('admin_menu', array($this, '_action_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, '_action_admin_enqueue_scripts'));

        $this->set_is_side_tabs(true);
        $this->set_is_ajax_submit(true);
    }

    /**
     * @internal
     */
    public function _action_admin_menu() {
        add_menu_page(
            'Общие настройки темы',
            'Настройки темы',
            'manage_options',
            /** used in @see _action_admin_enqueue_scripts() */
            'test-fw-settings-form',
            array($this, 'render'),
            '',
            2
        );
    }

    /**
     * @internal
     */
    public function _action_admin_enqueue_scripts() {
        $current_screen = get_current_screen(); // fw_print($current_screen);

        // enqueue only on settings page
        if ('toplevel_page_'. 'test-fw-settings-form' === $current_screen->base) {
            $this->enqueue_static();
        }
    }
}