<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

class UsefulBlocks_Component_Block_People_You_May_Know extends Phpfox_Component 
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		list($iCnt, $aUsers) = Phpfox::getService('friend.request')->get();
		
		if($iCnt == 0){
			return false;
		}

		$this->template()->assign(array(
				'aUsers' => $aUsers
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