<?php 
include 'assist/header.php';
include 'actions/database.php';
if(isset($_SESSION['student_id']))
{
include 'assist/student_header.php';
}
if(isset($_SESSION['faculty_id']))
{
  include 'assist/faculty_header.php';
}
if(!isset($_SESSION['student_id']) || !isset($_SESSION['student_id']))
{
 include 'assist/main_header.php';
}

?>
<div class="singup" id="wrap">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form method="post" class="form" role="form" id="myform" name="myform" enctype="multipart/form-data"> 
              <legend>Facylties Sing Up !</legend>
              
                   <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <input type="text" name="fname" value="" class="form-control input-lg" placeholder="First Name" id="fname" 
                             data-bvalidator="alpha,minlength[3],required" />
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <input type="text" name="lname" value="" class="form-control input-lg" placeholder="Last Name" id="lname"   data-bvalidator="alpha,minlength[3],required"  />              
                        </div>
                    </div>

                    <input type="text" name="username" value="" class="form-control input-lg" placeholder="Your Email"  id="username" data-bvalidator="email,required" />
                    <input type="password" name="pass" value="" class="form-control input-lg" placeholder="Password" id="pass" data-bvalidator="required,minlength[6]" />
                    <input type="password" name="confirm_password" value="" class="form-control input-lg" placeholder="Confirm Password" id="conform_pass" data-bvalidator="equalto[pass],minlength[6],required"  />  

       <label>Birth Date</label>                   
         <div class="row">
               <div class="col-xs-4 col-md-4">
                <select name="month" class = "form-control input-lg" id="month" data-bvalidator="required" data-bvalidator-msg="Select One options">
                <option disabled selected>-Months-</option>
                <option value="12">jan</option>
                <option value="12">Feb</option>
                <option value="12">Mar</option>
                <option value="12">April</option>
                <option value="12">May</option>
              </select>                       
            </div>

      <div class="col-xs-4 col-md-4">
        <select name="day" class = "form-control input-lg" id="day" data-bvalidator="required" data-bvalidator-msg="Select One options">
        <option disabled selected>-Days-</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>

        </select>                        
      </div>
        <div class="col-xs-4 col-md-4">
         <select name="year" class = "form-control input-lg" id="year" data-bvalidator="required" data-bvalidator-msg="Select One options">
           <option disabled selected>-Years-</option>
           <option value="2001">2001</option>
                <option value="2002">2002</option>
                 <option value="2003">2003</option>
                  <option value="2005">2005</option>
        </select>    
        </div>
 </div>
      
     <label>Adress:</label>
     <input type="text" name="address" value="" class="form-control input-lg" placeholder="Adress" id="address" data-bvalidator="required" />
     <div class="row">
             <div class="col-xs-6 col-md-6">
                    <input type="text" name="phone" class="form-control input-lg" placeholder="Phone" id="phone" data-bvalidator="minlength[10],maxlength[14],number,required" data-bvalidator-msg="Enter Valid Number, min 10 digets,max 14 digets">    
             </div>
             <div class="col-xs-6 col-md-6">
                     <select class="form-control input-lg" id="depart_id" name="depart_id" data-bvalidator="required" data-bvalidator-msg="Select One options">
                      <option selected disabled>-Select Your Faculty</option>
                      <option value="1">PHP Language</option>
                      <option value="3">JAVA Language</option>
                      <option value="2">Math</option>
                     </select>   
             </div>
     </div>
        <label>Select Image:</label>
        <input type="file" name="image" id="image" style="padding:0 0 10px 0; width: 250px;height: 35px;"
        data-bvalidator="extension[jpg:png:],required" data-bvalidator-msg="Please select file of type .jpg, .png">
        <label>Gender : </label>             
         <label class="radio-inline"  >
             <input type="radio" name="gender" value="male"  id="gender"/>  Male
         </label>
         <label class="radio-inline">
             <input type="radio" name="gender" value="female" id="gender" data-bvalidator="required" data-bvalidator-msg="Select one radio button" />Female
              </label>
              <br />
              <span class="help-block">By clicking Create my account, you agree to our <a href="term_and_condition.php">Terms </a>and that you have read our Data Use Policy, including our Cookie Use.</span>
              <input type="submit" class="btn btn-lg btn-primary btn-block signup-btn"  name="submit" id="submit"
               value="Create my account">  
            </form>          
    </div>
</div>            
</div>
</div>
<?php  include 'assist/footer.php'; ?>
<script type="text/javascript">   
    $(document).ready(function () {
    
        $('#myform').bValidator();


        $("#myform").on('submit',function(event)
        {
              event.preventDefault();
               $.ajax({
                        url:"actions/teacher_singup.php",
                        method:"POST",
                        data: new FormData($(this)[0]),
                        contentType: false,
                        cache: false,
                        processData:false,
                        success:function(data)
                        {
                          if(data=='successed'){
                            alert("Registration Successed");
                            $(location).attr('href','login.php');
                            $("#myform")[0].reset();
                            }
                            else
                            {
                              alert("Try Again!");
                            }
                        }
                    });
        });
          
    });
</script>