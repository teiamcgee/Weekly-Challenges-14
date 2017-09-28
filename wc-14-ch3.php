<!-- Challenge 3: Create a form to add new products to the database. -->
<!DOCTYPE HTML>
<html>
<head>
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
</head>
<body>
  <form method="POST" action="wc-14-ch3.php">
      <input type="text" placeholder="Name" name="name" />
      <input type="text" placeholder="Price" name="price"/>
      <input type="text" placeholder="Description" name="description" />
      <input type="text" placeholder="color" name="color" />
      <input type="submit" value="Submit" />
    </form>
    <div>
      <?php
        if(!empty($_POST)) {
        try
        {
          $db = new PDO("mysql:dbname=weeklyChallenges;host=localhost", "root", "root");
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $items = 'INSERT INTO  Products(product_name, product_color, product_price, product_descr)
          VALUES(:name, :price, :description, :color)';
          $givenItem = $db->prepare($items);
          $givenItem->bindParam(':name',$_POST['name']);
          $givenItem->bindParam(':price',$_POST['price']);
          $givenItem->bindParam(':description', $_POST['description']);
          $givenItem->bindParam(':color',$_POST['color']);
          $givenItem->execute();
        } catch(Exception $e){
          echo $e->getMessage();
          exit;
        }
      }
      ?>
    </div>
</body>
<script src="lib/js/javascript.js" ></script>
</html>
