<?php
$test_number=(int)$_GET['test_number'];

?>

<html>
  <head>
    <title>2.2 Обработка форм»</title>
  </head>
  <body>
    <h4>Пожалуйста, выберите тест для прохождения:</h4>
<form action="/" method="GET">
  <div><input type="text" name="test_number">
  <input type="submit" value="Выбрать">
</form>
<?php if(isset ($test_number)){ ?>
<h4>Тест №<?php echo $test_number?></h4>
<form>
<?php  $json = file_get_contents(./Tests/."$test_number.json");
  $data = json_decode($json, true);
  foreach($data as $item) { ?>
    <form action="/" method="GET">
          <fieldset>
            <legend><?php echo $item["question1"]?></legend>
            <label><input type="radio" name="q1"><?php echo $item["answer1"]?></label>
            <label><input type="radio" name="q1"><?php echo $item["answer2"]?></label>
            <label><input type="radio" name="q1"><?php echo $item["answer3"]?></label>
          </fieldset>
          <fieldset>
            <legend><?php echo $item["question2"]?></legend>
            <label><input type="radio" name="q2"><?php echo $item["answer1"]?></label>
            <label><input type="radio" name="q2"><?php echo $item["answer2"]?></label>
            <label><input type="radio" name="q2"><?php echo $item["answer3"]?></label>
          </fieldset>
          <fieldset>
            <legend><?php echo $item["question3"]?></legend>
            <label><input type="radio" name="q3"><?php echo $item["answer1"]?></label>
            <label><input type="radio" name="q3"><?php echo $item["answer2"]?></label>
            <label><input type="radio" name="q3"><?php echo $item["answer3"]?></label>
          </fieldset>
          <input type="submit" value="Отправить">
</form>
<?php } }
$right = 0;
$wrong = 0;
   if ($_GET[q1] == ["answer1"]){
     $right++;
   } else {
     $wrong++;
   }
   if ($_GET[q2] == ["answer3"]){
     $right++;
   } else {
     $wrong++;
   }
   if ($_GET[q3] == ["answer1"]){
     $right++;
   } else {
     $wrong++;
   }?>
   <h4>Ваш результат:</h4>
         <tr>
           <td>Правильные ответы:<?php echo $right; ?></td>
           <td>Неправильные ответы:<?php echo $wrong; ?></td>
  </body>
</html>
