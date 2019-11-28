<?php

namespace App\Admin\Controllers;

use App\Competition;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CompetitionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Competition';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Competition);

        $grid->column('id', __('Id'));
        $grid->column('p_id', __('P id'));
        $grid->column('c_description', __('C description'));
        $grid->column('date', __('Date'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('file', __('File'));

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
        $show = new Show(Competition::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('p_id', __('P id'));
        $show->field('c_description', __('C description'));
        $show->field('date', __('Date'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('file', __('File'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Competition);

        $form->number('p_id', __('P id'));
        $form->textarea('c_description', __('C description'));
        $form->date('date', __('Date'))->default(date('Y-m-d'));
        $form->textarea('file', __('File'));

        return $form;
    }
}
