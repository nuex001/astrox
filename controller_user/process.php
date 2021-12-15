<?php
session_start();
require_once 'dbcon.php';
?>


<?php





// validation for 1st form in index.php
if (isset($_POST['callback_submit'])) {

 
  
  $error = [];
  $messagebox = [];
  $callback_name = mysqli_real_escape_string($conn, $_POST['callback_name']);
  $callback_course = mysqli_real_escape_string($conn, $_POST['callback_course']);
  $callback_email = mysqli_real_escape_string($conn, $_POST['callback_email']);
  $callback_phone = mysqli_real_escape_string($conn, $_POST['callback_phone']);
  $CBCountry11CB = mysqli_real_escape_string($conn, $_POST['CBCountry11CB']);

  // check for name 
  if (empty($callback_name)) {
    
    $error['callback_name'] = "Name is required";
  } else {

    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $callback_name)) {
      
      $error['callback_name'] = "Only letters and white space allowed";
      $msg = $error['callback_name'];
      echo ("<script>window.alert('$msg');
          </script>");
    } 
  }

  // check for callback_course
  if (!empty($callback_course)) {
    
    $error['callback_course'] = " course option required";
    $messagebox['callback_course'] = 'success';
  }

  // check for callback_email
  if (!empty($callback_email)) {
   
    $error['callback_email'] = "email is required";
    $messagebox['callback_email'] = 'success';
  }

  // check for callback_phone
  if (!empty($callback_phone)) {
    
    $error['callback_phone'] = "email is required";
    $messagebox['callback_phone'] = 'success';
  }

  // check for CBCountry11CB (country)
  if (!empty($CBCountry11CB)) {
    
    $error['CBCountry11CB'] = "country is required";
    $messagebox['CBCountry11CB'] = 'success';
  }


  if (!empty($messagebox)) {
    $sql_insert_data = "INSERT INTO `user` (`id`,`name`,`course`, `email`, `phoneNum`, `country`, `auth`) VALUES ('' , '$callback_name', '$callback_course', '$callback_email', '$callback_phone', '$CBCountry11CB' '')";

    $inserted_data = mysqli_query($conn, $sql_insert_data);
    if ($inserted_data) {

      $location = 'thankyou.php';
      header("location: $location");
      // die();
      // $msg = "Details successful submitted Our Team will get back to you Shortly";
      // echo ("<script> window.alert('$msg')</script>");
    } else {
      $msg = "Failed : A Problem occurred During submission of Details!";
      echo "<script>window.alert('$msg');</script>";
    }
  }
}



// validation for 1st form in footer
if (isset($_POST['btnSubmitCB'])) {

  
  $messagebox = [];
  $error = [];

  $CBName = mysqli_real_escape_string($conn, $_POST['CBName']);
  $CBContactNumber = mysqli_real_escape_string($conn, $_POST['CBContactNumber']);
  $CBEmail = mysqli_real_escape_string($conn, $_POST['CBEmail']);
  $CBCountry11c = mysqli_real_escape_string($conn, $_POST['CBCountry11c']);
  $CBMessage = mysqli_real_escape_string($conn, $_POST['CBMessage']);
  $CBRadiochk = mysqli_real_escape_string($conn, $_POST['CBchkPrefCallBack']);

  // check popup name footer 1ST
  if (empty($CBName)) {
    $error['CBName'] = "Name is required";
  } else {

    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $CBName)) {
      $error['CBName'] = "Only letters and white space allowed";
      $msg = $error['CBName'];
      echo ("<script>window.alert('$msg');
          </script>");
    } else {
      $messagebox['CBName'] = 'success';
    }
  }

  // check number 
  if (!empty($CBContactNumber)) {
    $error['CBContactNumber'] = "";
    $messagebox['CBContactNumber'] = 'success';
  }

  // check email
  if (!empty($CBEmail)) {
    $error['CBEmail'] = "";
    $messagebox['CBEmail'] = 'success';
  }

  // check CBCountry11c
  if (!empty($CBCountry11c)) {
    $error['CBCountry11c'] = "";
    $messagebox['CBCountry11c'] = 'success';
  }

  // check CBMessage
  if (!empty($CBMessage)) {
    $error['CBMessage'] = "";
    $messagebox['CBMessage'] = 'success';
  }

  // check CBRadiochk
  if (!empty($CBRadiochk)) {
    $error['CBchkPrefCallBack'] = "";
    $messagebox['CBchkPrefCallBack'] = 'success';
  }

  if (!empty($messagebox)) {
    $sql_insert_data = "INSERT INTO `user` (`id`,`name`,`phoneNum`, `email`, `country`, `message`,`radio_selection`) VALUES ('' , '$CBName', '$CBContactNumber', '$CBEmail', '$CBCountry11CB', '$CBMessage','$CBRadiochk')";

    $inserted_data = mysqli_query($conn, $sql_insert_data);
    if ($inserted_data) {
      
      $location = 'thankyou.php';
      header("location: $location");
      // die();
      // $msg = "Details successful submitted Our Team will get back to you Shortly";
      // echo ("<script> window.alert('$msg')</script>");
    } else {
      $msg = "Failed : A Problem occurred During submission of  !";
      echo "<script>window.alert('$msg');</script>";
    }
  }
}


