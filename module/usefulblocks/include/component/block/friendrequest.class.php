<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

class UsefulBlocks_Component_Block_FriendRequest extends Phpfox_Component 
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		list($iCnt, $aFriends) = Phpfox::getService('friend.request')->get();

		if($iCnt == 0){
			return false;
		}
		$this->template()->assign(array(
				'aFriends' => $aFriends
			)
		);
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{

	}
}

?>