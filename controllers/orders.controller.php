<?php

class OrdersController extends Controller
{
    public function __construct(array $data = array())
    {
        parent::__construct($data);
        $this->model = new Order();
    }

    public function index()
    {
        $this->params = App::getRouter()->getParams();

        return $this->data['requests'] = $this->model->getRequests();

    }
}