<?php
/**
 * 我个人专用的主题。技术不高请见谅。
 *
 * @package 11gray
 * @author 弎仟
 * @version 0.1
 * @link http://fravilion.top
 */
$this->need('header.php');
$this->need('sidebar.php');
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/** 文章置顶 */
$sticky = '141'; //置顶的文章id，多个用|隔开
if($sticky){
    $sticky_cids = explode('|',$sticky); //分割文本
    $sticky_html = "<span style='color:#742820'>[ↈ] </span>"; //置顶标题的 html

    $db = Typecho_Db::get();
    $pageSize = $this->options->pageSize;
    $select1 = $this->select()->where('type = ?', 'post');
    $select2 = $this->select()->where('type = ? && status = ? && created < ?', 'post','publish',time());

    //清空原有文章的列队
    $this->row = [];
    $this->stack = [];
    $this->length = 0;

    $order = '';
    foreach($sticky_cids as $i => $cid) {
        if($i == 0) $select1->where('cid = ?', $cid);
        else $select1->orWhere('cid = ?', $cid);
        $order .= " when $cid then $i";
        $select2->where('table.contents.cid != ?', $cid); //避免重复
    }
    if ($order) $select1->order('', "(case cid$order end)"); //置顶文章的顺序 按 $sticky 中 文章ID顺序
    if (($this->_currentPage || $this->currentPage) == 1) foreach($db->fetchAll($select1) as $sticky_post){ //首页第一页才显示
        $sticky_post['sticky'] = $sticky_html;
        $this->push($sticky_post); //压入列队
    }

    $uid = $this->user->uid; //登录时，显示用户各自的私密文章
    if($uid) $select2->orWhere('authorId = ? && status = ?',$uid,'private');

    $sticky_posts = $db->fetchAll($select2->order('table.contents.created', Typecho_Db::SORT_DESC)->page($this->_currentPage, $this->parameter->pageSize));
    foreach($sticky_posts as $sticky_post) $this->push($sticky_post); //压入列队
    $this->setTotal($this->getTotal()-count($sticky_cids)); //置顶文章不计算在所有文章内
}
?>
<style>#newpost .newpost{text-decoration:none;display:block;color:var(--info-black)}#newpost .posthr{border-top:2px solid}.newpost div{font-size:24px;font-weight:bold;transition:0.2s ease}.newpost:not(.cssgrid-collection):hover div{color:white !important;background:var(--info-black)}#newpost .post-meta{font-size:10px}</style>
<br><br>

<div class="col-mb-12 col-8" id=" main" role="main">
	<div id="newpost">
		<?php while($this->next()): ?>
		<a class="newpost" href="<?php $this->permalink() ?>">
			<div class="posthr"><?php $this->sticky() ?><?php $this->title() ?></div>
			<p class="post-meta"><?php $this->category(','); ?> on<?php $this->date('F j, Y'); ?>.<?php Postviews($this); ?>.<?php $this->commentsNum('%d 评论'); ?>.</p>
			<p> <?php $this->content(''); ?></p>
		</a>
		<br>
		<?php endwhile; ?>
	</div>
</div>
















<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main-->
<?php $this->need('footer.php'); ?>
