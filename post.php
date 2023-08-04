<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


<div class="col-mb-12 col-18" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="archive-title"><?php $this->title() ?>
        </h1>

  <style>
  	.archive-title {
  		text-align: center;
  		font-weight: 800;
  		font-size: 300%;
  	}
	</style>
<hr>
<details>
<summary>点击展开目录 <span style="float: right;">on <?php $this->date('F j, Y'); ?>. <?php Postviews($this); ?></span></summary>
<?php getCatalog(); ?>
</details>
<hr>



        <div style="color:var(--geist-black); font-size: 120%; font-family: 'Noto Serif SC', serif;" id="post" class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>

    </article>

    <?php $this->need('comments.php'); ?>


</div>

<!-- end #main-->
<br>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
