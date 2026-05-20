<?php
// Safely fetch GET data
$order_id   = $_GET['order_id'] ?? 'N/A';
$user_id    = $_GET['user_id'] ?? 'N/A';
$food_id    = $_GET['food_id'] ?? 'N/A';
$user_name  = $_GET['user_name'] ?? 'Valued Customer';
$timestamp  = $_GET['timestamp'] ?? 'N/A';
$price      = $_GET['price'] ?? 0;
$quantity   = $_GET['quantity'] ?? 1;
$offer      = $_GET['offer'] ?? 'No Offer';
$item_price = $price / $quantity;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Bill</title>
  <style>body {
  margin: 0;
  padding: 0;
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
  display: flex;
  align-items: flex-start;
  justify-content: center;
  padding-top: 20px;
}

.bill {
  margin: 30px;
  background: #fff;
  width: 600px;
  border-radius: 16px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  padding: 40px;
  color: #2d3748;
  position: relative;
  font-size: 16px;
  page-break-inside: avoid;
}

.bill::before {
  content: "🍽️ Your Delicious Receipt";
  position: absolute;
  top: -18px;
  left: 50%;
  transform: translateX(-50%);
  background: #2f855a; /* changed to green */
  color: white;
  padding: 9px 26px;
  border-radius: 20px;
  font-weight: bold;
  font-size: 15px;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
}

.logo {
  text-align: center;
  margin-bottom: 10px;
}

.logo img {
  height: 200px;
}

h2 {
  text-align: center;
  margin-bottom: 8px;
  font-size: 24px;
  color: #1a202c;
}

.thank-you {
  text-align: center;
  font-size: 14px;
  color: #718096;
  margin-bottom: 20px;
  font-style: italic;
}

.divider {
  height: 2.5px;
  background: #fbd38d;
  margin: 10px 0;
  border-radius: 3px;
}

.item {
  font-size: 16px;
  display: flex;
  justify-content: space-between;
  border-bottom: 1px dashed #e2e8f0;
  padding-bottom: 6px;
  margin: 6px 0;
}

.item span.label {
  font-weight: 600;
  color: #4a5568;
  margin-right: 12px;
  white-space: nowrap;
}

.total {
  font-size: 20px;
  font-weight: 700;
  color: #2f855a;
  text-align: right;
  margin-top: 25px;
}

.print-button {
  display: block;
  margin: 35px auto 0;
  background: #2f855a; /* changed to green */
  color: white;
  padding: 14px 32px;
  border: none;
  border-radius: 10px;
  font-size: 16px;
  font-weight: 700;
  cursor: pointer;
}

.print-button:hover {
  background: #38a169; /* lighter green for hover */
}
.go-home-button {
  display: block;
  margin: 30px auto 0;
  background: #2f855a; /* changed to green */
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 10px;
  font-size: 16px;
  font-weight: 700;
  cursor: pointer;
}

.go-home-button:hover {
  background: #38a169; /* lighter green for hover */
}


.footer {
  text-align: center;
  margin-top: 35px;
  font-style: italic;
  color: #555;
  font-size: 13px;
  line-height: 1.5;
}

/* Print Styles */
@media print {
  @page {
    size: A4;
    margin: 20mm;
  }

  body {
    background: #f5f5f5 !important;
    color: #2d3748 !important;
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
  }

  .bill {
    background: #ffffff !important;
    color: #2d3748 !important;
    box-shadow: none !important;
    border: 1px solid #e2e8f0;
  }

  .bill::before,
  .print-button {
    display: none !important;
  }
}

  </style>
</head>
<body>

<div class="bill">
  <div class="logo">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3dTkAm0aJ7JXZWS4ochDs8N09GxVSB0ZixQ&s" alt="Logo">
  </div>

  <h2>Thank you, <?= htmlspecialchars($user_name) ?>! ❤️</h2>
  <div class="thank-you">
    You didn’t just order food — you brought flavor, feeling, and happiness to your table.<br>
    We're honored to serve your smile! 🌱
  </div>

  <div class="divider"></div>

  <div class="item"><span class="label">Order ID:</span> <?= htmlspecialchars($order_id) ?></div>
  <div class="item"><span class="label">User Name:</span> <?= htmlspecialchars($user_name) ?></div>
  <div class="item"><span class="label">Order Time:</span> <?= htmlspecialchars($timestamp) ?></div>
  <div class="item"><span class="label">Quantity:</span> <?= htmlspecialchars($quantity) ?> item(s)</div>
  <div class="item"><span class="label">Price per Item:</span> ₹<?= number_format($item_price, 2) ?></div>
  <div class="item"><span class="label">Offer Applied:</span> <?= htmlspecialchars($offer) ?></div>

  <div class="divider"></div>

  <div class="total">Grand Total: ₹<?= number_format($price, 2) ?></div>

  <button class="print-button" onclick="window.print()">🖨️ Print this Receipt</button>

  <button class="go-home-button" onclick="window.location.href='../foods.php'">Go Home!</button>
                               
  <div class="footer">
    “Every bite tells a story — and yours just made ours better.” 🌿 <br>
    <strong>With love, Veggie Village 🌱</strong>
  </div>
</div>

</body>
</html>
