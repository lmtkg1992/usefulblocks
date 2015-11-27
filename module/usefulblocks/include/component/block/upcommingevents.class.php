<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

class UsefulBlocks_Component_Block_Upcommingevents extends Phpfox_Component
{
    /**
     * Class process method wnich is used to execute this component.
     */
    public function process()
    {
        $aUpcommingEvents = array();

        $this->template()->assign(array(
                'aUpcommingEvents' => $aUpcommingEvents
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