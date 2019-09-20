<?php

namespace App\Admin\Controllers;

use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\AdminController;
//use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RestaurantController extends AdminController
{
    //use HasResourceActions;
    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */


    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Restaurant';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Restaurant);
        $grid->id('ID');
        $grid->rName('餐厅名称');
        $grid->rAddress('地址');
        $grid->rManager('餐厅经理');
        $grid->rContact('联系电话');
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Restaurant::findOrFail($id));


        if (!empty($show)){return $show;}
        else{
            echo "No Data";
        }

    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Restaurant);
        $form->text('rName','餐厅名称');
        $form->text('rAddress','地址');
        $form->text('rManager','餐厅经理');
        $form->text('rContact','联系电话');


        return $form;
    }
}
