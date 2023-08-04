<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
?>
 
<!-- /* 自定义评论列表部分 */ -->
<div id="<?php $comments->theId(); ?>">
<span itemprop="image">
<?php $number=$comments->mail;
if(preg_match('|^[1-9]\d{4,11}@qq\.com$|i',$number)){
echo '<img src="https://q2.qlogo.cn/headimg_dl? bs='.$number.'&dst_uin='.$number.'&dst_uin='.$number.'&;dst_uin='.$number.'&spec=100&url_enc=0&referer=bu_interface&term_type=PC" style="width:3em; height:3em;border-radius: 50%;float: left;margin-top: 0px;margin-right: 10px;margin-bottom:-2px">'; 
}
else
{
echo '<img src="https://pic.imgdb.cn/item/63f82f38f144a01007c91595.jpg" style="width:3em; height:3em;border-radius: 50%;float: left;margin-top: 0px;margin-right: 10px;margin-bottom:-2px">';
}
?>
</span>
<div>
    <p><b><?php $comments->author(); ?></b><br>评论时间：<?php $comments->date('Y-m-d H:i'); ?></p>
    
</div>
    <div>
    <?php $comments->content(); ?>
    </div>
    <p><?php $comments->reply(); ?></p>
</div>
<!-- /*子评论*/ -->
<?php if ($comments->children) { ?>
      <?php $comments->threadedComments($options); ?>
    <?php } ?>
 
<?php } ?>
<?php $this->comments()->to($comments); ?>
<?php if ($this->allow('comment')) : ?>
   <!-- 评论表单form放的地方-->
   <div id="<?php $this->respondId(); ?>">
      <div> <!-- 取消回复 -->
        <?php $comments->cancelReply(); ?>
      </div>
     <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
              <?php if($this->user->hasLogin()): ?>
              <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
              <?php else: ?>
			<div class="col-3">
				<input class="effect-8" id="input" type="text" name="author" placeholder="<?php _e('您的名字'); ?>" value="<?php $this->remember('author'); ?>" required />
				<span class="focus-border">
					<i></i>
				</span>
			</div>
			<div class="col-3">
				<input class="effect-8" id="input" type="text" name="mail" placeholder="<?php _e('您的电子邮箱'); ?>" value="<?php $this->remember('mail'); ?>" >
				<span class="focus-border">
					<i></i>
				</span>
			</div>


			<div class="col-3">
				<input class="effect-8" id="input" type="text" name="url" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>" >
				<span class="focus-border">
					<i></i>
				</span>
			</div>
              <?php endif; ?>
              <p>
                  <label for="textarea" class="required"><?php _e('内容'); ?></label>
                  <textarea rows="8" cols="50" name="text" id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
              </p>
              <p>
                  <button type="submit" class="submit"><?php _e('提交评论'); ?></button>
              </p>
          </form>
      </div>
  <?php else : ?>
    <h3><?php _e('评论已关闭'); ?></h3>
  <?php endif; ?>

<!-- 回复列表 -->

  <?php if ($comments->have()) : ?>
        <!-- 评论头部提示信息 -->
        <h4><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h4>
        <!-- 评论的内容 -->
        <?php $comments->listComments(); ?>
        <!-- 评论page -->
        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
      </div>
    </div>
  <?php endif; ?>
	  
