<?php

namespace OurivesWeb\Activators;

class Admin
{
    public $parent;

    public function __construct($parent)
    {
        $this->parent = $parent;
        add_action('admin_menu', [$this, 'OurivesWeb_admin_menu'], 56.6);
        add_action('admin_bar_menu', [$this, 'add_toolbar_items'], 100);

    }


    public function OurivesWeb_admin_menu()
    {
        $permission = apply_filters('plugin_admin_menu_permission', 'manage_woocommerce');
        if (current_user_can($permission)) {
            $logoDir = OURIVES_IMAGES_URL . 'Mini_logo.png';
            add_menu_page(__('ourives web', 'ourives web'), __('ourives web', 'ourives web'), $permission, 'OurivesWeb', [$this->parent, 'run'], $logoDir, 56.6);
        }
    }

    public function add_toolbar_items($admin_bar)
    {
        $permission = apply_filters('plugin_admin_menu_permission', 'manage_woocommerce');
        if (current_user_can($permission)) {

            $admin_bar->add_menu(array(
                'id' => 'ourives_web',
                'title' => 'ourives web',
                'href' => admin_url('admin.php?page=OurivesWeb'),
                'meta' => array(
                    'title' => __('Pagina Inicial'),
                    'target' => '_blank'
                ),
            ));
            $admin_bar->add_menu(array(
                'id' => 'ourives_web_sub',
                'parent' => 'ourives_web',
                'title' => 'Configurações',
                'href' => admin_url('admin.php?page=OurivesWeb&tab=settings'),
                'meta' => array(
                    'target' => '_blank',
                    'class' => 'my_menu_item_class'
                ),
            ));
            $admin_bar->add_menu(array(
                'id' => 'ourives_web_2sub',
                'parent' => 'ourives_web',
                'title' => 'Relatorios',
                'href' => admin_url('admin.php?page=OurivesWeb&tab=report'),
                'meta' => array(
                    'target' => '_blank',
                    'class' => 'my_menu_item_class'
                ),
            ));
        }
    }

}
