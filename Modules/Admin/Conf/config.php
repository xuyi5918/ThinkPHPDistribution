<?php
return array(
	'VAR_FILTERS'=>'htmlspecialchars',
	// 'TOKEN_ON'=>true,
	// 'TOKEN_NAME'=>'__hash__',
	// 'TOKEN_TYPE'=>'md5',
	// 'TOKEN_RESET'=>true,
	'TMPL_PARSE_STRING' =>array(
		'__PUB__'=>__ROOT__.'/Public/Admin/',
		'__ROOTPUB__'=>__ROOT__.'/Public/',
	),
	/* Cookie设置 */
    'COOKIE_EXPIRE'         => 0,    // Coodie有效期
    'COOKIE_DOMAIN'         => '',      // Cookie有效域名
    'COOKIE_PATH'           => '/',     // Cookie路径
    'COOKIE_PREFIX'         => 'MyAdmin_',      // Cookie前缀 避免冲突
	'SESSION_PREFIX'        => 'MyAdmin_', // session 前缀
);
?>