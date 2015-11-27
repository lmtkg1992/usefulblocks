<div id="usefullblock_friendrequest_block" class="block">
	<div class="title ">	
	{phrase var='friend.friend_requests'}
	</div>
{foreach from=$aFriends name=friends item=aFriend}
	<div class="usefulblock_friendrequest" style="height:70px;">
		<div style="margin-left:3px;float:left;width:80px;">
			{img user=$aFriend max_width='70' max_height='70' suffix='_120_square'}
		</div>
		<div style="height:100%;">
			<div class="drop_data_user">
				<div class="drop_data_action">
				</div>
				<div>
					<div style="">{$aFriend|user}</div>
					{if $aFriend.relation_data_id > 0}
                        <div class="extra_info_link">x`
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
				<div class="js_drop_data_button" style="padding-top:4px;" id="drop_down_{$aFriend.request_id}">
					<ul class="table_clear_button">
						<li><input type="button" name="" value="{phrase var='friend.add_friend'}" class="button" onclick="$(this).parents('.drop_data_action').find('.js_drop_data_add').show(); {if $aFriend.relation_data_id > 0} $.ajaxCall('custom.processRelationship', 'relation_data_id={$aFriend.relation_data_id}&amp;type=accept&amp;request_id={$aFriend.request_id}'); {else} $.ajaxCall('friend.processRequest', 'type=yes&amp;user_id={$aFriend.user_id}&amp;request_id={$aFriend.request_id}&amp;inline=true'); {/if}" /></li>
					</ul>
					<div class="clear"></div>
				</div>				
			</div>				
		</div>
	</div>
{/foreach}
</div>
{literal}
<style type="text/css">
#usefullblock_friendrequest_block .usefulblock_friendrequest{
	padding-top: 10px; 
	padding-bottom: 3px;
	border-bottom: 1px solid #f2f2f2;
}

</style>
{/literal}