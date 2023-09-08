<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <style>
        .errormessage{
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form method="POST" id="registration-form" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" >
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" class="form-control" >
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" >
                            </div>

                            <div class="form-group  mb-3">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" >
                            </div>

                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</table>

    
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        // Listen for the form submission event
        $('#registration-form').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            // Validate the form fields
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var confirmPassword = $('#password_confirmation').val();
            $(".errormessage").html('');
            var errorcount = 0;

            if (name.trim() === '') {
                var error = $('<span class="errormessage">Name field is required</span>');
                $('#name').after(error);
                errorcount++;
                
            }

            if (email.trim() != '') {
                var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                if(!emailPattern.test(email)){
                    var error = $('<span class="errormessage">Please enter valid email addreess</span>');
                    $("#email").after(error);
                    errorcount++;
                }
            }else{
                var error = $('<span class="errormessage">Email field is required</span>');
                $("#email").after(error);
                errorcount++;
            }

            if (password.trim() === '') {
                var error = $('<span class="errormessage">Password field is required</span>');
                $("#password").after(error);
                errorcount++;
            }

            if (confirmPassword.trim() != '') {
                if (password !== confirmPassword) {
                var error = $('<span class="errormessage">Password and Confirm Password do not match</span>');
                $("#password_confirmation").after(error);
                errorcount++;
            }

            }else{
                var error = $('<span class="errormessage">Confirm assword field is required</span>');
                $("#password_confirmation").after(error);
                errorcount++;
            }
            
            if(errorcount > 0){
                return;
            }
            
            // Serialize the form data
            var formData = $(this).serialize();
            // Perform an Ajax POST request to submit the form
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    // Handle the success response here
                    alert(response.message);
                    // You can redirect the user or perform other actions on success
                },
                error: function(xhr, textStatus, errorThrown) {
                    // Handle errors here
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
    
</body>
</html>