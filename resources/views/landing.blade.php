<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pabustan Birthing Clinic</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css">
    <link href="{{Vite::asset('resources/css/styles.css')}}" rel="stylesheet" />

</head>
<body>
    <header">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <img src="img/logo.png" alt="Pabustan Birthing Clinic" class="img-fluid logo">
                    
                </div>
                
                <div class="col-auto">
                    <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#appointmentModal">
                            BOOK APPOINTMENT
                        </button>

                        <div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-dark" id="appointmentModalLabel">SELECT APPOINTMENT:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-left text-dark">
                                        <form method="post">
                                            <div class="form-group">
                                                <label for="name">Full Name:</label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone Number:</label>
                                                <input type="tel" class="form-control" id="phone" name="phone" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="date">Date:</label>
                                                <input type="date" class="form-control" id="date" name="date" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="time">Time:</label>
                                                <input type="time" class="form-control" id="time" name="time" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="reason">Reason for Appointment:</label>
                                                <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Schedule Appointment</button>
                                            <div class="success-msg"></div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="call-to-action text-white text-center" >
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h2 class="mb-4 fa-duotone fa-font-case">THANK YOU FOR VISITING!</h2>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        LOGIN
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="exampleModalLabel">LOGIN:</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-left text-dark">
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="username">Username:</label>
                                            <input type="text" class="form-control" id="username" name="username" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">Login</button>
                                        <div class="error-msg">
                                    
                                        </div>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section id="services ">
    <div class="container text-center">
        <h2 class="fa-duotone fa-message-text">Our Services</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="img/service1.png" class="card-img-top" alt="Service 1">
                    <div class="card-body">
                        <h5 class="card-title">Pre-Natal Care</h5>
                        <p class="card-text">We provide comprehensive pre-natal care to ensure the health of both mother
                            and baby throughout the pregnancy.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="img/service2.png" class="card-img-top" alt="Service 2">
                    <div class="card-body">
                        <h5 class="card-title">Labor and Delivery</h5>
                        <p class="card-text">Our experienced staff is trained to support you through labor and delivery
                            to ensure a safe and comfortable birth experience.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="img/service3.png" class="card-img-top" alt="Service 3">
                    <div class="card-body">
                        <h5 class="card-title">Post-Natal Care</h5>
                        <p class="card-text">We provide post-natal care to help new mothers adjust to their new roles
                            and ensure the health and well-being of  mother and baby.</p>
                    </div>
                </div>
            </div>
        </div>
        <p>We also provide specialized care for high-risk pregnancies, as well as support for breastfeeding and
            lactation. Our team is dedicated to providing compassionate care and support for you and your growing family
            every step of the way.</p>
    </div>
</section>

<section id="staff">
    <div class="container">
        <h2>Meet Our Staff</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="img/doctor-1.jpg" class="card-img-top" alt="Doctor 1">
                    <div class="card-body">
                        <h5 class="card-title">Dr. Jane Smith</h5>
                        <p class="card-text">Obstetrician / Gynecologist</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="img/nurse-1.jpg" class="card-img-top" alt="Nurse 1">
                    <div class="card-body">
                        <h5 class="card-title">Nurse Sarah Johnson</h5>
                        <p class="card-text">Certified Nurse Midwife</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="img/admin-1.jpg" class="card-img-top" alt="Admin 1">
                    <div class="card-body">
                        <h5 class="card-title">Mary Brown</h5>
                        <p class="card-text">Office Manager</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <script>
    const form = document.querySelector('form');
    form.addEventListener('submit', (event) => {
        event.preventDefault(); // prevent default form submission behavior
        const formData = new FormData(form); // create a new FormData object from the form data
        fetch('submit-form.php', { // replace 'submit-form.php' with the URL of your form submission endpoint
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (response.ok) {
                    // show success message and clear form inputs
                    document.querySelector('.success-msg').textContent = 'Appointment scheduled successfully!';
                    form.reset();
                } else {
                    // show error message
                    document.querySelector('.error-msg').textContent = 'An error occurred. Please try again later.';
                }
            })
            .catch(error => {
                // show error message
                document.querySelector('.error-msg').textContent = 'An error occurred. Please try again later.';
            });
    });
</script> -->

    <script src="https://kit.fontawesome.com/fb000b0aeb.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>