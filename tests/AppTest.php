<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class AppTest extends TestCase{
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

  public function testAppCanTestArrayEmptyOrNot(): void{
    $app=new app();
    $array=["1","jishnu"];
    $result=$app->is_array_empty($array);
    $this->assertNotEquals(false,$result);
  }

  public function testAppReturnErrorIfNoValueInArray(){
    $this->expectExceptionMessage("Invalid array");
    $app=new app();
    $array=[];
    $app->is_array_empty($array);
  }

  public function testAppCanAddAgent(): void{
    $app=new App();
    $agent_details=["id"=>"1", "name"=>"jishnu", "username"=>"jemejishnu@yahoo.com", "password"=>"123"];
    $result=$app->addAgent($agent_details);
    $this->assertNotEquals(false,$result);
  }

  public function testAppCanBlockAgent(): void{
    $app=new App();
    $result=$app->blockAgent("1");
    print_r($result);
    $this->assertEquals(false, $result);
  }

  public function testAppCannotRunIfInvalidAgentId(){
    $this->expectExceptionMessage("Invalid agent id");
    $app=new App();
    $app->blockAgent("");
  }

  public function testAppCanLockSlot(): void{
    $app=new App();
    $result=$app->lockSlot("123");
    $this->assertEquals("123",$result);
  }

  public function testAppCannotlockSlotIfInvalidSlot(): void{
    $this->expectExceptionMessage("Invalid length of number");
    $app=new App();
    $app->lockSlot("");
  }

  public function testAppCanShowAgentCollectionByDate(): void{
    $app=new App();
    $result=$app->getAgentDailyCollectionByDate("1","2020-07-08");
    $this->assertEquals("2562",$result);
  }

  public function testAppCannotShowAgentCollectionByDateIfInvalidData(): void{
    $this->expectExceptionMessage("Invalid date or agent");
    $app=new App();
    $app->getAgentDailyCollectionByDate("","2020-02-21");
  }

}
