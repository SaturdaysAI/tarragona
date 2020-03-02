<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
</head>
<body class="test-data">
<table cellspacing="0" cellpadding="0" border="0">
<tr class="subhead" align="Left"><th>Name</th><th>Value</th></tr>
<?php $class = 'normal'; ?>
<tr class="<?php echo htmlspecialchars($class) ?>"><td>PHP_VERSION</td><td><?php echo htmlspecialchars(PHP_VERSION) ?></td></tr>
<?php foreach (isset($_SERVER) ? $_SERVER : array() as $name => $value): ?>
<?php
    if (strpos($name, 'HTTP_') !== 0 && strpos($name, 'REQUEST_') !== 0) {
        continue;
    }
    $class = $class === 'alt'? 'normal': 'alt'
?>
<tr class="<?php echo htmlspecialchars($class) ?>"><td><?php echo htmlspecialchars($name) ?></td><td><?php echo htmlspecialchars($value) ?></td></tr>
<?php endforeach ?>
</table>
</body>
</html>
