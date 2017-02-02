<?php
session_start();
require_once'helpers/security.php';
$errors=isset($_SESSION['errors'])?$_SESSION['errors']:[];
$fields=isset($_SESSION['fields'])?$_SESSION['fields']:[];
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.js">
        <script src="js/jquery-3.1.1.min.js"></script>
        <title>Contact Form</title>
        <script>
		$(document).ready(function() {
			var firstNumber, secondNumber, result;
			firstNumber = Math.floor(Math.random() * 10) + 1;
			$(".firstNumber").append(firstNumber);
			secondNumber = Math.floor(Math.random() * 10) + 1;
			$(".secondNumber").append(secondNumber);
			result = firstNumber + secondNumber;
			$('#submitButton').prop('disabled', true);
			$("#answer").on("change paste keyup", function() {
				$('#answerBot').prop('checked', false);
				$('#submitButton').prop('disabled', true);
			});
			$('#answerBot').click(function() {
				// change on checkbox click
				var check = $("#answer").val();
				if (check == result) {
					$('#submitButton').prop('disabled', !$('#answerBot').prop('checked'));
				}
			});
		});
        </script>
    </head>
    <body>
        <div class="container">
            <div class="contact">
                <div class="panel">
                    <?php if(!empty($errors)):?>
                    <div class="panel">
                        <ul><li><?php echo implode('</li> <li>', $errors)?></li></ul>
                    </div>
                <?php endif; ?>
                </div>
                <h3>Contact Form</h3>
                <form action="contact.php" method="post">
                    <div class="form-group">
                        <label for="name">Your Name <font color="red">*</font></label>
                        <input type="text" name="name" autocomplete="off" class="form-control" placeholder="Enter Name" <?php echo isset ($fields['name'])? 'value="'.e($fields['name']).'"':''?>>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email address <font color="red">*</font> </label>
                            <input type="email" name="email" autocomplete="off" class="form-control" placeholder="Enter Email"<?php echo isset ($fields['email'])? 'value="'.e($fields['email']).'"':''?>>
                    </div>
                    <div class="form-group" >
                        <label for="message">Your Message <font color="red">*</font></label>
                            <textarea class="form-control" rows="8" id="comment" name="message"<?php echo isset ($fields['message'])? e($fields['message']):''?>></textarea>
                        <br>
                            
                        <div>
                            <form class="form-inline">
                              <div class="form-group">
                                <div class="col-xs-12">
                                <label class="firstNumber"id="firstNumber">&nbsp</label>
                                <label> &nbsp+</label>
                                <label class="secondNumber"id="secondNumber">&nbsp</label>
                                <label> &nbsp=</label>
                                    <input  class="form-control " type="text"id="answer" placeholder="Answer">
                                <label>
                                    <input type="checkbox" id="answerBot" ><font color="#005580">I am not a Bot</font> <font color="red">*</font>
                                </label>
                                </div>
                                
                              </div>
                                <p class="muted">Please enter the correct addition to submit the form</p>
                            </form>
                        </div>
                        
                        
                        <input type="submit" value="Send"  class="btn btn-success" id="submitButton">
                    </div>
                    <p class="muted">* Means a required field</p>
                    
                </form>
            </div>
        </div>
    </body>
</html>

<?php
unset($_SESSION['errors']);
unset($_SESSION['fields']);
?>