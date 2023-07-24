<!DOCTYPE html>
<html>
      
<head>
    <title>
        
    </title>
</head>
  
<body style="text-align:center;">
      
    <h1 style="color:green;">
        THIS ROOM IS ALREADY FULL PLEASE CHOOSE ANOTHER ROOM
    </h1>
      
    <h4>
        
    </h4>
      
    <?php
        if(array_key_exists('button1', $_POST)) {
            button1();
        }
        
        function button1() {

        }
    ?>
  
    <form action="admin3.php">
        <input type="submit" name="button1"
                class="button" value="go back"/>
    </form>
</head>
  
</html>