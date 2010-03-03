<?php
App::import('Core', 'HttpSocket');
class JsCompiler {

	private static $method = array(
		'basic' => 'WHITESPACE_ONLY',
		'simple' => 'SIMPLE_OPTIMIZATIONS',
		'advanced' => 'ADVANCED_OPTIMIZATIONS'
	);

	public static function compile($script, $type = 'simple') {
		$closureCompiler = new HttpSocket();
		$compilerParams = array(
			'compilation_level' => self::$method[$type],
			'output_format' => 'text',
			'output_info' => 'compiled_code',
			'js_code' => $script
		);
		return $closureCompiler->post('http://closure-compiler.appspot.com/compile', $compilerParams);
	}
}
