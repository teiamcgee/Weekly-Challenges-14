<!-- Challenge 2: Create a MySQL table that holds a list of products (name, description, price, color). Create a
form that allows users to select a color. When they submit the color choice, display all products that are that color.
Bonus if you can dynamically generate the color choices in the form from
all of the unique color options in the database. -->

<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
  <form method="GET" action="wc-14-ch2.php">
    <select name="colors">
      <option value="blue">Blue</option>
      <option value="red">Red</option>
      <option value="green">Green</option>
      </select>
      <input type="submit" value="Submit" />
    </form>
    <div>
      <?php
        if(!empty($_GET)) {
          $chosenColor = $_GET['colors'];
        try
        {
          $db = new PDO("mysql:dbname=weeklyChallenges;host=localhost", "root", "root");
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $items = "SELECT product_name, product_color FROM Products WHERE product_color = :product_color";
          $chosenItem = $db->prepare($items);
          $chosenItem->bindParam(":product_color",$_GET['colors']);
          $chosenItem->execute();
            foreach($chosenItem->fetchAll() as $item){
              echo "<p>{$item['product_name']}, {$item['product_color']}</p> ";
            }
        } catch(Exception $e){
          echo $e->getMessage();
          exit;
        }
      }
      ?>
    </div>
</body>
</html>
