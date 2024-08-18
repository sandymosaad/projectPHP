<?php
session_start();

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$userImage = isset($_SESSION['user_image']) ? $_SESSION['user_image'] : '/images/user.jpg'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="orderByUser.php">Home</a>
        <a class="nav-link" href="orders.php">Orders</a>


        <div class="ml-auto">
            <span class="navbar-text text-white mr-2"><?php echo ($username); ?></span>
            <img src="images/<?php echo($userImage); ?>" alt="User" style="width:40px; height:40px; border-radius:50%;">
        </div>
    </nav>

    <div class="container search-bar">
        <input type="text" class="form-control" id="search" placeholder="Search for a drink...">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 order-summary">
                <h5>Order Summary</h5>
                <div id="orderItems">
                </div>
                <div>
                    <label for="notes">Notes:</label>
                    <textarea id="notes" class="form-control" rows="3" placeholder="e.g., 1 Tea Extra Sugar"></textarea>
                </div>
                <div class="form-group">
                    <label for="room">Room:</label>
                    <select id="room" class="form-control">
                        <option value="Room1">Room 1</option>
                        <option value="Room2">Room 2</option>
                        <option value="Room3">Room 3</option>
                        <option value="Room4">Room 4</option>
                        <option value="Room5">Room 5</option>
                    </select>
                </div>
                <div class="mt-2">
                    <h5>Total: EGP <span id="totalPrice">0</span></h5>
                </div>

                <form action="http://localhost/php/phpProject/insertOrder.php" method="POST" id="orderForm">
                    <input type="hidden" name="orderDetails" id="orderDetails">
                    <button type="submit" class="btn" style="background-color: #6f4e37; color: #fff;">Confirm</button>
                </form>
            </div>

            <div class="col-md-8">
                <h5>Latest Order</h5>
                <div class="latest-order" id="latestOrder">
                    <!-- Selected drinks appear here -->
                </div>
                <hr>
                <div class="row" id="drinkList">
                    <div class="col-md-3 drink-item">
                        <img src="assets/tea.jpeg" class="drink-img" data-name="Tea" data-price="5" alt="Tea">
                        <p>Tea (5 LE)</p>
                    </div>
                    <div class="col-md-3 drink-item">
                        <img src="assets/coffee.jpg" class="drink-img" data-name="Coffee" data-price="6" alt="Coffee">
                        <p>Coffee (6 LE)</p>
                    </div>
                    <div class="col-md-3 drink-item">
                        <img src="assets/Nescafe.webp" class="drink-img" data-name="Nescafe" data-price="8"
                            alt="Nescafe">
                        <p>Nescafe (8 LE)</p>
                    </div>
                    <div class="col-md-3 drink-item">
                        <img src="assets/cola.jpg" class="drink-img" data-name="Cola" data-price="10" alt="Cola">
                        <p>Cola (10 LE)</p>
                    </div>
                    <div class="col-md-3 drink-item">
                        <img src="assets/Chocolate Milk.jpeg" class="drink-img" data-name="Chocolate Milk"
                            data-price="15" alt="Chocolate Milk">
                        <p>Chocolate Milk (15 LE)</p>
                    </div>
                    <div class="col-md-3 drink-item">
                        <img src="assets/Cappuccino.jpeg" class="drink-img" data-name="Cappuccino" data-price="15"
                            alt="Cappuccino">
                        <p>Cappuccino (15 LE)</p>
                    </div>
                    <div class="col-md-3 drink-item">
                        <img src="assets/Green Tea.jpeg" class="drink-img" data-name="Green Tea" data-price="10"
                            alt="Green Tea">
                        <p>Green Tea (10 LE)</p>
                    </div>
                    <div class="col-md-3 drink-item">
                        <img src="assets/Jasmine Tea.jpeg" class="drink-img" data-name="Jasmine Tea" data-price="10"
                            alt="Jasmine Tea">
                        <p>Jasmine Tea (10 LE)</p>
                    </div>
                    <div class="col-md-3 drink-item">
                        <img src="assets/Mint Lemonade.jpeg" class="drink-img" data-name="Mint Lemonade" data-price="15"
                            alt="Mint Lemonade">
                        <p>Mint Lemonade (15 LE)</p>
                    </div>
                    <div class="col-md-3 drink-item">
                        <img src="assets/Mango Juice.jpeg" class="drink-img" data-name="Mango Juice" data-price="20"
                            alt="Mango Juice">
                        <p>Mango Juice (20 LE)</p>
                    </div>
                    <div class="col-md-3 drink-item">
                        <img src="assets/Strawberry Juice.jpeg" class="drink-img" data-name="Strawberry Juice"
                            data-price="20" alt="Strawberry Juice">
                        <p>Strawberry Juice (20 LE)</p>
                    </div>
                    <div class="col-md-3 drink-item">
                        <img src="assets/ice cream.jpeg" class="drink-img" data-name="ice cream" data-price="15"
                            alt="ice cream">
                        <p>ice cream(15 LE)</p>
                    </div>
                    <div class="col-md-3 drink-item">
                        <img src="assets/Sahlab.jpeg" class="drink-img" data-name="Sahlab" data-price="10" alt="Sahlab">
                        <p>Sahlab(10 LE)</p>
                    </div>
                    <div class="col-md-3 drink-item">
                        <img src="assets/Iced Coffee.jpeg" class="drink-img" data-name="Iced Coffee" data-price="20"
                            alt="Iced Coffee">
                        <p>Iced Coffee (20 LE)</p>
                    </div>
                    <div class="col-md-3 drink-item">
                        <img src="assets/Pomegranate Juice.jpeg" class="drink-img" data-name="Pomegranate Juice"
                            data-price="20" alt="Pomegranate Juice">
                        <p>Pomegranate Juice(20 LE)</p>
                    </div>
                    <div class="col-md-3 drink-item">
                        <img src="assets/Mineral Water.jpeg" class="drink-img" data-name="Mineral Water" data-price="5"
                            alt="Mineral Water">
                        <p>Mineral Water(5 LE)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="homeUserAdmain.js">


    </script>
</body>

</html>