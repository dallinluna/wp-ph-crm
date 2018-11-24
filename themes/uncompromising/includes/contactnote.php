<div class="card">
  <div class="card-header">
    Contact Note
  </div>
  <?php
  switch($contact->contact_frequency){
      case 0:
        $contact_frequency_text = "";
        break;
      case 1:
        $contact_frequency_text = "Once a Year";
        break;
      case 2:
        $contact_frequency_text = "Twice a Year";
        break;
      case 3:
        $contact_frequency_text = "Quarterly";
        break;
      case 4:
        $contact_frequency_text = "Monthly";
        break;
      case 5:
        $contact_frequency_text = "Weekly";
        break;
        case 6:
        $contact_frequency_text = "Daily";
        break;
    }
  ?>
  <div class="card-block">
    <p>
      Stay in touch with <?php echo $contact_fn ; ?> <i class="fal fa-angle-right"></i> <strong><?php echo stripslashes($contact_frequency_text); ?></strong>
    </p>
    <?php if($contact->description) { ?>
      <p class="mb-0 mb-lg-3"><?php echo stripslashes($contact->description) ?></p>
    <?php } ?>
    <p>
      <?php echo stripslashes($contact_note); ?>
    </p>
  </div>
</div>