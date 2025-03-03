<?php
// Include the database connection file
include 'home/config.php';

// Initialize response variable
$response = "";

// If the request is an AJAX call
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajax_request'])) {
    // Collect form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate inputs (optional but recommended)
    if (empty($first_name) || empty($last_name) || empty($phone_number) || empty($email)) {
        $response = "<div class='alert alert-danger'>All fields are required.</div>";
    } else {
        // Prepare SQL query to insert data
        $sql = "INSERT INTO contacts (first_name, last_name, phone_number, email, message)
                VALUES ('$first_name', '$last_name', '$phone_number', '$email', '$message')";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            $response = "<div class='alert alert-success'>Form submitted successfully!</div>";
        } else {
            $response = "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
        }
    }

    // Close the database connection
    mysqli_close($conn);

    // Return the response and stop further execution
    echo $response;
    exit();
}
?>





<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>EAP Films and Theatres Private Limited | Contact Us</title>
  <!-- Google Font Api KEY-->
  <meta name="google_font_api" content="AIzaSyBG58yNdAjc20_8jAvLNSVi9E4Xhwjau_k">
  
  <!-- Favicon -->
  <link rel="shortcut icon" href="./assets/images/favicon.ico" />
  
  <!-- Library / Plugin Css Build -->
  <link rel="stylesheet" href="./assets/css/core/libs.min.css" />
  
  <!-- font-awesome css -->
  <link rel="stylesheet" href="./assets/vendor/font-awesome/css/all.min.css" />
  
  <!-- Iconly css -->
  <link rel="stylesheet" href="./assets/vendor/iconly/css/style.css" />
  
  <!-- Animate css -->
  <link rel="stylesheet" href="./assets/vendor/animate.min.css" />

  <link rel="stylesheet" href="./assets/css/contact.css" />
  
  
  
  
  
  
  <!-- Streamit Design System Css -->
  <link rel="stylesheet" href="./assets/css/streamit.min.css?v=1.0.0" />
  
  <!-- Custom Css -->
  <link rel="stylesheet" href="./assets/css/custom.min.css?v=1.0.0" />
  
  <!-- Rtl Css -->
  <link rel="stylesheet" href="./assets/css/rtl.min.css?v=1.0.0" />
  
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300&display=swap" rel="stylesheet">
  
</head>

<body class="  ">

<?php include 'includes/loader.php';?>

  <!-- loader END -->  <!-- loader END -->
  <main class="main-content">
      <!--Nav Start-->
      <?php include 'includes/menu.php';?>
    <!--Nav End-->

      <!--bread-crumb-->
      <div class="iq-breadcrumb" style="background-image: url(./assets/images/pages/01.webp);">
         <div class="container-fluid">
            <div class="row align-items-center">
                  <div class="col-sm-12">
                      <nav aria-label="breadcrumb" class="text-center">
                          <h2 class="title">Contact Us</h2>
                          <ol class="breadcrumb justify-content-center">
                              <!-- <li class="breadcrumb-item"><a href="./index.html">Home</a></li> 
                              <li class="breadcrumb-item active">Contact Us</li> -->
                          </ol>
                      </nav>
                  </div>
              </div> 
         </div>
      </div>      <!--bread-crumb-->





    <!-- ------------------------------- -->




    <div class="cdcontainer">

            <div class="cditem1">
              
            
          
      <div class="abc col-lg-8">
        <div class="border-bottom pb-4 mb-4">
          <h5>Come See Us</h5>
          <span>12 Galle Rd, Colombo 00600</span>
        </div>
        <div class="border-bottom pb-4 mb-4">
          <h5>Get In Touch</h5>
          <a >inquiries.eapft@eapmovies.com</a>
          <p class="mb-0">+94 723 405 405</p>
        </div>
        <div>
          <h5>Follow Us</h5>
          <ul class="p-0 m-0 mt-4 list-unstyled widget_social_media">
            <li class="">
              <a href="https://www.facebook.com/" class="position-relative">
                <i class="fab fa-facebook"></i>
              </a>
            </li>
            <li class="">
              <a href="https://twitter.com/" class="position-relative">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="">
              <a href="https://github.com/" class="position-relative">
                <i class="fab fa-github"></i>
              </a>
            </li>
            <li class="">
              <a href="https://www.instagram.com/" class="position-relative">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>


            </div>

            <div class="cditem2">
    <div class="col-lg-12">
        <div class="title-box">
            <h2>Create With Us</h2>
            <p class="mb-0">How can we help you, contact us.</p>
        </div>

        <!-- Display the response message -->
        <div id="form-response"></div>

        <form id="contactForm" method="POST" class="mb-5 mb-lg-0">
            <div class="row">
                <div class="col-md-6 mb-4 mb-lg-5">
                    <input type="text" name="first_name" class="form-control font-size-14" placeholder="Your Name*" required>
                </div>
                <div class="col-md-6 mb-4 mb-lg-5">
                    <input type="text" name="last_name" class="form-control font-size-14" placeholder="Last Name*" required>
                </div>
                <div class="col-md-6 mb-4 mb-lg-5">
                    <input type="tel" name="phone_number" class="form-control font-size-14" maxlength="140" minlength="10" placeholder="Phone Number*" required>
                </div>
                <div class="col-md-6 mb-4 mb-lg-5">
                    <input type="email" name="email" class="form-control font-size-14" placeholder="Your Email*" required>
                </div>
                <div class="col-md-12 mb-4 mb-lg-5">
                    <textarea name="message" class="form-control font-size-14" cols="40" rows="10" placeholder="Your Message"></textarea>
                </div>
                <div class="col-md-12">
                    <div class="iq-button">
                        <button type="submit" class="btn" id="submit-btn">Send Message</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- jQuery (make sure it's included in your project) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    // Handle form submission via AJAX
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();  // Prevent the form from submitting normally

        // Disable the submit button to prevent multiple submissions
        $('#submit-btn').prop('disabled', true).text('Sending...');

        // Gather form data
        var formData = $(this).serialize() + '&ajax_request=1';  // Add a flag for AJAX request

        // Send form data to the same PHP file via AJAX
        $.ajax({
            url: '',  // Send to the same page
            type: 'POST',
            data: formData,
            success: function(response) {
                // Display response message
                $('#form-response').html(response);

                // Enable the submit button again
                $('#submit-btn').prop('disabled', false).text('Send Message');

                // Optionally, reset the form
                $('#contactForm')[0].reset();
            },
            error: function() {
                // Handle any errors during the AJAX call
                $('#form-response').html('<div class="alert alert-danger">There was an error. Please try again later.</div>');
                $('#submit-btn').prop('disabled', false).text('Send Message');
            }
        });
    });
});
</script>


