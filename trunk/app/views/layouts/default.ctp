<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<title>The Base is Right</title>
	<link href="/css/styles.css" rel="stylesheet" type="text/css" media="all" />
	<script src="http://www.google.com/jsapi"></script>
	<script>
	  // Load jQuery
	  google.load("jquery", "1");
	</script>
	<script src="/js/jquery.form.js"></script>
	<script src="/js/quiz.js"></script>	
</head>

<body>
<div id="container">
	<?php echo $content_for_layout;	?>
</div>	
</body>
</html>