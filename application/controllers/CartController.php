<?php

class CartController
{
    public function actionAdd($id)
    {
        //доб.товар в корзину
        Cart::addProduct($id);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    public function actionAddAjax($id)
    {
        //доб.товар в корз
    echo Cart::addProduct($id);
    return true;
    }
    public function actionIndex()
    {
        $category = array();
        $categories = Category::getCategoriesList();

        $productsInCart = Cart::getProducts();


        if ($productsInCart) {

            $productsIds = array_keys($productsInCart);
            $products = Product::getProdustsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once(ROOT . '/application/views/cart/index.php');
        return true;
    }
    public function actionDelete($id)
    {

//        //header('Location: /cart');
//        echo Cart::deleteProduct($id);
//        return true;
        Cart::deleteProduct($id);
        header("Location: /cart");
    }

    public function actionCheckout()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $result = false;

        if (isset($_POST['submit'])) {

            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];

            $errors = false;
            if (!User::checkName($userName))
                $errors[] = 'Неправильное имя';
            if (!User::checkPhone($userPhone))
                $errors[] = 'Неправильный телефон';

            if ($errors == false) {

                $productsInCart = Cart::getProducts();
                if (User::isGuest()) {
                    $userId = null;
                } else {
                    $userId = User::checkLogged();
                }
                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);

                if ($result) {
                    $adminEmail = 'mari.zolotaya.96@ukr.net';
                    $message = "Новый заказ";
                    $subject = 'Тема письма';
                    $result = mail($adminEmail, $subject, $message);
                    $result = true;
                    Cart::clear();
                }
            } else {
                $productsInCart = Cart::getProducts();
                $productsIds = array_keys($productsInCart);
                $products = Product::getProdustsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();
            }
        } else {
            $productsInCart = Cart::getProducts();
            if ($productsInCart == false) {

                header("Location: /");
            } else {
                $productsIds = array_keys($productsInCart);
                $products = Product::getProdustsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $userName = false;
                $userPhone = false;
                $userComment = false;

                if (User::isGuest()) {

                } else {

                    $userId = User::checkLogged();
                    $user = User::getUserById($userId);
                    $userName = $user['name'];
                }

            }
        }
        require_once(ROOT . '/application/views/cart/checkout.php');
        return true;
    }
}
