<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Tracer</title>
    <link rel="stylesheet" href="css\Login.Css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <script src="node_modules\sweetalert2\dist\sweetalert2.all.min.js"></script>
</head>

<style>
    .RegistrationForm {
        max-width: 600px;
    }

    .alumniTracerLogo {
        color: #1877f2;
        font-size: 4rem;
        margin-bottom: 10px;
    }
</style>
<p id="message"></p>
<body>
    <div class="d-flex justify-content-center alumniTracerLogo" style="margin-top:1rem;">
        <h1>Alumni Tracer</h1>
    </div>
    <div class="d-flex justify-content-center">
        <form class="RegistrationForm">
            <div class="form-row">
                <div class="col-7">
                    <input type="text" class="form-control"  id="firstname" placeholder="First Name">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                </div>
                <!-- <div class="col">
                    <input type="text" class="form-control" placeholder="Zip">
                </div> -->
            </div>
            <div class="form-row">
                <div class="col-7">
                    <input type="text" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="col">
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="Course" name="Course" placeholder="Course">
                </div>
                <div class="col">
                    <label>Year Graduated:</label>
                    <input type="Date" class="form-control" id="YearGraduated" placeholder="Year Graduated">
                </div>
            </div>
            <div class="form-row">
                <button type="button" id="register" class="btn btn-primary btn-lg btn-block">Register</button>
            </div>
        </form>

        <script>
            $(function () {
                var Courses = [
                    "BS-IT",
                    "BS-IS",
                    "BS-CS",
                ];
                $("#Course").autocomplete({
                    source: Courses
                });
            });

           

            const ButtonRegister =document.getElementById('register');
            ButtonRegister.addEventListener('click',SaveData);




            function SaveData(){

            const FirstName =document.getElementById("firstname").value;
            const lastname =document.getElementById('lastname').value;
            const email =document.getElementById('email').value;
            const Password =document.getElementById('password').value;
            const course =document.getElementById('Course').value;
            const YearGraduated =document.getElementById('YearGraduated').value;



            console.log(FirstName,lastname,email,Password,course,YearGraduated);

            $.ajax({
            url: "classes/Controller.php?a=Save_AlumniData",
            method: 'POST',
            data: { 
                FirstName: FirstName,
                lastname: lastname,
                email: email,
                Password: Password,
                course:course,
                YearGraduated: YearGraduated
             },
            error: err => {
                console.log(err)
                alert(err);
            },
            success: function(resp) {
                Swal.fire({
                    icon: "success",
                    text: 'Alumni Data Saved',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 1500,
                }).then(function () {
                    window.location.href = "Login.php";
                })
            }
        })
            }

        </script>
</body>