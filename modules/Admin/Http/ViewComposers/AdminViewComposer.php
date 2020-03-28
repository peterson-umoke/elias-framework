<?php


namespace Modules\Admin\Http\ViewComposers;


use Illuminate\View\View;
use Modules\Admin\Entities\Admin;
use Modules\Core\Menu\Menu;

class AdminViewComposer
{
    /**
     * @var Admin
     */
    private $admin;

    public function __construct(Menu $admin)
    {
        $this->admin = $admin;
    }

    public function compose(View $view)
    {
        $view->with('admin', $this->admin);
    }
}
