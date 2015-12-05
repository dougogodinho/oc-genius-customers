<?php namespace Genius\Customers\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Flash;
use Genius\Customers\Models\Customer;
use Lang;

/**
 * Customers Back-end Controller
 */
class Customers extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Genius.Base', 'models');
    }

    /**
     * Deleted checked customers.
     */
    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $customerId) {
                if (!$customer = Customer::find($customerId)) continue;
                $customer->delete();
            }

            Flash::success(Lang::get('genius.customers::lang.customers.delete_selected_success'));
        }
        else {
            Flash::error(Lang::get('genius.customers::lang.customers.delete_selected_empty'));
        }

        return $this->listRefresh();
    }
}