<?php

class ProductsController extends Controller
{
    public function __construct(array $data = array())
    {
        parent::__construct($data);
        $this->model = new Product();
    }

    public function index()
    {
        return $this->data['offers'] = $this->model->getOffers();
    }

    public function view()
    {
        $this->params = App::getRouter()->getParams();

        return $this->data['requests'] = $this->model->getRequests();

    }
}