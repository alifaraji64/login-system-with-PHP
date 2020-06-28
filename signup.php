'<?php
   require 'header.php';
   if(isset($_GET['error'])){



       //CHECK FOR EMPTY FIELD
       if($_GET['error']=='emptyfield'){
           echo 
           '
           <div class="alert alert-warning alert-dismissible fade show" role="alert">
               <strong>please fill all of the fields</strong>.
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           ';
       }



       //CHECK FOR INVALID EMAIL
       else if($_GET['error'] == 'invalidEmail'){
        echo 
        '
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width:400px;">
            <strong>your email is invalid please enter a valid email</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ';
       }



       //CHECK FOR INVALID USERNAME
       else if($_GET['error'] == 'invalidUsername'){
        echo 
        '
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width:400px;">
            <strong>your username is invalid please enter a valid username</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ';
       }


       //CHECK FOR DON'T MATCHED PASSWORD
       else if($_GET['error'] == 'passwordCheck'){
        echo 
        '
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width:400px;">
            <strong>passwords don\'t matched</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ';
       }


       //CHECK FOR DUPLICATED USER
       else if($_GET['error']='userTaken'){
        echo 
        '
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width:400px;">
            <strong>user exists with this username</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ';
       }
   }
   else if(isset($_GET['signup'])){
       if($_GET['signup'] == 'success'){
        echo 
        '
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:400px;">
            <strong>you are registered successfuly now you can login</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ';
       }
   }
?>
<main>
    <h1>sign up</h1>
    <form action="includes/signup.inc.php" method="POST">
        <input type="text" name='uid' placeholder="username" style="display:block">
        <input type="email" name='email' placeholder="email" style="display:block">
        <input type="password" name='pwd' placeholder="password" style="display:block">
        <input type="password" name="pwd-repeat" placeholder="confirm password" style="display:block">
        <button type="submit" name='signup-submit' style="display:block">signup</button>
    </form>
</main>
<?php
   require 'footer.php';
?>'