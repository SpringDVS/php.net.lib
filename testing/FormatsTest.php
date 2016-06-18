<?php
use SpringDvs\NodeService;

include 'auto.php';

class FormatsTest extends PHPUnit_Framework_TestCase {

	public function testNodeSingle_FromStr_Pass() {
		$fmt = SpringDvs\NodeSingleFmt::fromStr("spring");
		$this->assertEquals($fmt->spring(), "spring" );
	}
	
	public function testNodeSingle_ToStr_Pass() {
		$fmt = SpringDvs\NodeSingleFmt::fromStr("spring");
		ob_start();
		$fmt->toStr();
		$this->assertEquals(ob_get_clean(), "spring" );
	}
	
	
	public function testNodeDouble_FromStr_Pass() {
		$fmt = SpringDvs\NodeDoubleFmt::fromStr("spring,host");
		$this->assertEquals($fmt->spring(), "spring" );
		$this->assertEquals($fmt->host(), "host" );
	}
	
	public function testNodeDouble_ToStr_Pass() {
		$fmt = SpringDvs\NodeDoubleFmt::fromStr("spring,host");
		ob_start();
		$fmt->toStr();
		$this->assertEquals(ob_get_clean(), "spring,host" );
	}
	
	public function testNodeDouble_FromStr_Fail() {
		$this->setExpectedException('\SpringDvs\ParseFailure');
		$fmt = SpringDvs\NodeDoubleFmt::fromStr("spring,host,blah");
	}

	
	public function testNodeTriple_FromStr_Pass() {
		$fmt = SpringDvs\NodeTripleFmt::fromStr("spring,host,127.0.0.1");
		$this->assertEquals($fmt->spring(), "spring" );
		$this->assertEquals($fmt->host(), "host" );
		$this->assertEquals($fmt->address(), "127.0.0.1" );
	}
	
	public function testNodeTripe_ToStr_Pass() {
		$fmt = SpringDvs\NodeTripleFmt::fromStr("spring,host,127.0.0.1");
		ob_start();
		$fmt->toStr();
		$this->assertEquals(ob_get_clean(), "spring,host,127.0.0.1" );
	}
	
	public function testNodeTriple_FromStr_Fail() {
		$this->setExpectedException('\SpringDvs\ParseFailure');
		$fmt = SpringDvs\NodeTripleFmt::fromStr("spring,host");
	}



	public function testNodeQuad_FromStr_Pass() {
		$fmt = SpringDvs\NodeQuadFmt::fromStr("spring,host,127.0.0.1,http");
		$this->assertEquals($fmt->spring(), "spring" );
		$this->assertEquals($fmt->host(), "host" );
		$this->assertEquals($fmt->address(), "127.0.0.1" );
		$this->assertEquals($fmt->service(), NodeService::Http );
	}
	
	public function testNodeQuad_ToStr_Pass() {
		$fmt = SpringDvs\NodeQuadFmt::fromStr("spring,host,127.0.0.1,http");
		ob_start();
		$fmt->toStr();
		$this->assertEquals(ob_get_clean(), "spring,host,127.0.0.1,http" );
	}
	
	public function testNodeQuad_FromStr_Fail() {
		$this->setExpectedException('\SpringDvs\ParseFailure');
		$fmt = SpringDvs\NodeQuadFmt::fromStr("spring,host");
	}
}