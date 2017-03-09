<?php foreach($result as $product): ?>
    <a href="/product/<?php echo $product['id'] ?>"><?php echo $product['name'];?></a><br>
<?php endforeach; ?>
