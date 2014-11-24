<?php

class AdminOrdersController extends AdminController {


    /**
    * User Model
    * @var User
    */
    protected $order;

    public function __construct(Order $order)
    {
        parent::__construct();
        $this->order = $order;
    }

    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function getIndex()
    {
        // Title
        $title = 'Transactions';

        // Grab all the users
        $orders = $this->order->all();

        // Show the page
        return View::make('admin/orders/index', compact('orders', 'title'));
    }

}