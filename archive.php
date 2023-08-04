<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


<div class="col-mb-12 col-8" role="main">
    <h1 class="archive-title"><?php $this->archiveTitle([
            'category' => _t(' %s '),
            'search'   => _t('包含关键字 %s 的文章'),
            'tag'      => _t('标签 %s 下的文章'),
            'author'   => _t('%s 发布')
        ], '', ''); ?></h1>
		<p class="a-dsescription"><?php echo $this -> getDescription (); ?></p>
		
		
    <style>
      .a-dsescription{
		 text-align: center;
		 font-size: 120%;
	  }
.archive-title{
	text-align: center;
	    font-weight: 800;
	    font-size: 300%;
		margin-bottom: -10px;
}
        .plistlink {
            display: inline-block;
            transition: 1s;
            transition-timing-function: cubic-bezier(0.1, 1.5, 0.4, 0.9);
        }
        
        .plistlink:hover {
            transform: translateX(1.5em);
        }

        /* 新增的CSS样式 */
        .post-content {
            display: table-cell;
            vertical-align: middle;
        }

        .post-date {
            font-size: 16px;
            font-weight: 400;
            width: 100px; /* 调整日期宽度，根据实际需要调整 */
            margin-right: 30px; /* 调整日期和标题之间的间距 */
        }

        .post-title {
            display: inline-block;
            margin: 0;
            font-size: 1.3em;
            font-weight: bold;
            line-height: 3; /* 调整标题的行高，使其竖直对齐 */
			
        }
    </style>

    <?php if ($this->have()): ?>
        <br>
        <?php while ($this->next()): ?>

        <article class="post">
            <div class="post-content">
                <span class="post-date"><?php $this->date(); ?></span>
                <a class="plistlink" style="color: #161616;" itemprop="url" href="<?php $this->permalink() ?>">
                    <span class="post-title" itemprop="name headline"><?php $this->title() ?></span>
                </a>
            </div>
        </article>

        <?php endwhile; ?>
    <?php else: ?>
        <article class="post">
            <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
        </article>
    <?php endif; ?>

    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main -->
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
