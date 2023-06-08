<?php 
require_once 'classes/seller-model.php';
require_once 'views/seller-view.php';

class SellerController {
    private $model = null;
    private $view = null;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function index() {
        if(isset($_GET['action'])) {
            $sellerId = filter_var((int)$_GET['action'], FILTER_SANITIZE_NUMBER_INT);
            if($sellerId == "seller-id") {
                $this->model->getSellerById();
                $this->view->renderSellerInfo($sellerId);
            }
            if(isset($_GET["action"])) {
                $action = filter_var($_GET["action"], FILTER_SANITIZE_SPECIAL_CHARS);
                if($action == "delete") {
                    $this->model->deleteSeller($sellerId);
                    $this->view->renderDeleteMessage();
            } elseif($action == "update") {
                $this->view->renderEditSellerForm($this->model->getSellerById($sellerId));
                }
             } elseif(isset($_GET['create-seller'])) {
                if($_GET['create-seller'] =="new") {
                    $this->view->renderCreateSellerForm();
                }
             }
        }
    }
}
