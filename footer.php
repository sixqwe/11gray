<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
</div>
</div>
</main><!-- end #body -->


<footer id="footer">

<style>#a{color: black;font-size: 1em;}#footer{text-align:center;padding-top: 1em;height: 2em;width:auto;backdrop-filter:blur(10px)}</style>





<!-- 底部 -->
<span>
© 2022-<?php echo date('Y'); ?> <a id="a" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>&nbsp;丨 
    <?php _e('由 <a id="a" href="http://www.typecho.org">Typecho</a> 强力驱动'); ?> 丨 已运行 <b id="blog_running_days"></b> days 丨 积累码字: <b><?php  echo allOfCharacters(); ?></b>
</span>

<script>
var blog_running_days=document.getElementById("blog_running_days");
function refresh_blog_running_time(){
 var time = new Date() - new Date(2022, 1, 15);
 var d=parseInt(time/24/60/60/1000);
 blog_running_days.innerHTML=d;
}
refresh_blog_running_time();
if (typeof(bottomTimeIntervalHasSet) == "undefined"){
 var bottomTimeIntervalHasSet = true;
 setInterval(function(){refresh_blog_running_time();},500);
}
</script>




</footer><!-- end #footer -->

<?php $this->footer(); ?>
<script data-no-instant>InstantClick.init();</script>
</body>
</html>



