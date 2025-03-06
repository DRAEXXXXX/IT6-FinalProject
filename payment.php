<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: black;
        }

        .main-container {
            display: flex;
            gap: 20px;
            max-width: 1500px;
            width: 100%;
        }

        .container {
            flex: 1;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .details-container {
            width: 300px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .detail-space {
            display: inline-block;
            height: 20px;
            width: 100%;
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .radio-group {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-container button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background: #666;
            color: white;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-container button:hover {
            background: black;
        }

        .table-container {
            margin-top: 30px;
        }

        .search-box {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Left Side: Payment Form -->
        <div class="container">
            <div class="form-group">
                <label>Booking ID</label>
                <select>
                    <option>Select Booking</option>
                </select>
            </div>

            <div class="form-group">
                <label>Customer Name</label>
                <input type="text" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label>Amount</label>
                <input type="text" placeholder="Enter Amount">
            </div>

            <div class="form-group">
                <label>Payment Method</label>
                <div class="radio-group">
                    <label><input type="radio" name="payment-method"> Cash</label>
                    <label><input type="radio" name="payment-method"> Credit Card</label>
                    <label><input type="radio" name="payment-method"> Bank Transfer</label>
                </div>
            </div>

            <!-- Buttons -->
            <div class="btn-container">
                <button>Submit</button>
                <button>Edit</button>
                <button>Cancel</button>
            </div>

            <!-- Booking Table -->
            <div class="table-container">
                <input type="text" class="search-box" placeholder="Search Payment">
                <table>
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Paid By</th>
                            <th>Amount Paid</th>
                            <th>Balance</th>
                            <th>Payment Method</th>
                            <th>Updated By</th>
                            <th>Updated Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right Side: Booking Details -->
        <div class="details-container">
            <h3>Booking Details</h3>
            <p>Booking ID:<br><span class="detail-space"></span></p>
            <p>Paid by (Customer Name):<br><span class="detail-space"></span></p>
            <p>Amount Paid:<br><span class="detail-space"></span></p>
            <p>Balance:<br><span class="detail-space"></span></p>
            <p>Method of Payment:<br><span class="detail-space"></span></p>
            <p>Updated by (Employee):<br><span class="detail-space"></span></p>
            <p>Updated Date:<br><span class="detail-space"></span></p>
        </div>
    </div>
</body>
</html>