<html>
    <head>
	<title>Geo IP List</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<style>
	    #wrapper {
		width:100%;
		min-width:600px;
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

	    #content {
		height:600px;
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
	    #footer {
		position:relative;
		bottom 0;
		left: 0;
		width 100%;
		height 200px;
		background:#e5e5e5;
	    }
	</style>
    </head>
    <body>
	<div id="wrapper">
	    <div id="header"> 
		<p id="title">Geo IP List</p>
		<ul>
		    <li><a href="https://github.com/kentatogashi">GitHub</a></li>
		    <li><a href="#content">Readme</a></li>
		</ul>
	    </div>
	    <div id="content">
		<div id="sub_content_left">
		    <p class="headline">Insert IP Address List
		    <input type="submit" value="Parse" onclick="document.params.submit()">
		    <input type="reset" value="Reset" onclick="document.params.reset()">
		    </p>
		    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" name="params">
			<textarea name="ip_list" value="" style="width:300px;height:300px;" placeholder="123.456.789.0 or 123.456.789.0:hogehoge@gmail.com"></textarea>
		    </form>
		</div>
		<div id="sub_content_right">
		    <p class="headline">Display Parsed List Below</p>
		    <?php if(isset($data)): ?>
		    <span><?php echo"total:". count($data) ;?></span><br>
		    <?php foreach($data as $n => $v): $jp_flg = (!strstr($v['country'],'Japan')) ? true : false ; ?>
		    <span style="<?php if($jp_flg) echo 'color:red;';?>">
			<?php echo $v['mail'] . $v['ip'] . $v['country'] ; ?>
		    </span><br>
		    <?php endforeach; ?>
		    <?php endif; ?>
		</div>
	    </div>
	    <div id="footer">
		<p>GEO IP LIST created by togattti.You are free to use it.</p>
 	        <p>But data of form/post is not encrypted.</p>
		<p>So you should not use personal information.</p>
	    </div>
	</body>
    </html>
