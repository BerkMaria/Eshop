<?php
include_once ROOT . '/application/models/Category.php';
include_once ROOT . '/application/models/Product.php';


class ProductController
{
    public function actionView($productId)
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        $product = Product::getProductById($productId);
        require_once(ROOT . '/application/views/product/view.php');
        return true;
    }

}