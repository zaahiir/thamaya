<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Thamaya registration</title>
      <link rel="icon" href="favicon.ico" type="image/x-icon">
      <!-- Bootstrap CSS -->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
      <!-- Bootstrap CDN for responsive layout -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
      <!-- Animate.css for additional animations -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
      <style>
         body {
         padding: 0;
         margin: 0;
         box-sizing: border-box;
         overflow-x:hidden;
         font-family: 'Poppins', sans-serif;
         }
         .form-label {
         color: #3c4343;
         font-weight: 700;
         font-size: 15px;
         }
         .form-label {
         color: #0d484e;
         font-weight: 500;
         font-size: 19px;
         white-space: nowrap;
         }
         .thamaya_sec {
         background: rgb(200,238,238);
         background: linear-gradient(98deg, rgba(200,238,238,1) 15%, rgba(180,222,227,1) 33%, rgba(227,236,237,1) 61%, rgba(172,228,235,1) 88%);
         padding: 10px;
         }
         .thamaya-reg {
         position: relative;
         background-color: #0d484e;
         padding: 0px 10px;
         }
         .thamaya-img {
         width: 250px;
         height: auto;
         }
         h4.thamaya-reg {
         font-size: 30px;
         font-weight: 700;
         }
         span.fs-1 {
         font-size: 50px !important;
         margin-left: 75px;
         font-weight: 700;
         }
         .animate__fadeIn {
         animation: fadeIn 1s ease-out;
         }
         h4.thamaya-reg:after {
         width: 100%;
         height: 100%;
         position: absolute;
         right: 0;
         top: 0;
         background: #0d484e;
         content: '';
         left: 100%;
         }
         /* Green border on focus */
         .focus-input:focus {
         border-color: #0d484e !important;
         box-shadow: 0 0 8px rgb(7, 156, 109) !important;
         }
         /* Ensure smooth transition on focus */
         .focus-input {
         transition: border-color 0.3s ease, box-shadow 0.3s ease;
         }
         /* Input fields animation */
         .focus-input:focus {
         animation: inputFocusAnimation 0.3s ease-out;
         }
         /* Adding smooth focus animation */
         @keyframes inputFocusAnimation {
         0% {
         transform: scale(1);
         }
         100% {
         transform: scale(1.05);
         }
         }
         /* Ensure responsiveness */
         @media (max-width: 768px) {
         .thamaya-img {
         max-width: 100%;
         }
         .form-label {
         color: #0d484e;
         font-weight: 500;
         font-size: 16px;
         white-space: nowrap;
         }
         .form_smx {
         display: flex;
         flex-direction: column;
         }
         }
         .form_smx .form-control {
         border: none; /* Remove all borders */
         border-bottom: 1px solid #0d484e;/* Add a border at the bottom */
         border-radius: 0; /* Ensure no rounding of corners */
         transition: border-color 0.3s ease; /* Smooth transition for hover or focus */
        }

        .form_smx .form-control:focus {
         outline: none; /* Remove the default focus outline */
         border-bottom: 2px solid #007bff; /* Change the bottom border color on focus */
         box-shadow: none; /* Prevent any default box shadow */
        }

        .btn-submit {
        background-color: #0d484e; /* Dark green */
        color: #fff; /* White text */
        font-size: 18px;
        font-weight: 600;
        padding: 10px 30px;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        transition: all 0.3s ease;
        }

        .btn-submit:hover {
        background-color: #066c63; /* Slightly brighter green */
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); /* Add hover effect shadow */
        transform: scale(1.05); /* Slight zoom effect */
        }

        .btn-submit:focus {
        outline: none; /* Remove focus outline */
}

      </style>
   </head>
   <body>
      <section class="thamaya_sec">
         <div class="container">
            <div class="animate__animated animate__fadeIn position-relative pt-5">
               <div class="d-flex justify-content-between align-items-center mb-4">
                  <div class="mx-auto mx-lg-0">
                     <img src="assets/img/thamaya.png" alt="" class="thamaya-img">
                  </div>
                  <div class="text-light d-flex align-items-center d-none d-sm-block">
                     <h4 class="thamaya-reg py-3 text-right">
                        REGISTRATION <br>
                        <span class="fs-1">FORM</span>
                     </h4>
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <form class="px-0 px-md-5" method="POST" action="{{ route('register.store') }}">
                @csrf
                <div class="row mb-3">
                    <div class="form_smx col-md-12 d-flex mt-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control w-100 ms-4 rounded-0 animate__animated animate__fadeIn focus-input" id="name" placeholder="Enter name">
                    </div>
                    <div class="form_smx col-md-12 d-flex mt-3">
                        <label for="father-spouse-name" class="form-label">Father / Spouse Name</label>
                        <input type="text" name="father_spouse_name" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="father-spouse-name" placeholder="Enter father or spouse name">
                    </div>
                    <div class="form_smx col-12 d-flex mt-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="address" rows="3" placeholder="Enter Your address"></textarea>
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="locality-area" class="form-label">Locality Area</label>
                        <input type="text" name="locality_area" class="form-control w-100 ms-2 rounded-0 animate__animated animate__fadeIn focus-input" id="locality-area" placeholder="Enter locality area">
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="city" placeholder="Enter city">
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="district" class="form-label">District</label>
                        <input type="text" name="district" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="district" placeholder="Enter district">
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" name="state" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="state" placeholder="Enter state">
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="contact-no" class="form-label">Contact No</label>
                        <input type="text" name="contact_no" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="contact-no" placeholder="Enter contact number">
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="alternative-no" class="form-label">Alternative No</label>
                        <input type="text" name="alternative_no" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="alternative-no" placeholder="Enter alternative number">
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="mail-id" class="form-label">Mail ID</label>
                        <input type="email" name="mail_id" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="mail-id" placeholder="Enter email address">
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="marital-status" class="form-label">Marital Status</label>
                        <input type="text" name="marital_status" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="marital-status" placeholder="Enter marital status">
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="family-members" class="form-label">Family Members</label>
                        <input type="text" name="family_members" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="family-members" placeholder="Enter family members">
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="company-name" class="form-label">Company Name</label>
                        <input type="text" name="company_name" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="company-name" placeholder="Enter company name">
                    </div>
                    <div class="form_smx col-md-12 d-flex mt-3">
                        <label for="company-address" class="form-label">Company Address / Residential Address</label>
                        <textarea name="company_address" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="company-address" rows="3" placeholder="Enter company or residential address"></textarea>
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="product-details" class="form-label">Product Details</label>
                        <input type="text" name="product_details" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="product-details" placeholder="Enter product details">
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="product-category" class="form-label">Product Category</label>
                        <input type="text" name="product_category" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="product-category" placeholder="Enter product category">
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="target-audience" class="form-label">Target Audience</label>
                        <input type="text" name="target_audience" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="target-audience" placeholder="Enter target audience">
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="social-media-links" class="form-label">Social Media Links</label>
                        <input type="text" name="social_media_links" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="social-media-links" placeholder="Enter social media links">
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="product-cost" class="form-label">Product Cost</label>
                        <input type="number" name="product_cost" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="product-cost" placeholder="Enter product cost">
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="id-proof" class="form-label">ID Proof</label>
                        <input type="text" name="id_proof" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="id-proof" placeholder="Enter ID proof">
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" name="age" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="age" placeholder="Enter age">
                    </div>
                    <div class="form_smx col-md-6 d-flex mt-3">
                        <label for="date-of-birth" class="form-label">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="date-of-birth">
                    </div>
                    <div class="form_smx col-12 d-flex mt-3">
                        <label for="services-needed" class="form-label">Services Needed</label>
                        <textarea name="services_needed" class="form-control w-100 ms-3 rounded-0 animate__animated animate__fadeIn focus-input" id="services-needed" rows="3" placeholder="Enter services needed"></textarea>
                    </div>
                </div>
                <div class="form_smx col-12 d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-submit">Submit</button>
                </div>
            </form>
         </div>
      </section>
      <!-- Bootstrap JS and dependencies (jQuery and Popper.js) -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.6/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   </body>
</html>
