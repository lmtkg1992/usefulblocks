<div id="usefullblock_friendrequest_block" class="block">
	<div class="title ">	
	{phrase var='friend.friend_requests'}
	</div>
{foreach from=$aFriends name=friends item=aFriend}
	<div class="usefulblock-friendrequest" id="usefulblock_friendrequest_{$aFriend.request_id}">
		<div class="usefulblock-friendrequest-image">
			{img user=$aFriend max_width='70' max_height='70' suffix='_120_square'}
		</div>
		<div class="usefulblock-friendrequest-info" >
				<div class="usefulblock-friendrequest-info-name">
					<div style="">{$aFriend|user}</div>
                    {if $aFriend.relation_data_id > 0}
                    <div class="extra_info_link">
                        {img theme='misc/heart.png' class='v_middle'} {phrase var='friend.relationship_request'}
                    </div>
                    {else}
                    {if isset($aFriend.mutual_friends) && $aFriend.mutual_friends.total > 0}
                    <div class="extra_info_link">
                        <a href="#" onclick="$Core.box('friend.getMutualFriends', 300, 'user_id={$aFriend.friend_user_id}'); return false;">
                            {if $aFriend.mutual_friends.total == 1}
                            {phrase var='friend.1_mutual_friend'}
                            {else}
                            {phrase var='friend.total_mutual_friends' total=$aFriend.mutual_friends.total}
                            {/if}
                        </a>
                    </div>
                    {/if}
                    {/if}
				</div>
				<div class="usefulblock-friendrequest-info-action">
                    <input type="button"  id="usefulblock_friendrequest_info_action_{$aFriend.request_id}"   name="" value="{phrase var='friend.confirm'}" class="button" onclick="$(this).parents('.usefulblock-friendrequest-info-action').find('.js-processing-data').show(); {if $aFriend.relation_data_id > 0} $.ajaxCall('usefulblocks.processRelationship', 'relation_data_id={$aFriend.relation_data_id}&amp;type=accept&amp;request_id={$aFriend.request_id}'); {else} $.ajaxCall('usefulblocks.processRequest', 'type=yes&amp;user_id={$aFriend.user_id}&amp;request_id={$aFriend.request_id}&amp;inline=true'); {/if}" />
                    <div class="js-processing-data" style="display:none;">
                        {img theme='ajax/add.gif'}
                    </div>
                    <div class="js-confirmed" style="display:none;">
                        {phrase var='friend.confirmed'}
                    </div>
                </div>
		</div>
	</div>
{/foreach}
</div>
{literal}
<style type="text/css">
#usefullblock_friendrequest_block .usefulblock-friendrequest{
	padding-top: 10px; 
	padding-bottom: 3px;
	border-bottom: 1px solid #f2f2f2;
    height: 70px;
}
.usefulblock-friendrequest-image{
    margin-left:3px;float:left;width:80px;
}
.usefulblock-friendrequest-info{
    height:100%;
}
.usefulblock-friendrequest-info-action{
    padding-top: 3px;
}

.usefulblock-friendrequest-info-action .js-confirmed{
    font-weight: bold;
}
</style>
{/literal}