<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class AdminTest extends TestCase{
  private static $app;

  public static function setUpBeforeClass(): void{
    self::$app=new Admin();
  }

  public function testAppCanLoginAdmin(){
    $result=self::$app->adminLogin('jishnu','Admin123#');
    $this->assertEquals(
      true,
      $result
    );
  }

  public function testAppCanAddAgent(): void{
    $agent_details=[
        'id'=>1,
        'name'=>'jishnu',
        'username'=>'j4mejishnu@yahoo.com',
        'password'=>'123',
      ];
    $result=self::$app->addAgent($agent_details);
    $this->assertNotEquals(
      false,
      $result
    );
  }

  public function testAppCanChangeAgentPassword(): void{
    $data=[
      'id'=>1,
      'name'=>'Arun',
      'username'=>'Arun123@yahoo.com',
      'password'=>'324',
    ];
    $new_password='Password123$';
    $result=self::$app->changeAgentPassword($data['id'], $new_password);
    $this->assertEquals(
      true,
      $result
    );
  }

  public function testAppCannotChangePasswordIfInvalidInput(): void{
    $this->expectExceptionMessage("Invalid input");
    self::$app->changeAgentPassword('','');
  }

  public function testAppCanDeleteAgent(): void{
    $id=1;
    $result=self::$app->deleteAgent($id);
    $this->assertEquals(true,$result);
  }

  public function testAppCannotDeleteAgentIfInvalidId(): void{
    $this->expectExceptionMessage("Invalid input");
    self::$app->deleteAgent('');
  }

  public function testAppCanBlockAgent(): void{
    $result=self::$app->blockAgent('1');
    $this->assertEquals(
      false,
      $result
    );
  }

  public function testAppCannotRunIfInvalidAgentId(){
    $this->expectExceptionMessage('Invalid agent id');
    self::$app->blockAgent('');
  }

  public function testAppCanLockSlot(): void{
    $result=self::$app->lockSlot('123');
    $this->assertEquals(
      '123',
      $result
    );
  }

  public function testAppCannotlockSlotIfInvalidSlot(): void{
    $this->expectExceptionMessage('Invalid length of number');
    self::$app->lockSlot('');
  }

  public function testAppCanSetMaxPlayerLimit(): void{
    $result=self::$app->setMaxPlayerLimit(15);
    $this->assertNotEquals(false,$result);
  }

  public function testAppCannotSetMaxPlayerLimitIfNoInput(): void{
    $this->expectExceptionMessage('Invalid input');
    self::$app->setMaxPlayerLimit('');
  }

  public function testAppCanSetMaxSlotForPlayer(): void{
    $result=self::$app->setMaxSlotForPlayer(10);
    $this->assertNotEquals(false,$result);
  }

  public function testAppCannotSetMaxSlotIfNoInput(): void{
    $this->expectExceptionMessage("Invalid input");
    self::$app->setMaxSlotForPlayer('');
  }

  public function testAppCanShowAgentCollectionByDate(): void{
    $result=self::$app->getAgentDailyCollectionByDate('1','2020-07-08');
    $this->assertEquals(
      '2562',
      $result
    );
  }

  public function testAppCannotShowAgentCollectionByDateIfInvalidData(): void{
    $this->expectExceptionMessage('Invalid date or agent');
    self::$app->getAgentDailyCollectionByDate(
      '',
      '2020-02-21'
    );
  }

  public function testAppCanAddAgentPayment(): void{
    $result=self::$app->addAgentPayment('1','1500');
    $this->assertNotEquals(
      false,
      $result
    );
  }

  public function testAppCannotAddPaymentIfInvalidInput(): void{
    $this->expectExceptionMessage("Invalid input");
    self::$app->addAgentPayment('','');
  }

  public function testAppShowSingleAgentPmtDetails(): void{
    $result=self::$app->getSingleAgentPaymentDetails(1);
    $this->assertNotEquals(
      false,
      $result
    );
  }

  public function testAppCannotShowAgentPmtDetailsIfInvalidId(): void{
    $this->expectExceptionMessage("Invalid ID");
    self::$app->getSingleAgentPaymentDetails('');
  }
}
