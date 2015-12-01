<?php if (!defined('THINK_PATH')) exit();?><div id="photo">
	<ul>
		<?php if(is_array($filePath)): $i = 0; $__LIST__ = array_slice($filePath,$startPage,$imgCount,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><img src="/hc_tp/<?php echo ($filePath[$key]); ?>">                  
		<!-- 路径是以数组的方式注册了变量，数组下标是key值 -->
		</li><?php endforeach; endif; else: echo "" ;endif; ?>
		<div class="green-black">	<?php echo ($page); ?></div>
	</ul>
</div>