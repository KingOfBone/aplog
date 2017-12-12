<script>
	function callResize()
	{
		var height = document.body.scrollHeight;
		parent.resizeIframe(height);
		parent.window.top.location.reload;
	}
	window.onload = callResize;
</script>

<?php
	$src = "/newmonarki/foto/".$_GET['fr'];
	
	
?>

<div id="wrapper">
<div id="page-wrapper">
<div id="page-inner">
<iframe src='<?php echo $src; ?>' width="100%" height="550" frameborder=no></iframe>
</div>
</div>
</div>