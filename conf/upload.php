<?PHP
if ($_FILES["file"]["name"] != '') {
  $test = explode(".", $_FILES["file"]["name"]);
  $extension = end($test);
  $name = rand(100, 999) . '.' . $extension;
  $location = '../img/' . $name;
  move_uploaded_file($_FILES["file"]["tmp_name"], $location);
  echo '<img src="' . $location . '" alt="usee1" class="avatar">';
}
?>
