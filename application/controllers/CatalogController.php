<?php

////include_once ROOT . '/application/models/Category.php';
//include_once ROOT . '/application/models/Product.php';
//include_once ROOT . '/application/components/Pagination.php';

class CatalogController /** catalog
 */
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(16);


        require_once(ROOT . '/application/views/catalog/index.php');
        return true;
    }
    public function actionCategory($categoryId, $page = 1)
    {
//        +echo 'Category: '.$categoryId;
//        +echo '<br>Page: '. $page;
        /**https://game.loc/category/1
         *
         */
        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductssListByCategory($categoryId, $page);

        $total = Product::getTotalProductsInCategory($categoryId);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        require_once(ROOT . '/application/views/catalog/category.php');
        return true;
    }
}