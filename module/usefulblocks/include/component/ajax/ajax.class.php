<?php

class UsefulBlocks_Component_Ajax_Ajax extends Phpfox_Ajax
{
    public function processRequest()
    {
        Phpfox::isUser(true);
        Phpfox::getUserParam('friend.can_add_friends', true);

        if (Phpfox::getService('friend')->isFriend($this->get('user_id'), Phpfox::getUserId()))
        {
            Phpfox::getService('friend.request.process')->delete($this->get('request_id'), $this->get('user_id'));
            $this->call(' $("#usefulblock_friendrequest_' . $this->get('request_id') . '").remove();');
            return false;
        }

        $aVal = $this->get('val');
        if ($this->get('type') == 'yes')
        {
            if (Phpfox::getService('friend.process')->add(Phpfox::getUserId(), $this->get('user_id'), (isset($aVal['list_id']) ? (int) $aVal['list_id'] : 0)))
            {
                $this->call('$("#usefulblock_friendrequest_info_action_' . $this->get('request_id') . '").parent().find(".js-processing-data").hide();');
                $this->call('$("#usefulblock_friendrequest_info_action_' . $this->get('request_id') . '").parent().find(".js-confirmed").show();');
                $this->call('$("#usefulblock_friendrequest_info_action_' . $this->get('request_id') . '").remove();');
            }
        }

    }


    public function processRelationship()
    {
        Phpfox::isUser(true);

        $aRelationship = Phpfox::getService('custom.relation')->getDataById($this->get('relation_data_id'));

        if (isset($aRelationship['with_user_id']) && $aRelationship['with_user_id'] == Phpfox::getUserId())
        {
            if ($this->get('type') == 'accept')
            {
                Phpfox::getService('custom.relation.process')->updateRelationship(0, $aRelationship['user_id'], $aRelationship['with_user_id']);

                $this->call('$("#usefulblock_friendrequest_info_action_' . $this->get('request_id') . '").parent().find(".js-processing-data").hide();');
                $this->call('$("#usefulblock_friendrequest_info_action_' . $this->get('request_id') . '").parent().find(".js-confirmed").show();');
                $this->call('$("#usefulblock_friendrequest_info_action_' . $this->get('request_id') . '").remove();');
            }
        }
        else if (empty($aRelationship))
        {
            Phpfox::getService('custom.relation.process')->checkRequest($this->get('relation_data_id'));
            $this->remove('#usefulblock_friendrequest_' . $this->get('request_id'));
        }
    }
}