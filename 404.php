<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-mb-12 col-tb-8 col-tb-offset-2">

<link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('home.css'); ?>" />


    <div class="error-page">
        <div style="color: #742820;text-align:center; font-size: 10rem;"><b>404</b></div>
        <p style="text-align:center;"><?php _e('你想查看的页面已被转移或删除了, 要不要搜索看看: '); ?></p>
        <form method="post">
            <p><input type="text" name="s" class="text" autofocus/></p>
            <p>
                <button type="submit" class="submit"><?php _e('搜索'); ?></button>
            </p>
        </form>
    </div>

</div><!-- end #content-->
<?php $this->need('footer.php'); ?>