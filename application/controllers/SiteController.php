<?php

include_once ROOT . '/application/models/Category.php';
include_once ROOT . '/application/models/Product.php';

class SiteController
{
    /** page Home
     * @return bool
     */
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(3);

        $sliderProducts = Product::getRecommendedProducts();


        require_once(ROOT .'/application/views/site/index.php' );
        return true;
    }
    public function actionContact()
    {
        $userEmail = '';
        $userText = '';
        $result = false;



       // die();



        if (isset($_POST['submit'])) {
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            $errors = false;

            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false) {
//                echo "<pre>";
//                print_r('hello');
//                echo "</pre>";
                $adminEmail = 'mari.zolotaya.96@ukr.net';
                $message = "Текст: ($userText). От ($userEmail)";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }
//        $mail = 'php.start@mail.ru';
//        $subject = 'Тема письма';
//        $message = 'Содержание письма';
//        $result = mail($mail, $subject, $message);
//
//        var_dump($result);
//        die;
        require_once(ROOT . '/application/views/site/contact.php');
        return true;
    }
}