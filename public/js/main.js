$(document).ready(function() {
    $('#signup-form').submit(function(e) {
      e.preventDefault(); // Prevent form submission
  
      // Get form data
      var formData = $(this).serialize();
  
      // Disable the submit button
      $('#signup-btn').attr('disabled', 'disabled');
  
      // Show loading message with loader icon
      $('#message').html('Creating account... <span class="loader"></span> ');
  
      // Send AJAX request
      $.ajax({
        type: 'POST',
        url: 'register.php',
        data: formData,
        dataType: 'json',
        success: function(response) {
          // Enable the submit button
          $('#signup-btn').removeAttr('disabled');
  
          // Display success message or error message
          if (response.success) {
            $('#message').html('Account created successfully. Login link has been sent to your email.');
          } else {
            $('#message').html('Error: ' + response.message);
          }
        },
        error: function() {
          // Enable the submit button
          $('#signup-btn').removeAttr('disabled');
  
          // Display error message
          $('#message').html('Error occurred during account creation. Please try again.');
        }
      });
    });
  });
  