//validation for the second form in footer
if (isset($_POST['btnSubmitInPerson'])) {

   

  $messagebox = [];
  $error = [];
  $InPerson = 'In Person';

  $nameInPerson = mysqli_real_escape_string($conn, $_POST['nameInPerson']);
  $contactNumberInPerson = mysqli_real_escape_string($conn, $_POST['contactNumberInPerson']);
  $emailInPerson = mysqli_real_escape_string($conn, $_POST['emailInPerson']);
  $CBCountry11CB = mysqli_real_escape_string($conn, $_POST['CBCountry11CB']);
  $messageInPerson = mysqli_real_escape_string($conn, $_POST['messageInPerson']);
  $chkPrefCallBackInPerson = mysqli_real_escape_string($conn, $_POST['chkPrefCallBackInPerson']);

  // check nameinperson
  if (empty($nameInPerson)) {
    $error['nameInPerson'] = "Name is required";
  } else {

    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $nameInPerson)) {
      $error['nameInPeron'] = "Only letters and white space allowed";
      $msg = $error['nameInPerson'];
      echo ("<script>window.alert('$msg');
          </script>");
    } else {
      $messagebox['nameInPerson'] = 'success';
    }
  }

  // check numberInPerson 
  if (!empty($contactNumberInPerson)) {
    $error['contactNumberInPerson'] = "";
    $messagebox['contactNumberInPerson'] = 'success';
  }

  // check emailinPerson
  if (!empty($emailInPerson)) {
    $error['emailInPerson'] = "";
    $messagebox['emailInPerson'] = 'success';
  }

  // check CBCountry11CB
  if (!empty($CBCountry11CB)) {
    $error['CBCountry11CB'] = "";
    $messagebox['CBCountry11CB'] = 'success';
  }

  // check messageInPerson
  if (!empty($messageInPerson)) {
    $error['messageInPerson'] = "";
    $messagebox['messageInPerson'] = 'success';
  }

  // check CBRadiochk
  if (!empty($chkPrefCallBackInPerson)) {
    $error['chkPrefCallBackInPerson'] = "";
    $messagebox['chkPrefCallBackInPerson'] = 'success';
  }

  if (!empty($messagebox)) {
    $sql_insert_data = "INSERT INTO `user` (`id`,`name`,`phoneNum`, `email`, `country`, `message`,`radio_selection`,`course`) VALUES ('' , '$nameInPerson', '$contactNumberInPerson', '$emailInPerson', '$CBCountry11CB', '$messageInPerson','$chkPrefCallBackInPerson','$InPerson')";

    $inserted_data = mysqli_query($conn, $sql_insert_data);
    if ($inserted_data) {
      
      $location = 'thankyou.php';
      header("location: $location");
      // $msg = "Details successful submitted Our Team will get back to you Shortly";
      // echo ("<script> window.alert('$msg')</script>");
    } else {
      $msg = "Failed : A Problem occurred During submission of  !";
      echo "<script>window.alert('$msg');</script>";
    }
  }
}


