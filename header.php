<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="<?php $this->options->charset(); ?>">
		<meta name="renderer" content="webkit">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!-- 各种字体 -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Babylonica">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto Serif Simplified Chinese">

		<!-- js文件 -->

		<script src="<?php $this->options->themeUrl('instantclick.js'); ?>"></script>

		<!-- main -->
		<title><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search'   => _t('包含关键字 %s 的文章'),
            'tag'      => _t('标签 %s 下的文章'),
            'author'   => _t('%s 发布的文章')
        ], '', ' - '); ?><?php $this->options->title(); ?></title>
		<!-- 使用url函数转换相关路径 -->
		<link rel="stylesheet" href="<?php $this->options->themeUrl('normalize.css'); ?>">
		<link rel="stylesheet" href="<?php $this->options->themeUrl('grid.css'); ?>">
		<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
		<link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('home.css'); ?>" />
		<link rel="shortcut icon" href="/usr/themes/11gray/favicon.ico" type="image/x-icon" />
		<!-- 通过自有函数输出HTML头部信息 -->
		<?php $this->header(); ?>

	</head>
	<body>

		<!-- 弹出版权声明 -->


		<div id="popup">
			<h2>版权声明</h2>
			<p>除非特别注明，本站<b>所有文章</b>在<a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh"> CC BY-NC-SA 4.0
				</a>协议下授权</p>
			<p>您可以在<b>遵守本协议</b>的情况下自由使用本站内容，复制<b>默认</b>同意本协议。<br>点击确认关闭此窗口</p>
			<button id="confirmButton">确认</button>
		</div>
		<script>
			// 复制时显示版权声明
			document.addEventListener('copy', function(event) {
				var popup = document.getElementById('popup');
				popup.style.display = 'block';
				setTimeout(function() {
					popup.style.opacity = '1'
				}, 50)
			});
			document.getElementById('confirmButton').addEventListener('click', function() {
				var popup = document.getElementById('popup');
				popup.style.opacity = '0';
				setTimeout(function() {
					popup.style.display = 'none'
				}, 300)
			});
		</script>

		<!-- 头部 -->
		<header id="header">
			<div id="headergbg">
				<div class="site-name col-mb-12 col-9">
					<?php if ($this->options->logoUrl): ?>
					<a id="logo" href="<?php $this->options->siteUrl(); ?>"><img
							src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" /></a>
					<?php else: ?>
					<a id="logo" href="<?php $this->options->siteUrl(); ?>"><b><?php $this->options->title() ?></b></a>
					<!-- 菜单 -->
					<ul id="headera">
						<li><a href="https://fravilion.top/" class="active">主页</a></li>
						<li><a href="https://fravilion.top/index.php/links.html">友链</a></li>
						<li class="dropdown">
							<a href="#" class="dropbtn">分类</a>
							<div class="dropdown-content">
								<?php $categories = $this->widget('Widget_Metas_Category_List')->to($categories); ?>
								<?php if ($categories->have()): ?>
								<?php while ($categories->next()): ?>
								<a href="<?php $categories->permalink(); ?>"><?php $categories->name(); ?></a>
								<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</li>
						<li><a href="https://fravilion.top/index.php/aboutme.html">关于</a></li>
					</ul>

					<!-- 菜单结束 -->
					<p class="description"><?php $this->options->description() ?></p>
					<?php endif; ?>
				</div>
			</div>
		</header>
		<!-- 头部结束 正文开始 -->
		<div class="site-name col-mb-12 col-9">
			<div style="margin: 5em 0 0 0;">
