<?php declare(strict_types=1);

class App{
  private function is_empty($value){
    return trim($value)=="";
  }

  function findLSKWinners($winning_number,$players){
    if(empty($winning_number) || empty($players)){
      throw new Exception("No valid input given");
    }
    $winners=[];
    foreach ($players as $key => $value) {
      if($value==$winning_number){
        array_push($winners,$key);
      }
    }
    return $winners;
  }
  function validateSlotLength($slot){
    if(preg_match('/^[0-9]{3}$/', $slot)){
      return $slot;
    }
    else{
      throw new Exception("Invalid length of number");
    }
  }
  function findLSKModWinners($winning_number,$players,$mod){
    if(empty($winning_number) || empty($players) || empty($mod)){
      throw new Exception("Invalid arguments");
    }
    switch ($mod) {
      case '1':
        if($this->validateSlotLength($winning_number)){
          $winners=[];
          $winning_number_arr = array_map('intval', str_split($winning_number));
          foreach ($players as $key => $value) {
            $value_arr = array_map('intval', str_split($value));
            if($winning_number[0]==$value_arr[0] && $winning_number[1]==$value_arr[1]){
              array_push($winners,$key);
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
          $value_arr = array_map('intval', str_split($value));
          if($winning_number[0]==$value_arr[0] && $winning_number[2]==$value_arr[2]){
            array_push($winners,$key);
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
          $value_arr = array_map('intval', str_split($value));
          if($winning_number[1]==$value_arr[1] && $winning_number[2]==$value_arr[2]){
            array_push($winners,$key);
          }
        }
        return $winners;
      }
        break;
    }
  }
  function validatePassword($password){
    if(preg_match('/((?=.*\d)(?=.*[a-z])(?=.*[A_Z])(?=.*[$,@,-,#])).*/', $password)){
      return $password;
    }
    else{
      throw new Exception("Invalid password given");
    }
  }
  function validatUsername($username){
    if(preg_match('/\w{6,10}/', $username)){
      return $username;
    }
    else{
      throw new Exception("Invalid username given");
    }
  }
  function adminLogin($username,$password){
    if($this->validatUsername($username) && $this->validatePassword($password)){
      return true;
    }
  }
  function findBoxGameWinner($winning_number,$players){
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
}
