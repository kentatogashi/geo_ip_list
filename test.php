<html>
<head>
<title>Geo IP List</title>
</head>
<body>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && (!empty($_POST['ip_list'])) ) {
    include'config.php';
    include'PostHandler.php';
    $Post = new PostHandler($_POST['ip_list']);
    $data = $Post->getParams();
}
?>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" name="params">

<input type="submit" name="" value="Parse">
<textarea name="ip_list" style="min-height:300px;"></textarea>
</form>
<div id="list">

<?php foreach($data as $n => $val):
$mail = $val['mail_address'];
$ip = $val['ip_address']; 
$c_name = $val['country_name']; 
$jp_flg = (!strstr($c_name,'Japan'))?true:false;
?>

<span style="<?php if($jp_flg) echo 'color:red;';?>">

<?php echo $mail . $ip . $c_name ; ?>

</span><br>
<?php endforeach; ?>
</div>
</body>
</html>
