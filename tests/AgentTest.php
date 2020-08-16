<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class AgentTest extends TestCase{
  private static $app;

  public static function setUpBeforeClass(): void{
    self::$app=new Agent();
  }

  public function testAgentLogin(): void{
    $result=self::$app->agentLogin("Agent123#","Agent123#");
    $this->assertEquals(true,$result);
  }

  public function testAppCanAddPlayer(): void{
    $player=[
      'id'=>'1',
      'name'=>'jishnu',
      'mobile'=>'8086706022'
    ];
    $result=self::$app->addPlayer($player);
    $this->assertEquals(true,$result);
  }

  public function testAppCannotAddPlayerIfEmptyInputs(): void{
    $this->expectExceptionMessage("Provide valid inputs");
    $player=[
      'id'=>'1',
      'name'=>'',
      'mobile'=>''
    ];
    $result=self::$app->addPlayer($player);
  }

  public function testCanSearchPlayers(): void{
    $result=self::$app->searchPlayers('jishnu');
    $this->assertEquals(1,$result);
  }

  public function testCannotSearchPlayersIfNoSearchKey(): void{
    $this->expectExceptionMessage("No valid search key given");
    self::$app->searchPlayers('');
  }

  public function testCanAddCustomerPayment(): void{
    $result=self::$app->addCustomerPayment(1,10);
    $this->assertNotEquals(false,$result);
  }

  public function testCannotAddPaymentIfInvalidPaymentDetails():void{
    $this->expectExceptionMessage('Invalid payment details');
    self::$app->addCustomerPayment('',1500);
  }

  public function testCanDeleteCustomer(): void{
    $result=self::$app->deleteCustomer('2');
    $this->assertNotEquals(false,$result);
  }

  public function testCannotdeleteCustomerIfNoId(): void{
    $this->expectExceptionMessage('Invalid ID given');
    self::$app->deleteCustomer('');
  }

  public function testCanGetTodayWinnersLSK(): void{
    $result=self::$app->showWinningReportLSK(date('Y-m-d'));
    $this->assertNotEquals(false,$result);
  }

  public function testCannotShowWinnersIfInvalidDate(): void{
    $this->expectExceptionMessage('Invalid date');
    self::$app->showWinningReportLSK('');
  }

  public function testCanGetPlayerDetails(): void{
    $result=self::$app->getPlayerDetails('1');
    $this->assertNotEquals(false,$result);
  }

  public function testCannotGetPlayerDetailsIfInvalidId(): void{
    $this->expectExceptionMessage("Invalid id");
    self::$app->getPlayerDetails('');
  }

  public function testCanGetAllPlayers(): void{
    $result=self::$app->getAllPlayers();
    $this->assertNotEquals(false,$result);
  }

}
