<?php declare(strict_types=1);

class Agent extends App{
  public function agentLogin($username,$password){
    if($this->validatUsername($username) && $this->validatePassword($password)){
      return true;
    }
  }

  public function savePlayerBill($bill_data){
    if(empty($bill_data['player_name']) &&
    empty($bill_data['mode']) &&
    empty($bill_data['sub_mode']) &&
    empty($bill_data['slot_no']) &&
    empty($bill_data['count'])){
    throw new Exception('Invalid input given');
    }
    return $bill_data;
  }

  public function searchPlayers($search_key){
    if(empty($search_key)){
      throw new Exception("No valid search key given");
    }
    $players=[
      [
        'id'=>'1',
        'name'=>'jishnu',
      ],
      [
        'id'=>'2',
        'name'=>'Ajith',
      ],
      [
        'id'=>'3',
        'name'=>'Allen',
      ],
    ];
    foreach($players as $player){
      if($player['name']==$search_key){
        return $player['id'];
      }
    }
  }

  public function addPlayer($player){
    if(empty($player['id'])||empty($player['name'])||empty($player['mobile'])){
      throw new Exception("Provide valid inputs", 1);
    }
    return true;
  }

  public function addCustomerPayment($id,$amount){
    if(empty($id)||empty($amount)){
      throw new Exception("Invalid payment details");
    }
    $customers=[
      [
        'id'=>1,
        'name'=>'JISHNU',
        'payment_due'=>800,
        'payment_total'=>1000,
        'payment_paid'=>200,
      ],
      [
        'id'=>2,
        'name'=>'AJITH',
        'payment_due'=>1200,
        'payment_total'=>3000,
        'payment_paid'=>1800,
      ],
    ];
    foreach($customers as $customer) {
      if($customer['id']==$id){
        $customer['payment_due']=$customer['payment_due']-$amount;
        $customer['payment_paid']=$customer['payment_paid']+$amount;
        return $customer;
      }
    }

  }

  public function deleteCustomer($id){
    if(empty($id)){
      throw new Exception("Invalid ID given");
    }
    $customers=[
      [
          'id'=>1,
          'name'=>'JISHNU'
      ],
      [
        'id'=>2,
        'name'=>'AJITH'
      ],
      [
        'id'=>3,
        'name'=>'BINEESH'
      ],
    ];
    for($i=0;$i<count($customers);$i++){
      if($customers[$i]['id']==$id){
        unset($customers[$i]);
        unset($customers[$i]);
      }
    }
    return $customers;
  }

  public function showWinningReportLSK($date){
    if(empty($date)){
      throw new Exception("Invalid date");
    }
    $winners=[
      [
        'id'=>1,
        'name'=>'JISHNU',
        'slot'=>'325',
        'slot_count'=>10,
        'date'=>'2020-07-25'
      ],
      [
        'id'=>1,
        'name'=>'AMAL',
        'slot'=>'325',
        'slot_count'=>5,
        'date'=>'2020-07-24'
      ],
      [
        'id'=>1,
        'name'=>'MANOJ',
        'slot'=>'325',
        'slot_count'=>20,
        'date'=>'2020-07-25'
      ],
    ];
    $winners_today=[];
    foreach ($winners as $winner){
      if($winner['date']==date('Y-m-d')){
        array_push($winners_today,$winner);
      }
    }
    return $winners_today;
  }

  public function getPlayerDetails($id){
    if(empty($id)){
      throw new Exception("Invalid id");
    }
    $players=[
      [
        'id'=>1,
        'name'=>'JISHNU',
        'total_payment_due'=>1300,
        'total_payment_done'=>200,
        'total_cost'=>1500,
      ],
      [
        'id'=>2,
        'name'=>'ALLEN',
        'total_payment_due'=>700,
        'total_payment_done'=>1500,
        'total_cost'=>2200,
      ],
      [
        'id'=>3,
        'name'=>'SAJITH',
        'total_payment_due'=>300,
        'total_payment_done'=>1600,
        'total_cost'=>1900,
      ],
    ];
    foreach($players as $player){
      if($player['id']==$id){
        return $player;
      }
    }
  }

  public function getAllPlayers(){
    $players=[
      [
        'id'=>1,
        'name'=>'JISHNU',
      ],
      [
        'id'=>2,
        'name'=>'NIKHIL',
      ],
      [
        'id'=>3,
        'name'=>'MUNEER',
      ],
      [
        'id'=>4,
        'name'=>'RAHEEM',
      ],
      [
        'id'=>5,
        'name'=>'MANOJ',
      ],
      [
        'id'=>6,
        'name'=>'ARAVIND',
      ]
    ];
    return $players;
  }
}
