<?php if (!defined('THINK_PATH')) exit();?><div id="main">
	<div id="circle"></div>
	<div id="cross">
		<div id="position">
			<?php echo ($class1); echo ($department_name1); ?>成员<?php if(isset($class2)): ?>|<?php echo ($class2); echo ($department_name2); echo ($pos_name2); if(isset($class3)): ?>|<?php echo ($class3); echo ($department_name3); echo ($pos_name3); endif; endif; ?>
		</div>
	</div>
	<div id="img_circle">
		<img src="/hc_tp/Public/images/member/<?php echo ($name); ?>.png">
	</div>
	<div id="name"><?php echo ($name); ?></div>
	<?php if(!empty($girl)): ?><div id="sex_g">
		<div id="ten1"></div>
		<div id="ten2"></div>
	</div><?php endif; ?>
	<?php if(!empty($boy)): ?><div id="sex_b">
		<div id="narrow">↑</div>
	</div><?php endif; ?>

	<div id="jishu">
		<img src="/hc_tp/Public/images/member/clock.png">
		<p>级数：<?php echo ($graduate); ?>级</p>
	</div>
	<div id="school">
		<img src="/hc_tp/Public/images/member/school.png">
		<p>大学：<?php echo ($college); ?></p>
	</div>
	<div id="book">
		<img src="/hc_tp/Public/images/member/book.png">
		<p>专业：<?php echo ($major); ?></p>
	</div>
	<div id="senior">
		<img src="/hc_tp/Public/images/member/school.png">
		<p>高中：<?php echo ($senior); ?></p>
	</div>
	
</div>