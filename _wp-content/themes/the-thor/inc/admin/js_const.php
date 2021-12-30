<?php

function add_hidden_parts() {

  if (get_option('fit_partsList_balloonNameLeft')) {
    echo '<input type="hidden" name="hid-leftname" id="hid-leftname" value="' . get_option('fit_partsList_balloonNameLeft') . '">';
  }else {
    echo '<input type="hidden" name="hid-leftname" id="hid-leftname" value="Name">';
  }

  if (get_option('fit_partsList_balloonNameRight')) {
    echo '<input type="hidden" name="hid-rightname" id="hid-rightname" value="' . get_option('fit_partsList_balloonNameRight') . '">';
  }else {
    echo '<input type="hidden" name="hid-rightname" id="hid-rightname" value="Name">';
  }

}
add_action('edit_form_top', 'add_hidden_parts');
