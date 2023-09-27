<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Info</title>
</head>
<body>
    <div class="container">
        <form action="formCardsInfo.php" method="post">
            <div>
                <label for="">Type</label>
                <select name="type" id="">
                    <option value="mastercard">mastercard</option>
                    <option value="visa">visa</option>
                </select>
            </div>
            <div>
                <label for="">Owner</label>
                <input type="text" name="owner">
            </div>
            <div>
                <label for="">Card Number</label>
                <input type="text" name="card_number">
            </div>
            <div>
                <label for="">CVC</label>
                <input type="text" name="cvc">
            </div>
            <div>
                <label for="">Month Valid</label>
                <input type="number" name="month_valid" max="12" min="1">
            </div>
            <div>
                <label for="">Year Valid</label>
                <input type="number" name="year_valid" min="2023">
            </div>

            <div>
                <button type="submit">Send</button>
            </div>
        </form>
    </div>
</body>
</html>