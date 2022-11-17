<!--Student Name : Samarpreet Singh-->
<!--Student Number : 200510621 -->
<!--Program: Computer Programming -->

<?php
  // including the database file
  require ('inc/header.php'); // calling in the header file
  include 'inc/database.php';
  $profileObj = new database();
  if(isset($_POST['submit'])){
    $profileObj->createData($_POST); // createData method is called to insert data into the table.
  }

  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])){
    $deleteId = $_GET['deleteId']; //deleteId at line 110 gets stored in this variable and then the variable is passed to the deleteProfile method I created in database.php
    $profileObj->deleteProfile($deleteId);
  }
?>


<section class="bg-dark text-white p-5 text-center" id="form-section">
        <h2>Create your profile here!</h2> <!-- creating the form -->
        <div class="d-sm-flex" id="form">
            <form action="index.php" method="POST">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter full name" required>
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label for="bio">Bio:</label>
                  <textarea class="form-control" id="bio" name="bio"></textarea> <!-- using textarea for bio -->
                  <br>
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
              </form>
        </div>
    </section>

  <!--View section -->
    <section class="bg-light text-dark text-center" id="view-section">
        <div class="d-sm-flex" id="form-view">
            <h3>List of Profiles
            </h3>
                <?php
                $profiles = $profileObj->displayProfiles(); 
                foreach($profiles as $x){ // this loop will loop through all the items in files
                    ?>
                        <h4><?php echo $x['name'] ?></h4>
                        <h6><?php echo $x['email'] ?></h6>
                        <p><?php echo $x['bio'] ?></p>
                        <button class="btn btn-primary" id="edit-button">
                            <a href="edit.php?editId=<?php echo $x['id'] ?>"> <!--The edit ID variable will be populated with id once the edit button is pressed and then the code on the top of this file gets executed.-->
                                <i class="fa fa-pencil text-dark"></i> <!-- using font awesome to get icons for the button -->
                            </a>
                            </button>
                            <button class="btn btn-danger" id="delete-button">
                            <a href="index.php?deleteId=<?php echo $x['id'] ?>" onclick="confirm('Be absolutely certain before you do this! Data will be WIPED!')"> <!-- make sure to give warnings before delete. Protect users from themselves -->
                                <i class="fa fa-trash text-dark"></i>
                            </a>
                            </button>
                    <?php
                }
                ?>
        </div>
    </section>

    <?php require 'inc/footer.php'; ?> <!-- calling in the footer file -->

