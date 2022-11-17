<?php
  // including the database file
  require ('inc/header.php');
  include 'inc/database.php';
  $profileObj = new database();
  if(isset($_GET['editId']) && !empty($_GET['editId'])){
    $editId = $_GET['editId'];
    $profile = $profileObj->displayProfilesById($editId); // storing the particular profile in this profile variable using the method I created
  }

  if(isset($_POST['update'])){
    $profileObj->updateProfile($_POST); // now if update button is pressed, updateProfile method is called and we get our update done.
  }
?>

    <section class="bg-white text-dark p-5 text-center" id="form-section">
        <h2>Edit Your Information Here</h2>
        <div class="d-sm-flex" id="form">
            <form action="edit.php" method="POST">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" name="newname" value="<?php echo $profile['name']; ?>" required> <!-- name has been prefixed with new to pass that info to the update method and echo $profile['name'] is used instead of x['name'] because we assigned the entire array to profile at the top of this page. -->
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="newemail" value="<?php echo $profile['email']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="bio">Bio:</label>
                  <textarea class="form-control" id="newbio" name="newbio"><?php echo $profile['bio']; ?></textarea>
                  <br>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $profile['id']; ?>"> <!-- dont forget to mention id here or otherwise, the update method will not know which id to use!-->
                    <input type="submit" name="update" class="btn btn-primary" value="Update">
                  </div>
              </form>
        </div>
    </section>

    <?php require 'inc/footer.php'; ?> 