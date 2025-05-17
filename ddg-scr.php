<?php
/*

Plugin Name: Shortcode Pre-Directions by DDG - site go-studio.pro
Plugin URI: none
Description: Этот плагин позволяет вам добавлять шорткод на страницу. При выполнении этого шорткода он перенаправляет пользователя на предопределенный URL. Вы также можете установить, сколько секунд ждать перед перенаправлением пользователя. Код для копирования [redirect url='тут ссылка на страницу' sec='3'] вставляется в любое поля с текстом или в шорткод elementor
Author: Dankov Dorel
Version: 1.0 : 15.03.25

*/
add_shortcode('redirect', 'ddg_scr_do_redirect');
function ddg_scr_do_redirect($atts)
{
	ob_start();
	$myURL = (isset($atts['url']) && !empty($atts['url']))?esc_url($atts['url']):"";
	$mySEC = (isset($atts['sec']) && !empty($atts['sec']))?esc_attr($atts['sec']):"0";
	if(!empty($myURL))
  {
?>
		<meta http-equiv="refresh" content="<?php echo $mySEC; ?>; url=<?php echo $myURL; ?>">
		Пожалуйста, подождите 5 секунд, пока вас перенаправят обратно на сайт… или <a href="<?php echo $myURL; ?>">нажмите здесь,</a> если вы не хотите ждать.
<?php
	}
	return ob_get_clean();
}

?>