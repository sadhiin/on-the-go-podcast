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
  $save_to_db = true;
  include "file_handeler.php";
  if (empty($audio) && empty($thum)) {
    $uploder = audio_uploader($audio);
    $thamb = thumbnail_uploder($thum);

    if ($uploder['rtn'] && $thamb) {
      $save_to_db = true;
    }
  } else {
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">';
    echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
    echo '<div>';
    echo 'Audio or thumbnail is not uploaded..!';
    echo '</div></div>';
  }

  if($save_to_db){
    // upload the file to db....



    
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