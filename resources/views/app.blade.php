<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else

    @endif

    <style>
        :root {
            --primary-dark-color: #000
        }

        body {
            background-color: var(--primary-dark-color) !important;
            scroll-behavior: smooth;
        }

        .header {
            border-bottom: 1px solid #1B1B1B;
            background: url('images/bg.png') !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 220px;
        }

        .heading {
            font-family: Montserrat;
            font-size: 35px;
            font-weight: 700;
            text-transform: uppercase;
            background: linear-gradient(180deg, #FFF 0%, #FFCB48 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            align-self: stretch;
        }

        .subheading {
            color: #A3A3A3;
            font-family: Montserrat;
            font-size: 16px;
            font-weight: 500;
        }

        label {
            color: #FFF;
            font-family: Montserrat;
            font-size: 16px;
            font-weight: 400;
            margin-bottom: 12px !important;
            margin-top: 10px;
        }

        form input {
            border-radius: 16px !important;
            background: #212121 !important;
            color: #8D8C8C !important;
            padding: 10px 0 10.81px 19px !important;
            align-self: stretch;
            border: none !important;
            width: 100%;
        }

        form select {
            border-radius: 16px !important;
            background-color: #212121 !important;
            color: #8D8C8C !important;
            padding: 10px 0 10.81px 19px !important;
            align-self: stretch;
            border: none !important;
        }

        form option {
            /* color: #8D8C8C; */
            color: #FFF;
            background: #212121;
            font-family: Montserrat;
            font-size: 16px;
            font-weight: 500;
            line-height: var(--line-height-24, 24px);
        }

        input::placeholder {
            color: hsl(0, 0%, 55%) !important;
            font-family: Montserrat;
            font-size: 16px;
            font-weight: 500;
            line-height: var(--line-height-24, 24px);
        }

        .foot-text {
            color: #A3A3A3;
            font-family: Montserrat;
            font-size: 15px;
            font-weight: 400;
            margin-bottom: 10px;
        }

        button {
            align-self: stretch;
            font-family: Montserrat;
            border-radius: 16px !important;
            background: #FFCB48 !important;
            text-align: center;
            padding: 16px 0 15px 0 !important;
            align-items: center;
            width: 100%;
            font-weight: 700 !important;
            font-size: 20px !important;
        }

        footer {
            /* width: 100%; */
            height: 64px;
            background: linear-gradient(182deg, #000 -10.26%, #717070 116.96%), linear-gradient(180deg, #FFCB48 0%, #E9E9E9 100%);
            box-shadow: 0 5.465px 8.47px 0 rgba(0, 0, 0, 0.25);
            align-items: baseline
        }

        .logo {
            width: 155.03px;
            height: 40.272px;
        }

        a {
            color: #FFF !important;
            /* font-family: Montserrat; */
            font-size: 14px !important;
            font-weight: 400 !important;
            line-height: 120%;
            letter-spacing: 1.352px;
            text-transform: uppercase;
            text-decoration: none !important;
        }

        .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        /* Header responsive */
        @media (max-width: 768px) {
            .header {
                height: auto;
                padding: 20px 0;
                text-align: center;
            }

            .heading {
                font-size: 24px;
            }

            .subheading {
                font-size: 14px;
            }
        }

        /* Make mobile number input stack properly */
        @media (max-width: 576px) {
            .form-group .d-flex {
                flex-direction: column;
            }

            #phoneCode {
                max-width: 100% !important;
                margin-bottom: 10px;
            }

            .ms-2 {
                margin-left: 0 !important;
            }
        }

        /* Footer responsive */
        @media (max-width: 768px) {
            footer {
                flex-direction: column;
                align-items: center !important;
                text-align: center;
                height: auto;
                padding: 15px 0;
            }

            .logo {
                margin-bottom: 10px;
            }
        }

        /* Make form spacing better on mobile */
        @media (max-width: 576px) {

            form input,
            form select {
                font-size: 14px;
                padding: 10px 15px !important;
            }

            button {
                font-size: 16px !important;
                padding: 12px 0 !important;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <header class="header container d-flex flex-column justify-content-start py-2">
            <div>
                <img class="img-fluid" src="{{ asset('images/VM-White-Logo.png') }}" alt="vm logo">
            </div>
            <h1 class="heading mt-4 w-100">Visitor Registration</h1>
            <span class="subheading">Please fill in the details below to check in.</span>
        </header>

        <main class="container rounded-2">
            <div class="form-details">
                <form action="submit" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" name="firstName" id="firstName"
                                placeholder="Enter First Name" required>
                            <small class="text-danger" id="firstNameError" style="display:none;"></small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" name="lastName" id="lastName"
                                placeholder="Enter Last Name" required>
                            <small class="text-danger" id="lastNameError" style="display:none;"></small>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="mobileNumber">Mobile Number</label>
                        <div class="d-flex">
                            <input type="text" class="form-control" id="phoneCode" value="+91" readonly
                                style="max-width: 70px;">
                            <input type="text" class="form-control ms-2" name="mobileNumber" id="mobileNumber"
                                placeholder="Enter 10-digit number" maxlength="10" required>
                        </div>
                        <small class="text-danger" id="mobileNumberError" style="display:none;"></small>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email ID</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email ID"
                            required>
                    </div>


                    <div class="form-group mb-3">
                        <label for="visit">Purpose of Visit</label>
                        <select class="form-control form-select" id="visit" required onchange="showOtherInput()">
                            <option value="" selected>--Select--</option>
                            <option value="Interview">Interview</option>
                            <option value="Meeting">Meeting</option>
                            <option value="Maintainence">Maintainence</option>
                            <option value="other">Other</option>
                        </select>
                        <div id="otherInput" style="display: none; margin-top: 10px;">
                            <label for="otherOption">Specify other:</label> <br>
                            <input type="text" id="otherOption" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="person">Person to Meet</label>
                        <input type="text" class="form-control" name="person" id="person" placeholder="Enter Name"
                            required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="dept">Department</label>
                        <select class="form-control form-select" id="dept" required onchange="showOtherInput()">
                            <option value="" selected>--Select--</option>
                            <option value="HR">HR</option>
                            <option value="IT">IT</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Research Analyst">Research Analyst</option>
                            <option value="Sales">Sales</option>
                            <option value="Telemarketing">Telemarketing</option>
                            <option value="MIS">MIS</option>
                            <option value="Management">Management</option>
                            <option value="other">Other</option>
                        </select>
                        <div id="otherInput2" style="display: none; margin-top: 10px;">
                            <label for="otherOption">Specify other:</label> <br>
                            <input type="text" id="otherOption2" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="identity">ID Type</label>
                        <select class="form-control form-select" id="identity" required onchange="showOtherInput()">
                            <option value="" selected>--Select--</option>
                            <option value="Aadhar Card">Aadhar Card</option>
                            <option value="Pan Card">Pan Card</option>
                            <option value="Driving License">Driving License</option>
                            <option value="other">Other</option>
                        </select>
                        <div id="otherInput3" style="display: none; margin-top: 10px;">
                            <label for="otherOption">Specify other:</label> <br>
                            <input type="text" id="otherOption3" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="idNumber">ID Number</label>
                        <input type="text" class="form-control" name="idNumber" id="idNumber"
                            placeholder="Enter ID Number" required>
                        <small class="text-danger" id="idNumberError" style="display:none;"></small>
                    </div>

                    <div class="form-group mb-3">
                        <label for="dob">Birth Year</label>
                        <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter Birth Year"
                            required>
                    </div>

                    <span class="foot-text">Your information is secure and used only for office entry.</span>

                    <button type="submit" class="btn btn-submit mt-4 mb-4">
                        Check In
                    </button>
                </form>
            </div>
        </main>

        <footer class="container d-flex  justify-content-between px-3">
            <div class="logo py-2">
                <img class="img-fluid" src="{{ asset('images/VM-White-Logo.png') }}" alt="vmlogo">
            </div>
            <div class="mt-3">
                <a href="https://vereigenmedia.com/" target="_blank">WWW.VEREIGENMEDIA.COM</a>
            </div>
        </footer>

    </div>
    <script src="register.js"></script>
</body>

</html>