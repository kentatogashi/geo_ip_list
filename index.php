<html>
    <head>
	<title>Geo IP List</title>
	<style>
	    #wrapper {
		width:100%;
		min-height:80%;
		margin:0;
	    }

	    #header {
		margin-right:auto;
		height:50px;
		width:100%;
		background:#e5e5e5;
		position:relative;
	    }

	    #title {
		margin:0;
		margin-left:20px;
		margin-top:10px;
		padding:0;
		font-size:28px;
		float:left;
	    }

	    ul{
		display:block;
		height:35px;
		padding-top:12px;
	    }

	    li {
		display:inline;
		list-style:none;
		float:right;
		padding-right:10px;
	    }

	    #sub_content_left {
		float:left;
	    }
	    #sub_content_right {
		float:right;
	    }
	</style>
    </head>
    <body>
	<?php
	if(!empty($_POST['ip_list'])) {
	include'config.php';
	include'PostHandler.php';
	$Post = new PostHandler($_POST['ip_list']);
	$data = $Post->getParams();
	}
	?>
	<div id="wrapper">
	    <div id="header"> 
		<p id="title">Geo IP List</p>
		<ul>
		    <li><a href="https://github.com/kentatogashi">GitHub</a></li>
		    <li><a href="#">Readme</a></li>
		</ul>
	    </div>
	    <div id="countent">
		<div id="sub_content_left">
		    <p class="headline">Insert IP Address List
		    <input type="submit" value="Parse" onclick="document.params.submit()">
		    <input type="reset" value="Reset" onclick="document.params.reset()">
		    </p>
		    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" name="params">
			<textarea name="ip_list" style="width:300px;height:300px;" placeholder="123.456.789.0 or 123.456.789.0:hogehoge@gmail.com"></textarea>
		    </form>
		</div>
		<div id="sub_content_right">
		    <p class="headline">Display Parsed List Below</p>
		    <span><?php echo"total:". count($data) ;?></span><br>
		    <?php foreach($data as $n => $v): $jp_flg = (!strstr($c_name,'Japan')) ? true : false ; ?>
		    <span style="<?php if($jp_flg) echo 'color:red;';?>">
			<?php echo $v['mail_address'] . $v['ip_address'] . $v['country_name'] ; ?>
		    </span><br>
		    <?php endforeach; ?>
		</div>
	    </div>
	</body>
    </html>
