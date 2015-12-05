<?php namespace Genius\Customers;

use Backend\Facades\Backend;
use Illuminate\Support\Facades\Event;
use System\Classes\PluginBase;

/**
 * Customers Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'genius.customers::lang.plugin.name',
            'description' => 'genius.customers::lang.plugin.description',
            'author'      => 'Genius',
            'icon'        => 'icon-leaf'
        ];
    }

    public function boot()
    {

        Event::listen('backend.menu.extendItems', function($manager) {
            $manager->addSideMenuItems('Genius.Base', 'models', [
                'customers' => [
                    'label' => 'genius.customers::lang.customers.menu_label',
                    'icon' => 'icon-coffee',
                    'url' => Backend::url('genius/customers/customers'),
                    'order' => 20,
                ],
            ]);
        });
    }
}