// submission to GroupCourse third in footer
if(isset($_POST['btnSubmitGroupCourse']))
{

  $messagebox = [];
  $error = [];
  $GroupCourse = 'Group Course';
  $nameGroupCourse = mysqli_real_escape_string($conn, $_POST['nameGroupCourse']);
  $contactNumberGroupCourse = mysqli_real_escape_string($conn, $_POST['contactNumberGroupCourse']);
  $emailGroupCourse = mysqli_real_escape_string($conn, $_POST['emailGroupCourse']);
  $CBCountry11CB = mysqli_real_escape_string($conn, $_POST['CBCountry11CB']);
  $messageGroupCourse = mysqli_real_escape_string($conn, $_POST['messageGroupCourse']);
  $chkPrefCallBackGroupCourse = mysqli_real_escape_string($conn, $_POST['chkPrefCallBackGroupCourse']);

  // check for name 
  if (empty($nameGroupCourse)) {
    $error['nameGroupCourse'] = "Name is required";
  } else {

    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $nameGroupCourse)) {
      $error['nameGroupCourse'] = "Only letters and white space allowed";
      $msg = $error['nameGroupCourse'];
      echo ("<script>window.alert('$msg');
          </script>");
    } else {
      $messagebox['nameGroupCourse'] = 'success';
    }
  }

   // check numberGroupCourse
   if (!empty($contactNumberGroupCourse)) {
    $error['contactNumberGroupCourse'] = "";
    $messagebox['contactNumberGroupCourse'] = 'success';
  }

  // check emailGroupCourse
  if (!empty($emailGroupCourse)) {
    $error['emailGroupCourse'] = "";
    $messagebox['emailGroupCourse'] = 'success';
  }

  // check CBCountry11CB
  if (!empty($CBCountry11CB)) {
    $error['CBCountry11CB'] = "";
    $messagebox['CBCountry11CB'] = 'success';
  }

  // check messageGroupCourse
  if (!empty($messageGroupCourse)) {
    $error['messageGroupCourse'] = "";
    $messagebox['messageGroupCourse'] = 'success';
  }

  // check CBRadiochk
  if (!empty($chkPrefCallBackGroupCourse)) {
    $error['chkPrefCallBackGroupCourse'] = "";
    $messagebox['chkPrefCallBackGroupCourse'] = 'success';
  }

  if (!empty($messagebox)) {
    $sql_insert_data = "INSERT INTO `user` (`id`,`name`,`phoneNum`, `email`, `country`, `message`,`radio_selection`,`course`) VALUES ('' , '$nameGroupCourse', '$contactNumberGroupCourse', '$emailGroupCourse', '$CBCountry11CB', '$messageGroupCourse','$chkPrefCallBackGroupCourse','$GroupCourse')";

    $inserted_data = mysqli_query($conn, $sql_insert_data);
    if ($inserted_data) {
      
      $location = 'thankyou.php';
      header("location: $location");
      // $msg = "Details successful submitted Our Team will get back to you Shortly";
      // echo ("<script> window.alert('$msg')</script>");
    } else {
      $msg = "Failed : A Problem occurred During submission of  !";
      echo "<script>window.alert('$msg');</script>";
    }
  }

}


// submission of course fourth in footer
if (isset($_POST['btnSubmitOnlineCourse'])) {

  $messagebox = [];
  $error = [];

  $OnlineCourse = 'Online Course';
  $nameOnlineCourse = mysqli_real_escape_string($conn, $_POST['nameOnlineCourse']);
  $contactOnlineCourse = mysqli_real_escape_string($conn, $_POST['contactNumberOnlineCourse']);
  $emailOnlineCourse = mysqli_real_escape_string($conn, $_POST['emailOnlineCourse']);
  $CBCountry11CB = mysqli_real_escape_string($conn, $_POST['CBCountry11CB']);
  $messageOnlineCourse = mysqli_real_escape_string($conn, $_POST['messageOnlineCourse']);
  $chkPrefCallBackOnlineCourse = mysqli_real_escape_string($conn, $_POST['chkPrefCallBackOnlineCourse']);

   // check for name 
  if (empty($nameOnlineCourse)) {
    $error['nameOnlineCourse'] = "Name is required";
  } else {

    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $nameOnlineCourse)) {
      $error['nameOnlineCourse'] = "Only letters and white space allowed";
      $msg = $error['nameOnlineCourse'];
      echo ("<script>window.alert('$msg');
          </script>");
    } else {
      $messagebox['nameOnlineCourse'] = 'success';
    }
  }

  // check numberOnlineCourse
  if (!empty($contactNumberOnlineCourse)) {
      $error['contactNumberOnlineCourse'] = "";
      $messagebox['contactNumberOnlineCourse'] = 'success';
  }

  // check emailOnlineCourse
  if (!empty($emailOnlineCourse)) {
    $error['emailOnlineCourse'] = "";
    $messagebox['emailOnlineCourse'] = 'success';
  }

  // check country CBCountry11CB
  if (!empty($CBCountry11CB)) {
    $error['CBCountry11CB'] = "";
    $messagebox['CBCountry11CB'] = 'success';
  }
  
  // check messageOnlineCourse
  if (!empty($messageOnlineCourse)) {
    $error['messageOnlineCourse'] = "";
    $messagebox['messageOnlineCourse'] = 'success';
  }


// check CBRadiochk
  if (!empty($chkPrefCallBackOnlineCourse)) {
    $error['chkPrefCallBackOnlineCourse'] = "";
    $messagebox['chkPrefCallBackOnlineCourse'] = 'success';
  }

  if (!empty($messagebox)) {
    $sql_insert_data = "INSERT INTO `user` (`id`,`name`,`phoneNum`, `email`, `country`, `message`,`radio_selection`,`course`) VALUES ('' , '$nameOnlineCourse', '$contactNumberOnlineCourse', '$emailOnlineCourse', '$CBCountry11CB', '$messageOnlineCourse','$chkPrefCallBackOnlineCourse','$OnlineCourse')";

    $inserted_data = mysqli_query($conn, $sql_insert_data);
    if ($inserted_data) {
      
      $location = 'thankyou.php';
      header("location: $location");
      // $msg = "Details successful submitted Our Team will get back to you Shortly";
      // echo ("<script> window.alert('$msg')</script>");
    } else {
      $msg = "Failed : A Problem occurred During submission of  !";
      echo "<script>window.alert('$msg');</script>";
    }
  }

}


