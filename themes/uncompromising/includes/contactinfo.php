<?php
$addresses = $wpdb->get_results( 
	"
	SELECT *
	FROM aud_address
	WHERE contact_ID = $contact_ID AND ID = $ID
	"
);
$contactinfos = $wpdb->get_results( 
	"
	SELECT * 
		FROM aud_contactinfo
		WHERE contact_ID = $contact_ID
		AND ID = $ID
		ORDER BY contactinfo_type DESC 
	"
);
?>
<div class="card">
	<div class="card-header">
		Contact Info
		<?php if ($addresses || $contactinfos) { ?>
		<button href="#modalAddContactInfo" data-toggle="modal" role="button" type="button" class="btn btn-primary btn-sm pull-right"><i class="fal fa-plus"></i> Add Contact</button>
		<?php } ?>
	</div>
	<div class="card-block">
<?php
if ($addresses) {

echo '
<table>
	<tbody>
';

foreach ( $addresses as $address ) 
{
$address_1 = $address->address_1;
$address_2 = $address->address_2;
$address_city = $address->address_city;
$address_state = $address->address_state;
$address_zip = $address->address_zip;
$address_ID = $address->address_ID;
$address_contact_ID = $address->contact_ID;

echo '
		<tr>
			<td width="95%">
				'.$address_1.' '.$address_2.'
				<br />
				'.$address_city.' '.$address_state.' '.$address_zip.'
			</td>
			<td width="5%">
				<div class="dropdown item-end">
					<button class="btn btn-link btn-secondary dropdown-toggle dropdown-no-caret float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-ellipsis-v"></i>
					</button>
					<div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
							<form name="form" method="post" action="' . home_url( '/' ) . 'wp-content/themes/uncompromising/db/deleteaddress.php">
							<input type="hidden" name="address_ID" value="' . $address_ID . '">
							<input type="hidden" name="contact_ID" value="' . $address_contact_ID . '">
							<button type="submit" class="btn btn-link btn-danger"><i class="fal fa-trash"></i> Delete</button>
						</form>
					</div>
				</div>
			</td>
		</tr>
';
	
}
echo '
	</tbody>
</table>
';
}
?>

<?php
if ($contactinfos) {

echo '
<table>
	<tbody>
';

foreach ( $contactinfos as $contactinfo ) 
{
$contactinfo_type = $contactinfo->contactinfo_type;
$contactinfo_data = $contactinfo->contactinfo_data;
$contactinfo_ID = $contactinfo->contactinfo_ID;
$contact_ID = $contactinfo->contact_ID;

echo '
		<tr>
			<td width="15%">
				<span class="border border-secondary rounded-circle bg-dark text-light" style="padding:0.25rem 0.35rem;">
				';
				switch ($contactinfo_type) {
					case "H":
						echo '<i class="fal fa-fw fa-home"></i>';
						break;
					case "M":
						echo '<i class="fal fa-fw fa-mobile"></i>';
						break;
					case "E":
						echo '<i class="fal fa-fw fa-envelope"></i>';
						break;
					case "W":
						echo '<i class="fal fa-fw fa-building"></i>';
						break;
				}
				echo
				'
				</span>
			</td>
			<td width="90%">
				'.stripslashes($contactinfo_data).'
			</td>
			<td width="5%">
				<div class="dropdown item-end">
					<button class="btn btn-link btn-secondary dropdown-toggle dropdown-no-caret float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-ellipsis-v"></i>
					</button>
					<div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
						<form name="form" method="post" action="' . home_url( '/' ) . 'wp-content/themes/uncompromising/db/deletecontactinfo.php">
							<input type="hidden" name="contactinfo_ID" value="' . $contactinfo_ID . '">
							<input type="hidden" name="contact_ID" value="' . $contact_ID . '">
							<button type="submit" class="btn btn-link btn-danger"><i class="fal fa-trash"></i> Delete</button>
						</form>
					</div>
				</div>
			</td>
		</tr>
';
	
}
echo '
	</tbody>
</table>
';
}
if (empty($addresses) && empty($contactinfos)) {
	echo '
	<div class="text-center py-4">
		<h5 class="mb-4">No contact info</h5>
		<button href="#modalAddContactInfo" data-toggle="modal" role="button" type="button" class="btn btn-primary btn-sm"><i class="fal fa-plus"></i> Add Contact Info</button>
	</div>
	';
}
?>
	</div>
</div>