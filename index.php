<?php



if (!file_exists('data.json')) {
  file_put_contents('data.json', '[]');
}


$data = json_decode(file_get_contents('data.json'), true);


$totalValue = 0;
foreach ($data as $row) {
  $totalValue += $row['totalValue'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Product Inventory</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Product Inventory</h1>
    <form id="product-form">
      <div class="form-group">
        <label for="productName">Product Name:</label>
        <input type="text" class="form-control" id="productName" name="productName">
      </div>
      <div class="form-group">
        <label for="quantity">Quantity in Stock:</label>
        <input type="number" class="form-control" id="quantity" name="quantity">
      </div>
      <div class="form-group">
        <label for="price">Price per Item:</label>
        <input type="number" class="form-control" id="price" name="price">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div id="data-display">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Quantity in Stock</th>
            <th>Price per Item</th>
            <th>Datetime Submitted</th>
            <th>Total Value</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody id="data-table">
          <?php foreach ($data as $row) {?>
          <tr>
            <td><?= $row['productName']?></td>
            <td><?= $row['quantity']?></td>
            <td><?= $row['price']?></td>
            <td><?= $row['datetime']?></td>
            <td><?= $row['totalValue']?></td>
            <td><a href="edit.php?id=<?= $row['id']?>">Edit</a></td>
          </tr>
          <?php }?>
          <tr>
            <th colspan="4">Total Value:</th>
            <th><?= $totalValue?></th>
            <th></th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="script.js"></script>
</body>
</html>