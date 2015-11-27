<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

class UsefulBlocks_Service_UsefulBlocks extends Phpfox_Service 
{

	public function getAccount($user_id)
	{

		$account = $this->database()->select("*")
			->from(Phpfox::getT('chatcontact_account'), 'ca')
			->where('ca.user_id = ' . (int) $user_id)
			->execute('getSlaveRow');
		
		return $account;
	}

	public function addSkype($user_id,$skype_account,$skype_active)
	{
		$skypeAccount = $this->database()->select("*")
			->from(Phpfox::getT('chatcontact_account'), 'ca')
			->where('ca.user_id = ' . (int) $user_id)
			->execute('getSlaveRow');
		if(count($skypeAccount) <= 0){
			$aInsert = array(
								'user_id' =>$user_id,
								'skype_account' => $skype_account,
								'skype_active ' =>(int)$skype_active,
								 );
			$this->database()->insert(Phpfox::getT('chatcontact_account'), $aInsert);
		}
		else{
			$this->database()->update(Phpfox::getT('chatcontact_account'), array('skype_account' => $skype_account, 'skype_active ' =>(int)$skype_active ),'user_id = '.$skypeAccount['user_id'] );

		}
	}

	public function addYahoo($user_id,$yahoo_account,$yahoo_active)
	{
		$yahooAccount = $this->database()->select("*")
			->from(Phpfox::getT('chatcontact_account'), 'ca')
			->where('ca.user_id = ' . (int) $user_id)
			->execute('getSlaveRow');
		if(count($yahooAccount) <= 0){
			$aInsert = array(
								'user_id' =>$user_id,
								'yahoo_account' => $yahoo_account,
								'yahoo_active ' =>(int)$yahoo_active,
								 );
			$this->database()->insert(Phpfox::getT('chatcontact_account'), $aInsert);
		}
		else{
			$this->database()->update(Phpfox::getT('chatcontact_account'), array('yahoo_account' => $yahoo_account, 'yahoo_active ' =>(int)$yahoo_active ),'user_id = '.$yahooAccount['user_id'] );

		}
	}

	public function addAim($user_id,$aim_account,$aim_active)
	{
		$aimAccount = $this->database()->select("*")
			->from(Phpfox::getT('chatcontact_account'), 'ca')
			->where('ca.user_id = ' . (int) $user_id)
			->execute('getSlaveRow');
		if(count($aimAccount) <= 0){
			$aInsert = array(
								'user_id' =>$user_id,
								'aim_account' => $aim_account,
								'aim_active ' =>(int)$aim_active,
								 );
			$this->database()->insert(Phpfox::getT('chatcontact_account'), $aInsert);
		}
		else{
			$this->database()->update(Phpfox::getT('chatcontact_account'), array('aim_account' => $aim_account, 'aim_active ' =>(int)$aim_active ),'user_id = '.$aimAccount['user_id'] );

		}
	}

	public function addMsn($user_id,$msn_account,$msn_active)
	{
		$msnAccount = $this->database()->select("*")
			->from(Phpfox::getT('chatcontact_account'), 'ca')
			->where('ca.user_id = ' . (int) $user_id)
			->execute('getSlaveRow');
		if(count($msnAccount) <= 0){
			$aInsert = array(
								'user_id' =>$user_id,
								'msn_account' => $msn_account,
								'msn_active ' =>(int)$msn_active,
								 );
			$this->database()->insert(Phpfox::getT('chatcontact_account'), $aInsert);
		}
		else{
			$this->database()->update(Phpfox::getT('chatcontact_account'), array('msn_account' => $msn_account, 'msn_active ' =>(int)$msn_active ),'user_id = '.$msnAccount['user_id'] );

		}
	}

	public function addIcq($user_id,$icq_account,$icq_active)
	{
		$icqAccount = $this->database()->select("*")
			->from(Phpfox::getT('chatcontact_account'), 'ca')
			->where('ca.user_id = ' . (int) $user_id)
			->execute('getSlaveRow');
		if(count($icqAccount) <= 0){
			$aInsert = array(
								'user_id' =>$user_id,
								'icq_account' => $icq_account,
								'icq_active ' =>(int)$icq_active,
								 );
			$this->database()->insert(Phpfox::getT('chatcontact_account'), $aInsert);
		}
		else{
			$this->database()->update(Phpfox::getT('chatcontact_account'), array('icq_account' => $icq_account, 'icq_active ' =>(int)$icq_active ),'user_id = '.$icqAccount['user_id'] );

		}
	}

		
}

?>