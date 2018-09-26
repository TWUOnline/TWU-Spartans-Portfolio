jQuery(document).ready(function($) {

	/**
	 *	Process request to dismiss our admin notice
	 */
	$('#twu-spartans-notice .notice-dismiss').click(function() {

		//* Data to make available via the $_POST variable
		data = {
			action: 'twu_spartans_admin_notice',
			twu_spartans_admin_nonce: twu_spartans_admin.twu_spartans_admin_nonce
		};

		//* Process the AJAX POST request
		$.post( ajaxurl, data );

		return false;
	});
});