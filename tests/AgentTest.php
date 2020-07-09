<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class AgentTest extends TestCase{
  public static function setUpBeforeClass(): void{
  }
  protected function setUp():void{
  }

  public function testGetTestFunction(): void{
    $app=new Agent();
    $result=$app->test();
    $this->assertEquals(true,$result);
  }

  protected function tearDown():void{
  }
  public static function tearDownAfterClass():void{
  }
}
