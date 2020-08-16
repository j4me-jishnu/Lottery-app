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

  public function getAgentDailyCollectionByDate($agent_id, $date){
    if($this->is_empty($agent_id) || $this->is_empty($date)){
      throw new Exception("Invalid date or agent");
    }
    $agent_collection_data=["agent_id"=>"1","date"=>"2020-07-08","total_collection"=>"2562"];
    if($agent_id==$agent_collection_data["agent_id"]&&$date==$agent_collection_data["date"]){
      return $agent_collection_data["total_collection"];
    }
  }

  public function createAgentCreds($username,$pass){
    if($this->validatUsername($username) && $this->validatePassword($pass)){
      return true;
    }
  }
}
