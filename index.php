<!doctype html>
<html lang="ru">
<head>
  <title>Поиск ИНН</title>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="aj.js"></script>-->

</head>
<body>
  <?php
     include_once "connection.php";
  ?>
  <form action="" method="post" id="form">
    Проверить ИНН:<input type="text" name="inn" value="" minlength="10">
        <input type="submit" value="OK" name="button_id" >
  </form>
    <div id="1"></div>
  <div id="message"></div>


</body>
</html>


<?
 include_once "dadate.php";

 

?>

