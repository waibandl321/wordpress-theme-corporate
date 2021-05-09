<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <title><?php wp_title('｜', true, 'right'); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
	<div class="inner">
    <div class="header-top">
		    <div class="front-menu__icon">
				<span></span><span></span><span></span>
			</div>
		   <div>
			   	<a href="<?php echo get_home_url(); ?>"><img src="https://dev.freelance321.com/vaboo/wp-content/uploads/2021/05/front-vaboo_logo_white.png"></a>
		   </div>
        <nav class="header-top-nav">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'global'
                    )
                ); ?>
        </nav>
    </div>
	</div>
</header>
<!-- スマホ用メニュー -->
<nav class="front-nav js-nav">
	<?php wp_nav_menu(
		array(
			'theme_location' => 'global'
		)
	); ?>
</nav>
<!-- トップページ用 ページ内リンク -->
<nav class="top-page-nav">
	<ul>
		<?php wp_nav_menu(
			array(
				'theme_location' => 'global'
			)
		); ?>
	</ul>
</nav>