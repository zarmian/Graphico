<?php

namespace App\Admin\Controllers;

use App\Bid;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BidController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Bid';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Bid);

        $grid->column('id', __('Id'));
        $grid->column('u_id', __('U id'));
        $grid->column('p_id', __('P id'));
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
        $show = new Show(Bid::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('u_id', __('U id'));
        $show->field('p_id', __('P id'));
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
        $form = new Form(new Bid);

        $form->number('u_id', __('U id'));
        $form->number('p_id', __('P id'));

        return $form;
    }
}
