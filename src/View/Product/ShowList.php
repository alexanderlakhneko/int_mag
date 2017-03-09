<section>
    <div class="container">
        <div class="row">

            <div class="col-lg-6">
                <h4>Результат поиска</h4>

                <br/>

                <?php foreach($result as $product): ?>
                    <a href="/product/<?php echo $product['id'] ?>"><?php echo $product['name'];?></a><br>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>