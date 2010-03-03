<?php
App::import('Lib', 'Asset.JsCompiler');

class AssetTestCase extends CakeTestCase {

	function testCompile() {
		$script = 'function hello() {var longName = confirm("message")}';
		$result = JsCompiler::compile($script);
		$expected = 'function hello(){var a=confirm("message")};' . "\n";
		$this->assertEqual($result, $expected);
	}
}
