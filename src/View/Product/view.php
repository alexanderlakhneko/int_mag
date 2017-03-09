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
                                        <a href="/category/<?php echo $categoryItem['id']; ?>/page-1">
                                            <?php echo $categoryItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="<?php echo $products->getImage($product['id']); ?>" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->

                                <?php if ($product['is_new']): ?>
                                    <img src="/images/product-details/new.jpg" class="newarrival" alt="" />
                                <?php endif; ?>

                                <h2><?php echo $product['name']; ?></h2>
                                <p>Код товара: <?php echo $product['code']; ?></p>
                                <span>
                                    <span>US $<?php echo $product['price']; ?></span>
                                    <a href="#" data-id="<?php echo $product['id']; ?>"
                                       class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>В корзину
                                    </a>
                                </span>
                                <p><b>Наличие:</b> <?php echo $products->getAvailabilityText($product['availability']); ?></p>
                                <p><b>Производитель:</b> <?php echo $product['brand']; ?></p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">                                
                        <div class="col-sm-12">
                            <br/>
                            <h5>Описание товара</h5>
                            <?php echo $product['description']; ?>
                        </div>
                    </div>
                </div><!--/product-details-->
                <h3> Отзывов: <span class="badge"><?= $comment['count']; ?></span></h3>
                <?php if ($user) : ?>
                    <form method="post" id="comment_form" action="">
                        <input type='hidden' id='id_news' value='<?= $product['id'] ?>'>
                        <div class="form-group">
                    <textarea rows="3" placeholder="Оставить отзыв...." name="comment"
                              class="form-control"></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-success">Добавить коммент
                        </button>
                        <button type="reset" class="btn btn-danger">Отмена</button>

                    </form>
                    <br>
                <?php else : ?>
                    <div style="margin-bottom: 50px;"><a href="/user/login">Войдите</a>,чтобы оставить комментарий</div>
                <?php endif; ?>
                <?php array_pop($comment);?>
                <?php foreach ($comment as $one_com): ?>
                <div class='panel panel-warning'><div class='panel-heading'>
                        <h3 class='panel-title'>Name: <a><?php echo $one_com['name'] ?></a> Time: <?php echo $one_com['date_time'] ?> </h3>
                    </div>
                    <div class='panel-body'><?php echo $one_com['comment'] ?></div>
                            </div>
                <?php endforeach;?>















    </div>
        </div>
    </div>
</section>
