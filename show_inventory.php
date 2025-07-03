<?php
try {
  $db = new PDO("mysql:host=localhost;dbname=inventory_db", "root", "");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Fetch all items
  $stmt = $db->query("SELECT * FROM items");
  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo "<h2>My Personal Inventory</h2>";
  echo "<table border='1' cellpadding='8'>";
  echo "<tr><th>Item Name</th><th>Category</th><th>Quantity</th><th>Purchase Date</th></tr>";

  foreach ($items as $item) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($item['item_name']) . "</td>";
    echo "<td>" . htmlspecialchars($item['category']) . "</td>";
    echo "<td>" . $item['quantity'] . "</td>";
    echo "<td>" . $item['purchase_date'] . "</td>";
    echo "</tr>";
  }

  echo "</table>";

} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

/*
Reflection: 
I chose items that I value, these are items that I use often. I love fragrances, so I always have a candle in my room.
I always have my phone and airpods with me, I love listening to music wherever I go.
A system like this could be useful for small businesses, like a jewelry store or a tech store, they can track their stock.
Using PDO keeps a database secure from SQL injection by keeping SQL commands and user input separate
*/
?>