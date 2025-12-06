<?php require_once __DIR__ . "/../../public/templates/header.php"; ?>

<body>
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src=<?php echo $car['image'] ?> alt=<?php echo $car['model'] ?> /></div>
                <div class="col-md-6">
                    <div class="small mb-1"><?php echo $car['model'] ?></div>
                    <h1 class="display-5 fw-bolder"><?php echo $car['make'] . " " . $car['model'] ?></h1>
                    <div class="fs-5 mb-5">
                        <span class="text-decoration-line-through">$<?php echo number_format($car['price'] / 1.2, 0) ?></span>
                        <span>$<?php echo  number_format($car['price'], 0) ?></span>
                    </div>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem
                        quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis
                        delectus ipsam minima ea iste laborum vero?</p>
                    <div class="d-flex">
                        <?php if (isset($_SESSION['UserID'])): ?>

                            <?php if (!$isFavorite): ?>
                                <a href="index.php?controller=user&action=addFavorite&id=<?= $car['id'] ?>"
                                    class="btn btn-warning"> Add to Favorites </a>
                            <?php else: ?>

                                <a href="index.php?controller=user&action=removeFavorite&id=<?= $car['id'] ?>"
                                    class="btn btn-secondary"> Remove from Favorites </a>

                            <?php endif; ?>

                        <?php else: ?>
                            <p>Please <a href="/CarDealership/public/index.php?controller=user&action=login">login</a> to
                                add to favorites.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>