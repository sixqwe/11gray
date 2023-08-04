<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
/**
* Lopwon Aperture
*
* @package custom
* @author Lopwon
* @version 1.0
* @link http://www.lopwon.com
*/
?>


<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="no-js oldie" lang="zh-CN"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="zh-CN"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="zh-CN">
<!--<![endif]-->

<head>
<style> 

 html { -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; }  body { display: flex; width: auto; min-height: 100%; }  html, body { font-family: "Arial","Microsoft JhengHei",Apple LiGothic Medium,sans-serif; margin: 0; padding: 0; font-size: 62.5%; font-weight: normal; line-height: 1.2; word-wrap: break-word; box-sizing: border-box; background-color: var(--color-1); }  a { font-size: 3em; color: var(--color-a); text-decoration: none; -webkit-transition: all .3s ease-in-out; -moz-transition: all .3s ease-in-out; -ms-transition: all .3s ease-in-out; -o-transition: all .3s ease-in-out; transition: all .3s ease-in-out; }  a:hover { color: var(--color-white); outline-width: 0; }  :root { --color-black : #000000; --color-1 : #1e1e1e; --color-a : #aaaaaa; --color-white : #ffffff; }  aside { width: 25%; height: auto; min-width: 250px; color: white; background-color: var(--color-black); }  .aside { position: sticky; top: 0; left: 0; display: flex; flex-direction: column; justify-content: space-between; align-items: flex-start; height: 100vh; }  .aside div { margin: 1rem 0; padding: 0 1rem; }  .Lopwon_Aperture-title { font-size: 10em; font-weight: bolder; color: var(--color-white); writing-mode: vertical-rl; writing-mode: tb-rl; height: 100%; text-overflow: -o-ellipsis-lastline; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 1; line-clamp: 1; }  main { display: flex; flex-wrap: wrap; margin-top: 1rem; padding: 0 1rem; width: 100%; min-height: 100vh; }  .Lopwon_Aperture-item { position: relative; margin-right: 1rem; margin-bottom: 1rem; width: calc(50% - 0.5rem); }  .Lopwon_Aperture-item:nth-child(2n + 1) { margin-left: 0; }  .Lopwon_Aperture-item:nth-child(2n) { margin-right: 0; }  .Lopwon_Aperture-photos { position: relative; padding-top: calc(100% * 9/16); width: 100%; height: 0; }  .Lopwon_Aperture-photos img { position: absolute; width: 100%; height: 100%; top: 0; left: 0; object-fit: cover; overflow: hidden; }  .Lopwon_Aperture-description { display: flex; position: absolute; top: 0; left: 0; padding: 0 2rem; width: calc(100% - 4rem); height: 100%; font-size: 3.8em; color: var(--color-white); align-items: center; justify-content: center; -webkit-transition: all .3s ease-in-out; -moz-transition: all .3s ease-in-out; -ms-transition: all .3s ease-in-out; -o-transition: all .3s ease-in-out; transition: all .3s ease-in-out; overflow: hidden; opacity: 0; z-index: 1; }  .Lopwon_Aperture-description:after { position: absolute; content: ''; width: 100%; height: 100%; background-color: rgb(0 0 0 / 75%); -webkit-transition: all .3s ease-in-out; -moz-transition: all .3s ease-in-out; -ms-transition: all .3s ease-in-out; -o-transition: all .3s ease-in-out; transition: all .3s ease-in-out; opacity: 0; z-index: -1; }  .Lopwon_Aperture-item:hover .Lopwon_Aperture-description, .Lopwon_Aperture-item:hover .Lopwon_Aperture-description:after { opacity: 1; }  @media screen and (max-width: 960px) {  .Lopwon_Aperture-description { font-size: 2.8em; }  }  @media screen and (max-width: 768px) {  body { display: flex; flex-direction: column; }  aside { position:fixed; top: 0; left: 0; width: auto; height: auto; min-width: auto; background-color: transparent; }  main { position: absolute; width: 100%; box-sizing: border-box; z-index: -1; }  .Lopwon_Aperture-item { margin-right: 0; width: 100%; }  .Lopwon_Aperture-description { font-size: 2.8em; }  } </style>

<meta charset="<?php $this->options->charset(); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="shortcut icon" href="/usr/themes/11gray/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon-precomposed" href="<?php $this->options->siteUrl('AppIcon.png'); ?>" />

<title><?php $this->options->title(); ?></title>
</head>

	<body>
		<aside>
			<div class="aside">
				<div class="Lopwon_Aperture-title"><?php $this->title(); ?></div>
				<div class="Lopwon_Aperture-blog"><a
						href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a></div>
				<div class="Lopwon_Aperture-by"><a href="https://fravilion.top/index.php/album.html" target="new">the
						Theme by truttty</a></div>
			</div>
		</aside>
		<main>
			<?php preg_match_all('/\((.*?)\)\((.*?)\)/i', $this->text, $matches);foreach ($matches[1] as $key => $description) { $imgUrl = $matches[2][$key];echo '<div class="Lopwon_Aperture-item"><div class="Lopwon_Aperture-photos"><img src="'.$imgUrl.'" alt="'.$description.'" /></div><div class="Lopwon_Aperture-description">'.$description.'</div></div>'; } ?>
		</main>
	</body>

</html>