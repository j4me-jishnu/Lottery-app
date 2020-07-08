<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class AppTest extends TestCase{
  public static function setUpBeforeClass(): void{
  }

  protected function setUp():void{
  }

  public function testAppCanShowLSKWinners(){
    $winning_number="341";
    $players=["jishnu"=>"143","ajith"=>"123","jamshi"=>"424","arjun"=>"341"];
    $app=new App();
    $result=$app->findLSKWinners($winning_number, $players);
    $this->assertContains("arjun",$result);
  }
  public function testAppCannotShowLSKWinnersIfInvalidinput(){
    $this->expectExceptionMessage("No valid input given");
    $winning_number="";
    $players=[];
    $app=new App();
    $app->findLSKWinners($winning_number,$players);
  }
  public function testAppCanValidateSlotNumberDigits(){
    $app=new App();
    $result=$app->validateSlotLength("123");
    $this->assertEquals("123",$result);
  }
  public function testAppCannotRunIfInvalidSlotNumber(){
    $this->expectExceptionMessage("Invalid length of number");
    $app=new App();
    $app->validateSlotLength("13123");
  }
  public function testAppCanShowLSKMod1Winners(){
    $mod="1";
    $winning_number="341";
    $players=["jishnu"=>"143","ajith"=>"123","jamshi"=>"424","arjun"=>"341"];
    $app=new App();
    $result=$app->findLSKModWinners($winning_number,$players,$mod);
    $this->assertContains("arjun",$result);
  }
  public function testAppCanShowLSKMod2Winners(){
    $mod="2";
    $winning_number="341";
    $players=["jishnu"=>"143","ajith"=>"341","jamshi"=>"424","arjun"=>"343"];
    $app=new App();
    $result=$app->findLSKModWinners($winning_number,$players,$mod);
    $this->assertContains("ajith",$result);
  }
  public function testAppCanShowLSKMod3Winners(){
    $mod="3";
    $winning_number="341";
    $players=["jishnu"=>"143","ajith"=>"343","jamshi"=>"441","arjun"=>"343"];
    $app=new App();
    $result=$app->findLSKModWinners($winning_number,$players,$mod);
    $this->assertContains("jamshi",$result);
  }
  public function testAppCannotShowLSKModWinnersIfInvalidArguments(){
    $this->expectExceptionMessage("Invalid arguments");
    $app=new App();
    $app->findLSKModWinners("","","");
  }
  public function testAppCanCheckPasswordIsValid(){
    $app=new App();
    $result=$app->validatePassword("Admin123#");
    $this->assertEquals('Admin123#',$result);
  }
  public function testAppCanCheckPasswordIsNotValid(){
    $this->expectExceptionMessage("Invalid password given");
    $app=new App();
    $app->validatePassword("notvalidpassword");
  }
  public function testAppCanCheckUsernameIsValid(){
    $app=new App();
    $result=$app->validatUsername("jishnu");
    $this->assertEquals("jishnu",$result);
  }
  public function testAppCanCheckUsernameNotValid(){
    $this->expectExceptionMessage("Invalid username given");
    $app=new App();
    $app->validatUsername("ab");
  }
  public function testAppCanLoginAdmin(){
    $app=new App();
    $result=$app->adminLogin("jishnu","Admin123#");
    $this->assertEquals(true,$result);
  }
  
  protected function tearDown():void{
  }

  public static function tearDownAfterClass():void{
  }

}
