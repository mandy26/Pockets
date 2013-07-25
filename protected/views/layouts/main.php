<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<?php if($this->route != 'dashboard/index') echo CHtml::link ('Home', '/').'<br />'; ?>
<?php echo $content ?>

<script src="http://code.jquery.com/jquery.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
