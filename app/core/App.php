<?php declare(strict_types=1);

class App{
  public function is_empty($value){
    return trim($value)=="";
  }

  public function is_array_empty($array){
    if(count($array)>0){
      return $array;
    }
    else{
      throw new Exception("Invalid array");
    }
  }

  public function findLSKWinners($winning_number,$players){
    if(empty($winning_number) || empty($players)){
      throw new Exception("No valid input given");
    }
    $winners=[];
    foreach ($players as $key => $value) {
      if($value['slot']==$winning_number){
        array_push($winners,$value['id']);
      }
    }
    return $winners;
  }

  public function validateSlotLength($slot){
    if(preg_match('/^[0-9]{3}$/', $slot)){
      return $slot;
    }
    else{
      throw new Exception("Invalid length of number");
    }
  }

  public function findLSKModWinners($winning_number,$players,$mod){
    if(empty($winning_number) || empty($players) || empty($mod)){
      throw new Exception("Invalid arguments");
    }
    switch ($mod) {
      case '1':
        if($this->validateSlotLength($winning_number)){
          $winners=[];
          $winning_number_arr = array_map('intval', str_split($winning_number));
          foreach ($players as $key => $value) {
            $value_arr = array_map('intval', str_split($value['slot']));
            if($winning_number[0]==$value_arr[0] && $winning_number[1]==$value_arr[1]){
              array_push($winners,$value['id']);
            }
          }
          return $winners;
        }
        break;
      case '2':
      if($this->validateSlotLength($winning_number)){
        $winners=[];
        $winning_number_arr = array_map('intval', str_split($winning_number));
        foreach ($players as $key => $value) {
          $value_arr = array_map('intval', str_split($value['slot']));
          if($winning_number[0]==$value_arr[0] && $winning_number[2]==$value_arr[2]){
            array_push($winners,$value['id']);
          }
        }
        return $winners;
      }
        break;
      case '3':
      if($this->validateSlotLength($winning_number)){
        $winners=[];
        $winning_number_arr = array_map('intval', str_split($winning_number));
        foreach ($players as $key => $value) {
          $value_arr = array_map('intval', str_split($value['slot']));
          if($winning_number[1]==$value_arr[1] && $winning_number[2]==$value_arr[2]){
            array_push($winners,$value['id']);
          }
        }
        return $winners;
      }
        break;
    }
  }

  public function validatePassword($password){
    if(preg_match('/((?=.*\d)(?=.*[a-z])(?=.*[A_Z])(?=.*[$,@,-,#])).*/', $password)){
      return $password;
    }
    else{
      throw new Exception("Invalid password given");
    }
  }

  public function validatUsername($username){
    if(preg_match('/\w{6,10}/', $username)){
      return $username;
    }
    else{
      throw new Exception("Invalid username given");
    }
  }

  public function findBoxGameWinner($winning_number,$players){
    $winners=[];
    $winning_number_arr=array_map('intval',str_split($winning_number));
    foreach ($players as $key => $value){
      $user_arr=array_map('intval',str_split($winning_number));
      if(count($winning_number_arr) != count($user_arr)){
        throw new Exception("Count mismatch found", 1);
      }
      sort($winning_number_arr);
      sort($user_arr);
      for($i=0;$i<count($winning_number_arr); $i++){
        if($winning_number_arr[$i] != $user_arr[$i]){
          echo "arrays are not equal";
        }
      }
      array_push($winners, $key);
    }
    print_r($winners);
  }

  public function getWinners(){
    $winners=[
      [
        [
          [
            'id'=>1,
            'name'=>'jishnu',
          ],
          [
            'id'=>6,
            'name'=>'jyothish',
          ],
        ],
        [
          [
            'id'=>4,
            'name'=>'amith',
          ],
          [
            'id'=>9,
            'name'=>'mukesh',
          ],
        ],
        [
          [
            'id'=>2,
            'name'=>'arun',
          ],
          [
            'id'=>7,
            'name'=>'rahul',
          ],
        ],
      ],
      [
          'id'=>13,
          'name'=>'rakesh',
      ],
    ];
    return $winners;
  }
}
