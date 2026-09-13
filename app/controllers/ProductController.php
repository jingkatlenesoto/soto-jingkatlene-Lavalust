<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('ProductModel');
    }

    public function before_action()
    {
        if (!$this->session->userdata('authenticated')) {
            $this->response->redirect(site_url('login'));
        }
    }

    public function index()
    {
        $data = [
            'products' => $this->ProductModel->get_all_products(),
            'username' => $this->session->userdata('username'),
            'success'  => $this->session->flashdata('success'),
            'error'    => $this->session->flashdata('error')
        ];

        $this->call->view('products/index', $data);
    }

    public function create()
    {
        $this->call->view('products/create');
    }

    public function store()
    {
        $productName = trim($this->request->post('product_name'));
        $description = trim($this->request->post('description'));
        $price = $this->request->post('price');
        $quantity = $this->request->post('quantity');

        if (
            $productName === '' ||
            !is_numeric($price) ||
            !is_numeric($quantity) ||
            $price < 0 ||
            $quantity < 0
        ) {
            $this->session->set_flashdata(
                'error',
                'Please provide valid product information.'
            );

            $this->response->redirect(site_url('products/create'));
        }

        $this->ProductModel->create_product([
            'product_name' => $productName,
            'description'  => $description,
            'price'        => number_format((float) $price, 2, '.', ''),
            'quantity'     => (int) $quantity
        ]);

        $this->session->set_flashdata(
            'success',
            'Product added successfully.'
        );

        $this->response->redirect(site_url('products'));
    }

    public function edit($id)
    {
        $product = $this->ProductModel->get_product($id);

        if (!$product) {
            $this->session->set_flashdata('error', 'Product not found.');
            $this->response->redirect(site_url('products'));
        }

        $this->call->view('products/edit', [
            'product' => $product
        ]);
    }

    public function update($id)
    {
        $product = $this->ProductModel->get_product($id);

        if (!$product) {
            $this->session->set_flashdata('error', 'Product not found.');
            $this->response->redirect(site_url('products'));
        }

        $productName = trim($this->request->post('product_name'));
        $description = trim($this->request->post('description'));
        $price = $this->request->post('price');
        $quantity = $this->request->post('quantity');

        if (
            $productName === '' ||
            !is_numeric($price) ||
            !is_numeric($quantity) ||
            $price < 0 ||
            $quantity < 0
        ) {
            $this->session->set_flashdata(
                'error',
                'Please provide valid product information.'
            );

            $this->response->redirect(
                site_url('products/edit/' . $id)
            );
        }

        $this->ProductModel->update_product($id, [
            'product_name' => $productName,
            'description'  => $description,
            'price'        => number_format((float) $price, 2, '.', ''),
            'quantity'     => (int) $quantity
        ]);

        $this->session->set_flashdata(
            'success',
            'Product updated successfully.'
        );

        $this->response->redirect(site_url('products'));
    }

    public function delete($id)
    {
        $product = $this->ProductModel->get_product($id);

        if (!$product) {
            $this->session->set_flashdata('error', 'Product not found.');
            $this->response->redirect(site_url('products'));
        }

        $this->ProductModel->delete_product($id);

        $this->session->set_flashdata(
            'success',
            'Product deleted successfully.'
        );

        $this->response->redirect(site_url('products'));
    }
}