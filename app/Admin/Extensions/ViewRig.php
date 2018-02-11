<?php
/**
 * Created by PhpStorm.
 * User: ivancherniy
 * Date: 10.02.2018
 * Time: 11:29
 */

namespace App\Admin\Extensions;

use Encore\Admin\Admin;

class ViewRig
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    protected function script()
    {
        return <<<SCRIPT
jQuery('.grid-eye-row').on('click', function() {
    location = '/admin/rig/view/' + jQuery(this).data('id');
});
SCRIPT;

    }

    protected function render()
    {
        Admin::script($this->script());

        return '<a class="fa fa-eye grid-eye-row" data-id="' . $this->id . '" href="javascript:void(0)"></a>';
    }

    public function __toString()
    {
        return $this->render();
    }
}