<html>
<head>
<title>Geo IP List</title>
</head>
<body>
<?php

$ip_list = explode("\n",$_POST['ip_list']);
if($_SERVER["REQUEST_METHOD"] == "POST") {
    print("Get Parmas!!");
}
?>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" name="params">

<input type="submit" name="" value="Parse">
<textarea name="ip_list" style="min-height:300px;"></textarea>
</form>
<div id="list">

<?php foreach($ip_list as $n => $ip): ?>
<?php $p = $n + 1; ?>
<?php
if(!strstr(geoip_country_name_by_name($ip),'Japan')) {
    echo "<span style='color:red;'>".$p." ".$ip."->".geoip_country_name_by_name($ip)."</span><br>";
}else{
    echo "<span style=''>".$p." ".$ip."->".geoip_country_name_by_name($ip)."</span><br>";
}
?>

<?php endforeach; ?>
</div>
</body>
</html>
