
<!-- Challenge 1: Create a MySQL table that holds a record for each state. Create an html form that has a select field with
all of the US states. Generate the states using PHP/MySQL. -->

<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
  <form>
    <select>
    <?php
    try
    {
    $db = new PDO("mysql:dbname=weeklyChallenges;host=localhost", "root", "root");
    $states = "SELECT state_name FROM 	States";
    foreach($db->query($states) as $state){
      echo "<option value=\"{$state['state_name']}\">" . $state['state_name'] . "</option> ";
    }
    }catch(Exception $e){
      echo $e->getMessage();
      exit;
    }
    ?>
      </select>
</body>
</html>
