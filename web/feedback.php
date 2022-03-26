<?php
include 'assist/header.php';
include 'actions/database.php';
if(isset($_SESSION['student_id']))
{
include 'assist/student_header.php';
}
else if(isset($_SESSION['faculty_id']))
{
    include 'assist/faculty_header.php';
}
else
{
  include 'assist/main_header.php';
}
?>
<div class="feedback">
<div class="row " >
    <div class="col-md-6 col-md-offset-3 form-container">
        <h2>Feedback</h2>
        <p>
            Please provide your feedback below:
        </p>
        <form role="form" method="post" id="feedback">
            <div class="row">
                <div class="col-sm-12 form-group">
                <label>How do you rate your overall experience?</label>
                <p>
                    <label class="radio-inline">
                    <input type="radio" name="rate" id="rate" value="bad">
                    Bad
                    </label>

                    <label class="radio-inline">
                    <input type="radio" name="rate" id="rate" value="average" >
                    Average
                    </label>

                    <label class="radio-inline">
                    <input type="radio" name="rate" id="rate" value="good" >
                    Good
                    </label>
                </p>
                </div>
            </div>
              <div class="row">
                <div class="col-sm-6 form-group">
                    <label for="name">
                        Your Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="email">
                        Email:</label>
                    <input type="email" class="form-control" id="user" name="email" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="comments">
                        Comments:</label>
                    <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button type="submit" class="btn btn-lg  btn-block" id="post" >Post </button>
                </div>
            </div>
        </form>
        <h3 id="error" style="padding:0 0 5px 0" class="text-info"></h3>
    </div>
</div>
</div>
<?php
include'assist/footer.php';
?>
<script type="text/javascript">
    $(document).ready(function(){
          $(document).on('click',"#post",function(event)
          {
             event.preventDefault();
             var name=$.trim($("#name").val());
             var email=$.trim($("#user").val());
             var comment=$.trim($("#comments").val());
        var rate=$('input[name=rate]:checked', '#feedback').val();
        var emailValid=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
             if(name !="" && email!="" && comment!="" && rate!=null)
             {
                  if(email.match(emailValid))
                  {
                     $.ajax({
                         url:"actions/feedback.php",
                         method:"POST",
                         data:$("#feedback").serialize(),
                         success:function(data)
                         {
                            if(data=="done")
                            {
                             $("#error").html("Thank You For your Feedback");
                             $("#feedback")[0].reset();
                              //$("#error").hide(5000);
                            }
                            else
                            {
                            $("#error").html("Sorry! try Again !");
                            $("#error").fadOut('slow');

                            }
                         }
                     });
                  }
                  else
                  {
                      $("#error").html("Enter Valid Email!");
                  }
             }
             else
             {
                $("#error").html("All Fields Require !");
             }
          });

    });

</script>