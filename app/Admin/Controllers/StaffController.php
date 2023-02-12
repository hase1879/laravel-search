<?php

namespace App\Admin\Controllers;

use App\Models\Staff;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StaffController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Staff';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Staff());

        $grid->column('id', __('Id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('user_id', __('User id'));
        $grid->column('shozoku', __('Shozoku'));
        $grid->column('nyushanenngappi', __('Nyushanenngappi'));
        $grid->column('yakushoku', __('Yakushoku'));
        $grid->column('koyoukeitai', __('Koyoukeitai'));

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
        $show = new Show(Staff::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('user_id', __('User id'));
        $show->field('shozoku', __('Shozoku'));
        $show->field('nyushanenngappi', __('Nyushanenngappi'));
        $show->field('yakushoku', __('Yakushoku'));
        $show->field('koyoukeitai', __('Koyoukeitai'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Staff());

        $form->number('user_id', __('User id'));
        $form->text('shozoku', __('Shozoku'));
        $form->date('nyushanenngappi', __('Nyushanenngappi'))->default(date('Y-m-d'));
        $form->text('yakushoku', __('Yakushoku'));
        $form->text('koyoukeitai', __('Koyoukeitai'));

        return $form;
    }
}
