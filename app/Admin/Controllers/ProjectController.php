<?php

namespace App\Admin\Controllers;

use App\Project;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProjectController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Project';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Project);

        $grid->column('id', __('Id'));
        $grid->column('u_id', __('U id'));
        $grid->column('p_title', __('P title'));
        $grid->column('p_description', __('P description'));
        $grid->column('budget', __('Budget'));
        $grid->column('status', __('Status'));
        $grid->column('no_bids', __('No bids'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('file', __('File'));
        $grid->column('finalfile', __('Finalfile'));

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
        $show = new Show(Project::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('u_id', __('U id'));
        $show->field('p_title', __('P title'));
        $show->field('p_description', __('P description'));
        $show->field('budget', __('Budget'));
        $show->field('status', __('Status'));
        $show->field('no_bids', __('No bids'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('file', __('File'));
        $show->field('finalfile', __('Finalfile'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Project);

        $form->number('u_id', __('U id'));
        $form->textarea('p_title', __('P title'));
        $form->textarea('p_description', __('P description'));
        $form->number('budget', __('Budget'));
        $form->text('status', __('Status'));
        $form->number('no_bids', __('No bids'));
        $form->textarea('file', __('File'));
        $form->textarea('finalfile', __('Finalfile'));

        return $form;
    }
}
