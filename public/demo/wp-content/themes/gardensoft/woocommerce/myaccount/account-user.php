<div class="account-user circle">
				<span class="image mr-half inline-block">
			<?php 
				 	$current_user = wp_get_current_user();
				 	$user_id = $current_user->ID;
					echo get_avatar( $user_id, 70 );

		    ?>
		   	</span>
		    <span class="user-name uppercase inline-block">
		    	<?php 
		    		if($current_user->user_firstname){
		    			echo $current_user->user_firstname.' '.$current_user->user_lastname;
		    		} else {
		    			echo $current_user->display_name;
		    		}
		    	?><br>
		    	<em class="user-id"><?php echo '#'.$user_id;?></em>
		    </span>
</div>