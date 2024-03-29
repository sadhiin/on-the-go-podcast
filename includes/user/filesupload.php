<h3>Upload Podcast</h3>
<script>
  function validateForm() {
    const title = document.getElementById("title");
    const desc = document.getElementById("description");
    const audio_file = document.getElementById("audio_file");
    const thumbnail = document.getElementById("thumbnail");
    // Validate title input
    if (title.value === "") {
      alert("Title is required");
      document.getElementById("title").style.borderColor = "red";
      return false;
    }

    // Validate description

    if (desc.value === "") {
      alert("Description is required");
      document.getElementById("description").style.borderColor = "red";
      return false;
    }

    audio_file.addEventListener('change', function() {
      // get the selected file
      const file = audio_file.files[0];

      // check if the file is an audio file
      if (!file.type.includes('audio')) {
        alert('Invalid file type. Please select an audio file.');
        audio_file.value = ''; // clear the input field
        audio_file.style.borderColor = 'red';
        return false;
      }

      // check the file size (max size: 5 MB)
      const maxSize = 5 * 1024 * 1024; // 5 MB in bytes
      if (file.size == 0) {
        alert("File in empty or corupted");
        audio_file.style.borderColor = 'red';
        return false;
      }
      if (file.size > maxSize) {
        alert('File size exceeds the limit of 5 MB.');
        audio_file.value = ''; // clear the input field
        audio_file.style.borderColor = "red";
        return false;
      }
    });

    // Form is valid
    return true;
  }
</script>


<?php
if (isset($_POST['submit'])) {
  $podcast_title = $_POST['title'];
  $podcast_dis = $_POST['description'];
  $audio = $_FILES['audio_file'];
  $thum = $_FILES['thumbnail'];
  $save_to_db = false;
  include "file_handeler.php";
  //defining the variables for accessing later
  $uploder=["err" => '', 'rtn' => false, 'path' => ''];
  $thamb = ['rtn' => false, 'path' => ''];

  if (empty($audio)==false && empty($thum) == false) {

    $uploder = audio_uploader($audio); // return assos array with key err, rtn, path
    $thamb = thumbnail_uploder($thum);
    // print_r($uploder);
    // print_r($thamb);
    // var_dump($uploder);
    // var_dump($thamb);
    if ($uploder['rtn'] == true && $thamb['rtn'] == true) {
      $save_to_db = true;
    }
  } else {
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">';
    echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
    echo '<div>';
    echo 'Audio or thumbnail is not uploaded..!';
    echo '</div></div>';
  }

  if ($save_to_db) {
    $data = [
      'title' => $podcast_title,
      'description' => $podcast_dis,
      'image' => $thamb['path'],
      'date' => date('Y-m-d'),
      'post_path' => $uploder['path']
    ];

    // saving information to database.
    include './controller/podcast.php';
    if (addPodCast($data)) {
      echo '<div class="alert alert-success" role="alert">';
      echo '<h4 class="alert-heading">Podcast</h4>';
      echo "<p>Successfully added</p>";
      echo "</div>";
    } else {
      echo '<div class="alert alert-danger" role="alert">';
      echo '<h4 class="alert-heading">Error..!</h4>';
      echo "<p>Something Went-wrong</p>";
      echo '</div>';
    }
  }
}

?>

<form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter description"></textarea>
  </div>
  <div class="mb-3">
    <label for="audio" class="form-label">Audio file</label>
    <input class="form-control" type="file" id="audio_file" name="audio_file">
  </div>
  <div class="mb-3">
    <label for="thumbnail" class="form-label">Audio thumbnail</label>
    <input class="form-control" type="file" name="thumbnail" id="thumbnail">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>