<html>
<head>
<style>
p.inline {display: inline-block;}
span { font-size: 8px;}
</style>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style>
</head>
<body onload="window.print();">
	<div style="margin-left: 5%">
		<?php
		include 'its_barcode128.php';
		$product = $_POST['product'];
		$product_id = $_POST['product_id'];

		for($i=1;$i<=$_POST['print_qty'];$i++){
			echo "<p class='inline'><span ><b>IP Address: $product</b></span>".bar128(stripcslashes($_POST['product_id']))."</p>&nbsp&nbsp&nbsp&nbsp";
		}

		?>
	</div>
</body>
</html>