<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Coffee</title>
    <link rel="stylesheet" href="/coffee_shop/public/css/style.css">
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <a href="#">Coffee Shop</a>
        </div>
        <button class="nav-toggle">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Order</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
    <div class="container">
        <h1>Order a Coffee</h1>
        <div class="image-gallery">
            <!-- Static images in the gallery -->
            <img src="/coffee_shop/public/images/coffee-brain-caffeine-neuroscincces.webp" alt="Coffee Brain Caffeine" class="coffee-image">
            <img src="/coffee_shop/public/images/caffe-latte-macchiato.jpg" alt="Caffe Latte Macchiato" class="coffee-image">
            <img src="/coffee_shop/public/images/Espresso_Americano.0.0.jpg" alt="Espresso Americano" class="coffee-image">
        </div>
        <form action="/coffee_shop/public/submit" method="post">
            <?php if (!empty($data['coffeeItems'])): ?>
                <div class="coffee-items">
                    <?php foreach ($data['coffeeItems'] as $item): ?>
                        <div class="coffee-item">
                            <img src="<?= htmlspecialchars($item['image']) ?>" 
                                 alt="<?= htmlspecialchars($item['name']) ?>" 
                                 class="coffee-image" 
                                 width="100" 
                                 height="100">
                            <select name="coffee_items[0][coffee_id]">
                                <option value="<?= htmlspecialchars($item['id']) ?>"><?= htmlspecialchars($item['name']) ?> - $<?= $item['price'] ?></option>
                            </select>
                            <input type="number" name="coffee_items[0][quantity]" placeholder="Quantity" min="1">
                            <input type="hidden" name="coffee_items[0][price]" value="<?= $item['price'] ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No coffee items available.</p>
            <?php endif; ?>
            <input type="text" name="total_price" placeholder="Total Price">
            <button type="submit">Submit Order</button>
        </form>
    </div>
</body>
</html>
