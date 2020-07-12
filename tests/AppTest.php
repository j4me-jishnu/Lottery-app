<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class AppTest extends TestCase{
  private static $app;

  public static function setUpBeforeClass(): void{
    self::$app=new App();
  }

  public function testAppCanShowLSKWinners(){
    $winning_number='125';
    $players=[
      [
        'id'=>1,
        'name'=>'Jishnu',
        'slot'=>'123'
      ],
      [
        'id'=>2,
        'name'=>'Ajith',
        'slot'=>'124'
      ],
      [
        'id'=>3,
        'name'=>'Arjun',
        'slot'=>'125'
      ]
    ];

    $result=self::$app->findLSKWinners(
      $winning_number,
      $players
    );
    $this->assertContains(
      3,
      $result
    );
  }

  public function testAppCannotShowLskWinnersIfInvalidInput(){
    $this->expectExceptionMessage('No valid input given');
    self::$app->findLSKWinners(
      '',
      []
    );
  }

  public function testAppCanValidateSlotNumberDigits(){
    $result=self::$app->validateSlotLength('123');
    $this->assertEquals(
      '123',
      $result
    );
  }

  public function testAppCannotRunIfInvalidSlotNumber(){
    $this->expectExceptionMessage('Invalid length of number');
    self::$app->validateSlotLength('13123');
  }

  public function testAppCanShowLSKMod1Winners(){
    $mod='1';
    $winning_number='341';
    $players=[
      [
        'id'=>1,
        'name'=>'jishnu',
        'slot'=>'143'
      ],
      [
        'id'=>2,
        'name'=>'ajith',
        'slot'=>'123'
      ],
      [
        'id'=>3,
        'name'=>'jamshi',
        'slot'=>'424'
      ],
      [
        'id'=>4,
        'name'=>'arjun',
        'slot'=>'341'
      ]
    ];
    $result=self::$app->findLSKModWinners($winning_number,$players,$mod);
    $this->assertContains(
      4,
      $result
    );
  }

  public function testAppCanShowLSKMod2Winners(){
    $mod='2';
    $winning_number='341';
    $players=[
      [
        'id'=>1,
        'name'=>'jishnu',
        'slot'=>'143'
      ],
      [
        'id'=>2,
        'name'=>'ajith',
        'slot'=>'341'
      ],
      [
        'id'=>3,
        'name'=>'jamshi',
        'slot'=>'424'
      ],
      [
        'id'=>4,
        'name'=>'arjun',
        'slot'=>'343'
      ],
    ];
    $result=self::$app->findLSKModWinners($winning_number,$players,$mod);
    $this->assertContains(
      2,
      $result
    );
  }

  public function testAppCanShowLSKMod3Winners(){
    $mod='3';
    $winning_number='341';
    $players=[
      [
        'id'=>1,
        'name'=>'jishnu',
        'slot'=>'143'
      ],
      [
        'id'=>2,
        'name'=>'ajith',
        'slot'=>'343'
      ],
      [
        'id'=>3,
        'name'=>'jamshi',
        'slot'=>'441'
      ],
      [
        'id'=>4,
        'name'=>'arjun',
        'slot'=>'343'
      ],
    ];
    $result=self::$app->findLSKModWinners($winning_number,$players,$mod);
    $this->assertContains(
      3,
      $result
    );
  }

  public function testAppCannotShowLSKModWinnersIfInvalidArguments(){
    $this->expectExceptionMessage('Invalid arguments');
    self::$app->findLSKModWinners('','','');
  }

  public function testAppCanCheckPasswordIsValid(){
    $result=self::$app->validatePassword('Admin123#');
    $this->assertEquals(
      'Admin123#',
      $result
    );
  }

  public function testAppCanCheckPasswordIsNotValid(){
    $this->expectExceptionMessage('Invalid password given');
    self::$app->validatePassword('notvalidpassword');
  }

  public function testAppCanCheckUsernameIsValid(){
    $result=self::$app->validatUsername('jishnu');
    $this->assertEquals(
      'jishnu',
      $result
    );
  }

  public function testAppCanCheckUsernameNotValid(){
    $this->expectExceptionMessage('Invalid username given');
    self::$app->validatUsername('ab');
  }

  public function testAppCanLoginAdmin(){
    $result=self::$app->adminLogin('jishnu','Admin123#');
    $this->assertEquals(
      true,
      $result
    );
  }

  public function testAppCanTestArrayEmptyOrNot(): void{
    $array=[
      'id'=>'1',
      'name'=>'jishnu'
    ];
    $result=self::$app->is_array_empty($array);
    $this->assertNotEquals(
      false,
      $result
    );
  }

  public function testAppReturnErrorIfNoValueInArray(){
    $this->expectExceptionMessage('Invalid array');
    $array=[];
    self::$app->is_array_empty($array);
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

}
