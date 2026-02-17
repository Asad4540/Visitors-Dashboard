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

                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('visitors.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                name="first_name" id="first_name" value="{{ old('first_name') }}"
                                placeholder="Enter First Name" required>
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                name="last_name" id="last_name" value="{{ old('last_name') }}"
                                placeholder="Enter Last Name" required>
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Mobile --}}
                    <div class="form-group mb-3">
                        <label for="mobile">Mobile Number</label>
                        <input type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                            id="mobile" value="{{ old('mobile') }}" placeholder="Enter 10-digit number"
                            pattern="[0-9]{10}" maxlength="10" required>
                        @error('mobile')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="form-group mb-3">
                        <label for="email">Email ID</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" value="{{ old('email') }}" placeholder="Enter Email ID" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Purpose --}}
                    <div class="form-group mb-3">
                        <label for="purpose">Purpose of Visit</label>
                        <select class="form-control form-select @error('purpose') is-invalid @enderror" name="purpose"
                            id="purpose" required>
                            <option value="">--Select--</option>
                            <option value="interview" {{ old('purpose') == 'interview' ? 'selected' : '' }}>Interview</option>
                            <option value="meeting" {{ old('purpose') == 'meeting' ? 'selected' : '' }}>Meeting</option>
                            <option value="maintenance" {{ old('purpose') == 'maintenance' ? 'selected' : '' }}>Maintenance
                            </option>
                            <option value="other" {{ old('purpose') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('purpose')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Person To Meet --}}
                    <div class="form-group mb-3">
                        <label for="person_to_meet">Person to Meet</label>
                        <input type="text" class="form-control" name="person_to_meet" id="person_to_meet"
                            value="{{ old('person_to_meet') }}" placeholder="Enter Name">
                    </div>

                    {{-- Department --}}
                    <div class="form-group mb-3">
                        <label for="department">Department</label>
                        <select class="form-control form-select" name="department" id="department">
                            <option value="">--Select--</option>
                            <option value="hr">HR</option>
                            <option value="it">IT</option>
                            <option value="marketing">Marketing</option>
                            <option value="ra">Research Analyst</option>
                            <option value="sales">Sales</option>
                            <option value="telemarketing">Telemarketing</option>
                            <option value="mis">MIS</option>
                            <option value="management">Management</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    {{-- ID Type --}}
                    <div class="form-group mb-3">
                        <label for="id_type">ID Type</label>
                        <select class="form-control form-select" name="id_type" id="id_type">
                            <option value="">--Select--</option>
                            <option value="aadhar">Aadhar Card</option>
                            <option value="passport">Passport</option>
                            <option value="driving_license">Driving License</option>
                            <option value="voter_id">Voter ID</option>
                        </select>
                    </div>

                    {{-- ID Number --}}
                    <div class="form-group mb-3">
                        <label for="id_number">ID Number</label>
                        <input type="text" class="form-control" name="id_number" id="id_number"
                            value="{{ old('id_number') }}" placeholder="Enter ID Number">
                    </div>

                    {{-- Birth Year --}}
                    <div class="form-group mb-3">
                        <label for="birth_year">Birth Year</label>
                        <input type="number" class="form-control" name="birth_year" id="birth_year"
                            value="{{ old('birth_year') }}" placeholder="Enter Birth Year" min="1950"
                            max="{{ date('Y') }}" required>
                    </div>

                    <span class="foot-text">
                        Your information is secure and used only for office entry.
                    </span>

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