<!-- Modal HTML -->
<div id="successModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><?php echo $response; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  // Check if there's a response from PHP
  var response = "<?php echo $response; ?>";

  // If form was successfully submitted, trigger the modal
  if (response === "Form submitted successfully!") {
    $(document).ready(function() {
      $('#successModal').modal('show');
    });
  }
</script>


    </div>







    <!-- ------------------------------- -->




<div class="map">
  <div class="container-fluid p-0">
    <iframe loading="lazy" class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.0950577520657!2d79.85698737480922!3d6.879214393119664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bc71061417b%3A0x20ffa0f7a9e8607b!2sSavoy%203D%20Cinema!5e0!3m2!1sen!2slk!4v1710774308533!5m2!1sen!2slk" height="600" allowfullscreen=""></iframe>
  </div>
</div>
<div class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-10">
        <div class="title-box">
          <h3 class="fw-500">Contact Us. We'd Be Happy To Take On The Challenge!</h3>
        </div>
      </div>
      <div class="col-lg-2 d-none d-lg-block"></div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="contact-box d-flex gap-3 rounded mb-3 mb-lg-0">
          <img src="./assets/images/pages/box-pattern.webp" class="img-fluid position-absolute top-0 end-0" alt="pattern">
          <div class="icon-wrapper rounded-circle text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 10 17" fill="none">
              <path d="M4.22501 8.70833C4.86668 7.55 6.10001 6.86667 6.81668 5.84167C7.57501 4.76667 7.15001 2.75833 5.00001 2.75833C3.59168 2.75833 2.90001 3.825 2.60835 4.70833L0.450012 3.8C1.04168 2.025 2.65001 0.5 4.99168 0.5C6.95001 0.5 8.29168 1.39167 8.97501 2.50833C9.55835 3.46667 9.90001 5.25833 9.00001 6.59167C8.00001 8.06667 7.04168 8.51667 6.52501 9.46667C6.31668 9.85 6.23335 10.1 6.23335 11.3333H3.82501C3.81668 10.6833 3.71668 9.625 4.22501 8.70833ZM6.66668 14.6667C6.66668 15.5833 5.91668 16.3333 5.00001 16.3333C4.08335 16.3333 3.33335 15.5833 3.33335 14.6667C3.33335 13.75 4.08335 13 5.00001 13C5.91668 13 6.66668 13.75 6.66668 14.6667Z" fill="currentColor"></path>
            </svg>
          </div>
          <div style="z-index: 1;">
            <h6 class="font-size-18 fw-500 mb-4">For General Enquiries</h6>
            <p class="mb-1 font-size-14">Call On: <span class="text-primary">+94 723 405 405</span>
            </p>
            <p class="mb-0">Mail: <a href="mailto:info@medyapim.com" class="text-white fw-500">inquiries.eapft@eapmovies.com</a>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="contact-box d-flex gap-3 rounded mb-3 mb-lg-0">
          <img src="./assets/images/pages/box-pattern.webp" class="img-fluid position-absolute top-0 end-0" alt="pattern">
          <div class="icon-wrapper rounded-circle text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path d="M8 0.5C3.85833 0.5 0.5 3.85833 0.5 8V13.8333C0.5 14.75 1.25 15.5 2.16667 15.5H5.5V8.83333H2.16667V8C2.16667 4.775 4.775 2.16667 8 2.16667C11.225 2.16667 13.8333 4.775 13.8333 8V8.83333H10.5V15.5H13.8333C14.75 15.5 15.5 14.75 15.5 13.8333V8C15.5 3.85833 12.1417 0.5 8 0.5ZM3.83333 10.5V13.8333H2.16667V10.5H3.83333ZM13.8333 13.8333H12.1667V10.5H13.8333V13.8333Z" fill="currentColor"></path>
            </svg>
          </div>
          <div style="z-index: 1;">
            <h6 class="font-size-18 fw-500 mb-4">For user support</h6>
            <p class="mb-1 font-size-14">Call On: <span class="text-primary">+94 723 405 405</span>
            </p>
            <p class="mb-0">Mail: <a href="mailto:info@medyapim.com" class="text-white fw-500">inquiries.eapft@eapmovies.com</a>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="contact-box d-flex gap-3 rounded">
          <img src="./assets/images/pages/box-pattern.webp" class="img-fluid position-absolute top-0 end-0" alt="pattern">
          <div class="icon-wrapper rounded-circle text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
              <path d="M16.8416 8.50829L9.48329 1.14996C9.17496 0.841626 8.74996 0.666626 8.30829 0.666626H2.33329C1.41663 0.666626 0.666626 1.41663 0.666626 2.33329V8.30829C0.666626 8.74996 0.841626 9.17496 1.15829 9.48329L8.51663 16.8416C9.16663 17.4916 10.225 17.4916 10.875 16.8416L16.85 10.8666C17.5 10.2166 17.5 9.16663 16.8416 8.50829ZM9.69163 15.6666L2.33329 8.30829V2.33329H8.30829L15.6666 9.69163L9.69163 15.6666Z" fill="white"></path>
              <path d="M4.41663 5.66663C5.10698 5.66663 5.66663 5.10698 5.66663 4.41663C5.66663 3.72627 5.10698 3.16663 4.41663 3.16663C3.72627 3.16663 3.16663 3.72627 3.16663 4.41663C3.16663 5.10698 3.72627 5.66663 4.41663 5.66663Z" fill="currentColor"></path>
            </svg>
          </div>
          <div style="z-index: 1;">
            <h6 class="font-size-18 fw-500 mb-4">For sales Support</h6>
            <p class="mb-1 font-size-14">Call On: <span class="text-primary">+94 723 405 405</span>
            </p>
            <p class="mb-0">Mail: <a href="mailto:info@medyapim.com" class="text-white fw-500">inquiries.eapft@eapmovies.com</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  </main>

  <?php include 'includes/footer.php';?>

  <?php include 'includes/gototop.php';?>
  <!-- Wrapper End-->
  <!-- Library Bundle Script -->
  <script src="./assets/js/core/libs.min.js"></script>
  <!-- Plugin Scripts -->
  
  
  
  
  
  
  <!-- Lodash Utility -->
  <script src="./assets/vendor/lodash/lodash.min.js"></script>
  <!-- External Library Bundle Script -->
  <script src="./assets/js/core/external.min.js"></script>
  <!-- countdown Script -->
  <script src="./assets/js/plugins/countdown.js"></script>
  <!-- utility Script -->
  <script src="./assets/js/utility.js"></script>
  <!-- Setting Script -->
  <script src="./assets/js/setting.js"></script>
  <script src="./assets/js/setting-init.js" defer></script>
  <!-- Streamit Script -->
  <script src="./assets/js/streamit.js" defer></script>
  <script src="./assets/js/swiper.js" defer></script>
</body>

</html>