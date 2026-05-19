<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Number Verification</title>
</head>
<body>
    <!-- Background with blur effect -->
    <div class="background"></div>

    <!-- Verification Form -->
    <div class="verification-container" id="verification-container">
        <!-- Step 1: Phone Number Input -->
        <div class="step" id="step-1">
            <h2>Verify Your Number</h2>
            <form id="phone-form">
                <label for="phone-number">Enter your phone number:</label>
                <input type="text" id="phone-number" name="phone-number" placeholder="+923061234567" required>
                <button type="submit">Send OTP</button>
            </form>
        </div>

        <!-- Step 2: OTP Verification -->
        <div class="step" id="step-2" style="display: none;">
            <h2>Enter OTP</h2>
            <p>We sent a verification code to <span id="user-phone"></span></p>
            <form id="otp-form">
                <input type="text" id="otp" name="otp" placeholder="Enter OTP" required>
                <button type="submit">Verify</button>
            </form>
            <p class="resend">Didn't receive the code? <a  id="resend-otp"></a> <a id="resend-timer" style="display: none;"></a></p>
        </div>
    </div>

</body>
</html>
<style>
  /* styles.css */
/* styles.css */
body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: 'Arial', sans-serif;
    background: #f0f2f5;
}

/* Background with blur effect */
.background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('background-image.jpg'); /* Replace with your image */
    background-size: cover;
    background-position: center;
    filter: blur(10px);
    z-index: -1;
}

/* Verification Container */
.verification-container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(255, 255, 255, 0.95);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    text-align: center;
    width: 90%; /* Responsive width */
    max-width: 350px; /* Maximum width for larger screens */
    transition: all 0.3s ease;
}

.verification-container h2 {
    margin-bottom: 20px;
    color: #333;
    font-size: 24px;
}

.verification-container label {
    display: block;
    margin-bottom: 10px;
    color: #555;
    font-size: 14px;
}

.verification-container input {
    width: 90%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 16px;
    outline: none;
    transition: border-color 0.3s ease;
}

.verification-container input:focus {
    border-color: #007bff;
}

.verification-container button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.verification-container button:hover {
    background-color: #0056b3;
}

/* OTP Step */
#step-2 p {
    margin-bottom: 20px;
    color: #555;
}

#step-2 #user-phone {
    font-weight: bold;
    color: #333;
}

.resend {
    margin-top: 10px;
    font-size: 14px;
    color: #555;
}

.resend a {
    color: #007bff;
    text-decoration: none;
}

.resend a:hover {
    text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 600px) {
    .verification-container {
        padding: 20px;
        width: 90%; /* Full width on small screens */
        max-width: 300px; /* Slightly smaller for mobile */
    }

    .verification-container h2 {
        font-size: 20px;
    }

    .verification-container input {
        padding: 10px;
        font-size: 14px;
    }

    .verification-container button {
        padding: 10px;
        font-size: 14px;
    }

    #step-2 p {
        font-size: 12px;
    }

    .resend {
        font-size: 12px;
    }
}

@media (max-width: 400px) {
    .verification-container {
        padding: 15px;
        max-width: 250px; /* Even smaller for very small screens */
    }

    .verification-container h2 {
        font-size: 18px;
    }

    .verification-container input {
        padding: 8px;
        font-size: 12px;
    }

    .verification-container button {
        padding: 8px;
        font-size: 12px;
    }

    #step-2 p {
        font-size: 10px;
    }

    .resend {
        font-size: 10px;
    }
}
</style>
<!-- use ajax to send otp and verify otp -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <!-- use sweetalert2 for alert messages -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <script>
    $(document).ready(function(){
        // form submission prevent default action
    
     $("#phone-form").submit(function(event){
       event.preventDefault();
       const phoneNumber = document.getElementById('phone-number').value;
       $.ajax({
         url: "{{ asset('') }}verification/send_otp",
         type: "POST",
         dataType: "json",
         data: {phone_number: phoneNumber},
         success: function(response){
           if(response.status == true){
             $("#step-1").hide();
             $("#step-2").show();
             $("#user-phone").text(phoneNumber);
            //  sweetalert2 for alert messages
             Swal.fire({
               title: 'OTP sent successfully!',
               text: response.message,
               icon:'success',
               confirmButtonText: 'OK'
             })
             startResendTimer();
           }else{ 
             // sweetalert2 for alert messages
             Swal.fire({
               title: 'OTP not sent!',
               text: response.message,
               icon:'error',
               confirmButtonText: 'OK'
             })
           }
         }
       });
     });
     function startResendTimer(){
        const resendBtn = document.getElementById('resend-otp');
        let timeLeft = 60;
        const timer = setInterval(function(){
            timeLeft--;
          resendBtn.textContent = `Resend in ${timeLeft} seconds`;
          if(timeLeft <= 0){
            clearInterval(timer);
            document.getElementById('resend-timer').style.display = "block";
            document.getElementById('resend-timer').textContent = "Resend code";
            resendBtn.style.display = "none";
          }
        }, 1000);
      }
      $("#resend-timer").click(function(){
        $.ajax({
          url: "{{ asset('') }}verification/send_otp",
          type: "get",
          dataType: "json",
          data: {phone_number: 'phoneNumber'},
          success: function(response){
            console.log(response.message );
            if(response.status == true){
               const resendBtn = document.getElementById('resend-otp');
               resendBtn.style.display = "block";
               document.getElementById('resend-timer').style.display = "none";
               Swal.fire({
                 title: 'OTP sent successfully!',
                 text: response.message,
                 icon:'success',
                 confirmButtonText: 'OK'        
               });
              startResendTimer();
            }else{
              // sweetalert2 for alert messages
              Swal.fire({
                title: 'OTP not sent!',
                text: response.message,
                icon:'error',
                confirmButtonText: 'OK'     
              })    
            }
          }
        });
      });
     $("#otp-form").submit(function(event){
       event.preventDefault();
       const otp = document.getElementById('otp').value;
       $.ajax({
         url: "{{ asset('') }}verification/verify_otp",
         type: "POST",
         data: {otp_code: otp},
         dataType: "json",
         success: function(response){
           console.log(response);
           if(response.status == true){
             Swal.fire({
                 title: 'OTP verified successfully!',
                 text: response.message,
                 icon:'success',
                 confirmButtonText: 'OK',
                 // Redirect or perform further actions 
                 
             })
             setTimeout(function(){
                window.location.href = "{{ asset('') }}journey";    
             }, 2000);
             
             // Redirect or perform further actions
             }else{
                Swal.fire({
                     title: 'OTP verification failed!',
                     text: response.message,
                     icon:'error',
                     confirmButtonText: 'OK'
                 })
           }
         }
       });
     });

    });
</script>
