<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>





<div class="col-mb-12 col-8" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
       
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </article>

</div><!-- end #main-->


<br>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
