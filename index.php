<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("includes/header.php");
require_once("basket.php");

session_start();

if (!isset($_SESSION['basket'])) {
    $_SESSION['basket'] = new Basket();
}
$basket = $_SESSION['basket'];
$products = $basket->getProducts();

const PRODUCT_NAMES = [
    'R01' => 'Red Widget',
    'B01' => 'Blue Widget',
    'G01' => 'Green Widget',
];
?>

<body>
    <div class="container">
        <div class="row mb-3">
            <?php foreach (PRODUCT_NAMES as $code => $name): ?>
                <div class="col-md-3 text-center">
                    <div class="product-item">
                        <span><?= htmlspecialchars($name) ?> (<?= $code ?>)</span><br/>
                        <span>Price: $<?= number_format(Basket::PRICES[$code], 2) ?></span><br/>
                        <a id="add<?= ucfirst(strtolower(substr($name, 0, strpos($name, ' ')))) ?>" class="btn btn-primary mt-3">
                            <span>Add to basket</span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col-md-3 text-center">
                <span>Basket</span>
                <ul class="add-list">
                    <?php foreach ($products as $product): ?>
                        <li type="<?= $product ?>">
                            <?= htmlspecialchars(PRODUCT_NAMES[$product]) ?> (<?= $product ?>)
                            <a class="remove"><i class="fa fa-minus"></i></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row calculate-section">
                    <div class="col-md-2">
                        <a id="calculate" class="btn btn-primary"><span>Calculate</span></a>
                    </div>
                    <div class="col-md-10">
                        <p id="totalCost"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php require_once("includes/footer.php"); ?>