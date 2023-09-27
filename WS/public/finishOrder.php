<?php 
session_start();

$userInfo = $_SESSION['user_info'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finish Order</title>
</head>
<body>
    <h1>Finalize purchase</h1>

    <form action="formFinishOrder.php" method="post">
        <div>
            <h3>Delivery Address</h3>

            <div>
                <label for="">Street</label>
                <input type="text" name="street">
            </div>
            <div>
                <label for="">Street Number</label>
                <input type="text" name="street_number">
            </div>
            <div>
                <label for="">Zip</label>
                <input type="text" name="zip">
            </div>
            <div>
                <label for="">city</label>
                <input type="text" name="city">
            </div>
        </div>
        <div>
            <h3>Billing address</h3>

            <div>
                <label for="">Street</label>
                <input type="text" name="street_fat">
            </div>
            <div>
                <label for="">Street Number</label>
                <input type="text" name="street_number_fat">
            </div>
            <div>
                <label for="">Zip</label>
                <input type="text" name="zip_fat">
            </div>
            <div>
                <label for="">City</label>
                <input type="text" name="city_fat">
            </div>
        </div>
        <div>
            <h3>Type of payment</h3>
            <div>
                <label for="">Type Payment</label>
                <select name="payment_type" id="">
                    <option value="1">Card</option>
                    <option value="2">Invoice</option>
                </select>
            </div>
            <div>
                <button type="submit">Next</button>
            </div>
        </div>
    </form>        

</body>
</html>