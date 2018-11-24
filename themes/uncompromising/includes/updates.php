<?php
$updates = $wpdb->get_results( 
	"
	SELECT *
	FROM aud_updates
	WHERE contact_ID = $contact_ID AND ID = $ID
	ORDER BY update_ID ASC
	"
);
?>
<div class="card">
	<div class="card-header">
		Interests
		<?php if ($updates) { ?>
		<button href="#modalAddUpdate" data-toggle="modal" role="button" type="button" class="btn btn-primary btn-sm pull-right"><i class="fal fa-plus"></i> Add Interest</button>
		<?php } ?>
	</div>
	<div class="card-block">
		<div class="row skeleton">
			<div class="col-lg-4">
				<div class="skeleton-card">
					<div class="card"><div class="card-header pulse-gray-light"></div><div class="card-block"><p class="pulse-gray-lighter"></p><p class="pulse-gray-lighter"></p><p class="pulse-gray-lighter"></p><p class="pulse-gray-lighter"></p><p class="pulse-gray-lighter"></p><button class="pulse-gray-light"></button></div></div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="skeleton-card">
					<div class="card"><div class="card-header pulse-gray-light"></div><div class="card-block"><p class="pulse-gray-lighter"></p><p class="pulse-gray-lighter"></p><p class="pulse-gray-lighter"></p><p class="pulse-gray-lighter"></p><p class="pulse-gray-lighter"></p><button class="pulse-gray-light"></button></div></div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="skeleton-card">
					<div class="card"><div class="card-header pulse-gray-light"></div><div class="card-block"><p class="pulse-gray-lighter"></p><p class="pulse-gray-lighter"></p><p class="pulse-gray-lighter"></p><p class="pulse-gray-lighter"></p><p class="pulse-gray-lighter"></p><button class="pulse-gray-light"></button></div></div>
				</div>
			</div>
		</div>
<?php
if ($updates) {
echo
'
<div class="row epidermis d-none">
';
	foreach ( $updates as $update ) 
	{
	$update_ID = $update->update_ID;
	$update_type = $update->update_type;
	$size = $update->update_size;
	$update_icon_rss = '<i class="fal fa-rss"></i>';
	$update_icon_search = '<i class="fal fa-search"></i>';
	$update_icon_twitter = '<i class="fal fa-twitter"></i>';
	echo
	'
	<!-- Modal -->
	<div class="modal" id="modal' . $update_ID . '">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">' . $update->update_name . '</h4>
					<button type="button" class="btn pull-right btn-link btn-secondary" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
				</div>
				<div class="modal-body">';
					$update_URL = $update->update_URL;
					$updatelg = file_get_contents('' . home_url( '/' ) . 'wp-content/themes/uncompromising/library/rss2html/rss2html-lg.php?TEMPLATE=' . home_url( '/' ) . 'wp-content/themes/uncompromising/library/rss2html/sample-template-lg.html&XMLFILE='. urlencode($update_URL) . '');
					echo $updatelg;
				echo
				'
				</div>				
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-link" data-dismiss="modal">Close</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->' ;
	echo
	'
	<div class="col-lg-4">
		<div class="card">	
			<div class="card-header">
				' . $update->update_name . '
				<div class="float-right">
					<button href="#modal' . $update_ID . '" class="btn btn-primary btn-link" data-toggle="modal">';
						switch ($update_type) {
							case "rss":
								echo $update_icon_rss;
								break;
							case "search":
								echo $update_icon_search;
								break;
							case "twitter":
								echo $update_icon_twitter;
								break;
						}
					echo
					'
					</button>
					<div class="dropdown float-right">
						<button class="btn btn-primary btn-link dropdown-toggle dropdown-no-caret" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v"></i>
						</button>
						<div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
							<form name="form" method="post" action="' . home_url( '/' ) . 'wp-content/themes/uncompromising/db/deleteupdate.php">
								<input type="hidden" name="update_ID" value="' . $update->update_ID . '">
								<input type="hidden" name="contact_ID" value="' . $contact_ID . '">
								<button type="submit" class="btn btn-danger btn-link btn-block p-2 text-center"><i class="fal fa-trash"></i> Delete</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="card-block">
				<div class="list">
				';
					$updatesm = file_get_contents('' . home_url( '/' ) . 'wp-content/themes/uncompromising/library/rss2html/rss2html-sm.php?XMLFILE='. urlencode($update_URL) . '');
					echo $updatesm;
				echo
				'
				</div>
			</div>
			<div class="card-footer">
				<a href="#modal' . $update_ID . '" data-toggle="modal" class="btn btn-primary btn-link float-right">View More</a>
			</div>
		</div>
		<!-- /.card  -->
	</div>
	<!-- /.col -->
	';	
}
echo
'
</div>
';
}
if (empty($updates)) {
	echo
	'
	<div class="text-center py-4">
		<h5 class="mb-4">Go ahead and add some interests</h5>
		<button href="#modalAddUpdate" data-toggle="modal" role="button" type="button" class="btn btn-primary btn-sm"><i class="fal fa-plus"></i> Add Interest</button>
	</div>
	';
}
?>
 </div>
</div>