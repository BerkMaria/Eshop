<?php include ROOT . '/application/views/layouts/header.php'; ?>
    <section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id']; ?>">
                                            <?php echo $categoryItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-9 padding-right">
        <div class="features_items">
            <h2 class="title text-center">Корзина</h2>
                    <?php if ($productsInCart) : ?>
                        <p>Вы выбрали такие товары:</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>Код товара</th>
                                <th>Название</th>
                                <th>Стоимость, грн.</th>
                                <th>Количество, шт.</th>
                                <th>Удалить</th>
                            </tr>
                            <?php foreach ($products as $product): ?>

                                <tr>
                                    <td><?php echo $product['code']; ?></td>
                                    <td>
                                        <a href="/product/с">
                                            <?php echo $product['name']; ?>
                                        </a>
                                    </td>
                                    <td><?php echo $product['price']; ?></td>
                                    <td><?php echo $productsInCart[$product['id']]; ?></td>


                                    <td><button class="delete_fromBasket" data-basket_id="<?php echo $product['id']; ?>" > x </button></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="3">Общая стоимость:</td>
                                <td><?php echo $totalPrice; ?></td>

                            </tr>
                        </table>
                    <?php else: ?>
                        <p>Корзина пуста</p>
                    <?php endif; ?>

            <li><a href="/cart/checkout/">
                    <i class="fa fa-shopping-cart"></i>Оформить заказ </a></li>

<!--            --><?php //foreach ($products as $product) : ?>
<!--                <p> --><?php //echo $product['name']; ?>
<!--                --><?php //echo $product['price']; ?>
<!--                    <button class="delete_fromBasket" data-basket_id="--><?php //echo $product['id']; ?><!--" >Удалить из корзины</button><hr>-->
<!--                </p>-->
<!--            --><?php //endforeach; ?>

        </div>
    </div>

<?php include ROOT . '/application/views/layouts/footer.php'; ?>