// submission of course last in footer
if (isset($_POST['btnSubmitFundamentals'])) {

  $messagebox = [];
  $error = [];

  $fundamentals = 'Fundamental course';
  $nameFundamentals = mysqli_real_escape_string($conn, $_POST['nameFundamentals']);
  $contactFundamentals = mysqli_real_escape_string($conn, $_POST['contactNumberFundamentals']);
  $emailFundamentals = mysqli_real_escape_string($conn, $_POST['emailFundamentals']);
  $CBCountry11CB = mysqli_real_escape_string($conn, $_POST['CBCountry11CB']);
  $messageFundamentals = mysqli_real_escape_string($conn, $_POST['messageFundamentals']);
  $chkPrefCallBackFundamentals = mysqli_real_escape_string($conn, $_POST['chkPrefCallBackFundamentals']);

   // check for name 
  if (empty($nameFundamentals)) {
    $error['nameFundamentals'] = "Name is required";
  } else {

    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $nameFundamentals)) {
      $error['nameFundamentals'] = "Only letters and white space allowed";
      $msg = $error['nameFundamentals'];
      echo ("<script>window.alert('$msg');
          </script>");
    } else {
      $messagebox['nameFundamentals'] = 'success';
    }
  }

  // check numberfundamentals
  if (!empty($contactNumberFundamentals)) {
      $error['contactNumberFundamentals'] = "";
      $messagebox['contactNumberFundamentals'] = 'success';
  }

  // check emailfundamental
  if (!empty($emailFundamentals)) {
    $error['emailFundamentals'] = "";
    $messagebox['emailFundamentals'] = 'success';
  }

  // check country CBCountry11CB
  if (!empty($CBCountry11CB)) {
    $error['CBCountry11CB'] = "";
    $messagebox['CBCountry11CB'] = 'success';
  }
  
  // check messagefundamental
  if (!empty($messageFundamentals)) {
    $error['messageFundamentals'] = "";
    $messagebox['messageFundamentals'] = 'success';
  }


// check CBRadiochk
  if (!empty($chkPrefCallBackFundamentals)) {
    $error['chkPrefCallBackFundamentals'] = "";
    $messagebox['chkPrefCallBackFundamentals'] = 'success';
  }

  if (!empty($messagebox)) {
    $sql_insert_data = "INSERT INTO `user` (`id`,`name`,`phoneNum`, `email`, `country`, `message`,`radio_selection`,`course`) VALUES ('' , '$nameFundamentals', '$contactNumberFundamentals', '$emailFundamentals', '$CBCountry11CB', '$messageFundamentals','$chkPrefCallBackFundamentals','$fundamentals')";

    $inserted_data = mysqli_query($conn, $sql_insert_data);
    if ($inserted_data) {
      
      $location = 'thankyou.php';
      header("location: $location");
      // $msg = "Details successful submitted Our Team will get back to you Shortly";
      // echo ("<script> window.alert('$msg')</script>");
    } else {
      $msg = "Failed : A Problem occurred During submission of  !";
      echo "<script>window.alert('$msg');</script>";
    }
  }

}


// login 
if (isset($_POST['btn_login'])) {

  $messagebox = [];
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if (empty($email)) {
    $msg = 'Invalid Login Details';
    echo ("<script>window.alert('$msg');</script>");
    $location = 'logine333.php';
    header("location: $location");
  }else{
    $messagebox['email'] = 'success';
  }

  if (empty($password)) {
    $msg = 'Invalid Login Details';
    echo ("<script>window.alert('$msg');</script>");
    $location = 'logine333.php';
    header("location: $location");
  }else{
    $messagebox['password'] = 'success';
  }


  if (!empty($messagebox)) {
    $sql = "SELECT * FROM `user` WHERE  `email`= '$email' AND `password`='$password' ";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
             $fetch = mysqli_fetch_assoc($result);
            //  $email = $_SESSION['email'];
            $_SESSION["userName"] =  $fetch["name"];
            $_SESSION["email"] =$fetch["email"];
            $_SESSION["id"] =$fetch["id"];
            //  $password = $_SESSION['password'];
            //  $messagebox = "login successful";
            //  echo ("<script>window.alert('$messagebox')</script>");
             $location = 'user\dashborad.php';
             header("location: $location");
           }else{
            // $messagebox = "Invalid Login Details";
            $location = 'logine333.php';
            header("location: $location");
            // echo ("<script>window.alert('$messagebox')</script>");
    }
  }else{
    $location = 'logine333.php';
    header("location: $location");
  }
  
}




