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
                    <button type="submit" class="btn btn-success" id="add_comment">Оставить отзыв о товаре
                    </button><br>
                    <form method="post" id="comment_form" action="" onsubmit="return false" style="display: none" name="form">
                        <input type='hidden' id='id_product' value='<?= $product['id'] ?>'>
                        <div class="form-group">
                    <textarea rows="3" placeholder="Оставить отзыв...." name="comment"
                              class="form-control" id="text_comment"></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-success" id="add_comments">Добавить коммент
                        </button>
                        <button type="reset" class="btn btn-danger">Отмена</button>

                    </form>
                <?php else : ?>
                    <div style="margin-bottom: 50px;"><a href="/user/login">Войдите</a>,чтобы оставить комментарий</div>
                <?php endif; ?>
               <?php echo $com ?>















    </div>
        </div>
    </div>
</section>
