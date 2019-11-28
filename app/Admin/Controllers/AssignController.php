<?php

namespace App\Admin\Controllers;

use App\Assign;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AssignController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Assign';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Assign);

        $grid->column('u_id', __('U id'));
        $grid->column('p_id', __('P id'));
        $grid->column('deadline', __('Deadline'));
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
        $show = new Show(Assign::findOrFail($id));

        $show->field('u_id', __('U id'));
        $show->field('p_id', __('P id'));
        $show->field('deadline', __('Deadline'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Assign);

        $form->number('u_id', __('U id'));
        $form->number('p_id', __('P id'));
        $form->date('deadline', __('Deadline'))->default(date('Y-m-d'));

        return $form;
    }
}
