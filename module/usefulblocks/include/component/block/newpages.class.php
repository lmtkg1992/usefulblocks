<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

class UsefulBlocks_Component_Block_NewPages extends Phpfox_Component
{
    /**
     * Class process method wnich is used to execute this component.
     */
    public function process()
    {
        $aPages = array();

        $this->template()->assign(array(
                '$aPages' => $aPages
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