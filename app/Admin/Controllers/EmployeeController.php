<?php

namespace App\Admin\Controllers;

use App\Models\Employee;
use App\Models\Restaurant;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EmployeeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Employee';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Employee);

        $grid->column('id', __('Id'));
        $grid->column('eName', __('姓名'));
        $grid->column('eTitle', __('职务'));
        //$grid->column('belongToID', __('门店ID'));
        $grid->column('belongToID', '所属门店')->display(function ($restaurant_id){
            $rName = Restaurant::find($restaurant_id);
            return $rName['rName'];
        });
        //通过门店ID关联到门店信息表，不在员工表中维护门店名称信息
        //$grid->column('belongToName', __('门店名称'));
        $grid->column('eContact', __('联系方式'));
        $grid->column('eOrder', __('允许下单'));
        $grid->column('active', __('有效账号'));
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
        $show = new Show(Employee::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('eName', __('EName'));
        $show->field('eTitle', __('ETitle'));
        $show->field('belongToID', __('BelongToID'));
        $show->field('belongToName', __('BelongToName'));
        $show->field('eContact', __('EContact'));
        $show->field('eOrder', __('EOrder'));
        $show->field('active', __('Active'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Employee);

        $form->text('eName', __('姓名'));
        $form->text('eTitle', __('职务'));
        //$form->number('belongToID', __('门店ID'));
        //$form->text('belongToName', __('门店名称'));
        $form->text('eContact', __('联系方式'));
        $form->switch('eOrder', __('允许下单'))->default(1);
        $form->switch('active', __('有效账号'))->default(1);
        //获取门店列表
        $restaurants = Restaurant::all();
        $restaurant_options = [];
        foreach ($restaurants as $restaurant)
        {
            $restaurant_options[$restaurant->id] = $restaurant->rName;
        }

        $form->select('belongToID','所属门店')->options($restaurant_options);

        return $form;
    }
}
