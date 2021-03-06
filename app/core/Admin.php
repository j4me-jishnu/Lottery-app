<?php declare(strict_types=1);

class Admin extends App{
  public function adminLogin($username,$password){
    if($this->validatUsername($username) && $this->validatePassword($password)){
      return true;
    }
  }

  public function addAgent($agent_details){
    if($this->is_array_empty($agent_details)){
      return $agent_details;
    }
  }

  public function changeAgentPassword($id, $new_password){
    if(empty($id) && empty($new_password)){
        throw new Exception("Invalid input");
    }
    return true;
  }

  public function deleteAgent($id){
    if(empty($id)){
      throw new Exception("Invalid input");
    }
    return true;
  }

  public function blockAgent($agent_id){
    if($this->is_empty($agent_id)){
      throw new Exception("Invalid agent id");
    }
    return $agent_details["status"]=false;
  }

  public function lockSlot($slot){
    if($this->validateSlotLength($slot)){
      return $slot;
    }
  }

  public function setMaxPlayerLimit($lim){
    if(empty($lim)){
      throw new Exception('Invalid input');
    }
    return $game['player_limit']=$lim;
  }

  public function setMaxSlotForPlayer($lim){
    if(empty($lim)){
      throw new Exception('Invalid input');
    }
    return $game['player_slot_lim']=$lim;
  }

  public function getAgentDailyCollectionByDate($agent_id, $date){
    if($this->is_empty($agent_id) || $this->is_empty($date)){
      throw new Exception("Invalid date or agent");
    }
    $agent_collection_data=["agent_id"=>"1","date"=>"2020-07-08","total_collection"=>"2562"];
    if($agent_id==$agent_collection_data["agent_id"]&&$date==$agent_collection_data["date"]){
      return $agent_collection_data["total_collection"];
    }
  }

  public function addAgentPayment($id, $amount){
    if(empty($id) || empty($amount)){
      throw new Exception('Invalid input');
    }
    return $amount;
  }

  public function getSingleAgentPaymentDetails($id){
    if(empty($id)){
      throw new Exception('Invalid ID');
    }
    return $agt_pmt_dtls=[
        'id'=>1,
        'last_payment'=>25000,
        'total_due'=>15000,
        'total_paid'=>10000,
      ];
  }
}
