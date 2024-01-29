<x-guest-layout>
    <section class="full-screen body-font bg-bottom bg-no-repeat solid-bg-bgmain"
        style="background-image: url('../img/wave (7).svg');">
        <div class="flex items-center justify-center py-40 pt-36 mt-16 w-full">
            <div class="text-gray-800 rounded-3xl shadow-xl w-full overflow-hidden bg-no-repeat"
                style="background-image: url('../img/blob-scene-haikei (6).svg'); max-width:1000px">
                <div class="md:flex md:px-10 sm:px-10 h-full">

                    <div class="w-full md:w-1/3.5 py-10 px-5 md:px-10" x-data="storeAccount">
                        <div class="text-center mb-10">
                            <h1 class="font-bold text-3xl text-gray-900">REGISTER</h1>
                            <p>Enter your information to register</p>
                        </div>
                        {{-- <form method="POST" action="{{ route('register') }}" name="registrationForm"
                            id="registrationForm" enctype="multipart/form-data"> --}}
                        <form method="POST" action="{{ route('register') }}" name="registrationForm"
                            id="registrationForm" enctype="multipart/form-data" onsubmit="return validateForm()">
                            @csrf
                            <h1 class=" text-xl pl-2">Personal Information:</h1>
                            <div class="flex -mx-2">
                                <div class="formGroup w-1/2 px-3 mb-5 mt-2">
                                    <div class="flex space-x-2">
                                        <label for="first_name" class="text-xs font-semibold px-1">First name</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                    </div>
                                    <div class="flex items-center relative">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-500 text-lg"></i>
                                        </div>

                                        <input type="text" name="first_name" id="first_name" maxlength="20"
                                            minlength="2"
                                            class="form-control w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3 @error('first_name') border-red-500 @enderror"
                                            placeholder="First Name" oninput="clearError(this, true)" ... />
                                        <span class="error text-red-700 text-xs  absolute -bottom-4 left-0">
                                            @error('first_name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="formGroup w-1/2 px-3 mb-5 mt-2">
                                    <div class="flex space-x-2">
                                        <label for="middle_name" class="text-xs font-semibold px-1">Middle Name</label>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex items-center relative">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="middle_name" id="middle_name" maxlength="20"
                                            minlength="2"
                                            class="form-control w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Middle Name" />
                                        @error('middle_name')
                                            <p class="text-red-500">{{ $message }}</p>
                                        @enderror
                                        {{-- <span class="error-icon hidden -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span> --}}
                                    </div>
                                </div>
                                <div class="formGroup w-1/2 px-3 mb-5 mt-2">
                                    <div class="flex space-x-2">
                                        <label for="last_name" class="text-xs font-semibold px-1">Last Name</label>
                                        <p class="text-red-500 text-center text-xs">*</p>

                                    </div>
                                    <div class="flex items-center relative">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="last_name" id="last_name" maxlength="20"
                                            minlength="2"
                                            class="form-control w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3 @error('last_name') border-red-500 @enderror"
                                            placeholder="Last Name" oninput="clearError(this, true)" ... />
                                        <span class="error text-red-700 text-xs  absolute -bottom-4 left-0">
                                            @error('last_name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        {{-- <span class="error-icon hidden -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="flex -mx-2">
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <div class="flex space-x-2">
                                        <label for="address" class="text-xs font-semibold px-1">Address</label>
                                        <p class="text-red-500 text-center text-xs">*</p>

                                    </div>
                                    <div class="flex items-center relative">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-home-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="address" custommaxlength="20" minlength="2" id="address"
                                            class="form-control w-full -ml-10 pl-10 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3 @error('address') border-red-500 @enderror"
                                            placeholder="Address...." oninput="clearError(this, true)" ...>
                                            <span class="error text-red-700 text-xs  absolute -bottom-4 left-0">
                                                @error('address')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        {{-- <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span> --}}
                                    </div>
                                </div>
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <div class="flex space-x-2">
                                        <label for="course" class="text-xs font-semibold px-1">Course</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex items-center relative">
                                        <select
                                            class="form-control w-full py-2 pl-4 rounded-lg border-2 border-gray-200 outline-none focus:border-green3 capitalize @error('course') border-red-500 @enderror"
                                            id="course" name="course" oninput="clearError(this, true)" ...>
                                            <option selected value="">Select Course</option>
                                            <option class="bg-white" value="BSE">📚 Bachelor of Secondary Education
                                            </option>
                                            <option class="bg-white" value="BSBM">📚 BS Business Management</option>
                                            <option class="bg-white" value="BSCS">📚 BS Computer Science</option>
                                            <option class="bg-white" value="BSC">📚 BS Criminology</option>
                                            <option class="bg-white" value="BSHM">📚 BS Hospitality Management
                                            </option>
                                            <option class="bg-white" value="BSIT">📚 BS Information Technology
                                            </option>
                                            <option class="bg-white" value="BSP">📚 BS Psychology</option>
                                        </select>
                                        <span class="error text-red-700 text-xs  absolute -bottom-4 left-0">
                                            @error('course')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        {{-- <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-2">
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <div class="flex space-x-2">
                                        <label for="sex" class="text-xs font-semibold px-1">Sex</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex items-center relative">
                                        <select
                                            class="form-control w-full py-2 pl-4  rounded-lg border-2 border-gray-200 outline-none focus:border-green3 capitalize @error('sex') border-red-500 @enderror"
                                            id="sex" name="sex" oninput="clearError(this, true)" ...>
                                            <option selected value="" class="bg-white">Select Sex</option>
                                            <option class="bg-white" value="Male"><span
                                                    class="text-blue-500">♂</span> Male</option>
                                            <option class="bg-white" value="Female"><span
                                                    class="text-pink-500">♀</span> Female</option>
                                            <option class="bg-white" value="Prefer not to say">Prefer not to say
                                            </option>
                                        </select>
                                        <span class="absolute top-1/2 left-3 transform -translate-y-1/2">
                                            <!-- Male Symbol in Blue -->

                                            <!-- Female Symbol in Pink -->
                                        </span>
                                            <span class="error text-red-700 text-xs  absolute -bottom-4 left-0">
                                                @error('sex')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                    </div>
                                </div>

                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <div class="flex space-x-2">
                                        <label for="student_id" class="text-xs font-semibold px-1">Student ID</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex items-center relative">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-identifier text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="student_id" id="student_id" maxlength="15" minlength="6"
                                            class="form-control w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3 @error('student_id') border-red-500 @enderror"
                                            placeholder="Student ID" pattern="[0-9]+" oninput="clearError(this, true)" ...
                                            title="Please enter numbers only" >
                                            <span class="error text-red-700 text-xs  absolute -bottom-4 left-0">
                                                @error('student_id')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        {{-- <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span> --}}
                                    </div>
                                </div>
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <div class="flex space-x-2">
                                        <label for="contact_number" class="text-xs font-semibold px-1">Contact
                                            Number</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex items-center relative">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-cellphone-android text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="contact_number" id="contact_number"
                                            class="form-control w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3 @error('contact_number') border-red-500 @enderror"
                                            placeholder="09xxxxxxxxx" pattern="[0-9]+"
                                            title="Please enter numbers only" minlength="11" maxlength="11" oninput="clearError(this, true)" ...>
                                            <span class="error text-red-700 text-xs  absolute -bottom-4 left-0">
                                                @error('contact_number')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        {{-- <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="flex -mx-2">
                                <div class="formGroup w-1/2 px-3 mb-5 mt-2">
                                    <div class="flex space-x-2">
                                        <label for="email" class="text-xs font-semibold px-1">Email
                                            Address</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex items-center relative">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-email-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="email" name="email" id="email" maxlength="50" minlength="5"
                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                            class="form-control w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3 @error('email') border-red-500 @enderror"
                                            placeholder="cvsubacoor@gmail.com" oninput="clearError(this, true)" ...>
                                            <span class="error text-red-700 text-xs  absolute -bottom-4 left-0">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                            {{-- <span class="error-icon hidden -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span> --}}
                                    </div>
                                </div>

                                <div class="formGroup w-1/2 px-3 mb-5 mt-2">
                                    <div class="flex space-x-2">
                                        <label for="confirm_password" class="text-xs font-semibold px-1">Password</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex items-center relative">
                                        <div class="relative">
                                            <input type="password" id="confirm_password" name="confirm_password"
                                                class="form-control w-72 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3 @error('password') border-red-500 @enderror"
                                                placeholder="************" minlength="8" maxlength="20" oninput="clearError(this, true)" ...>
                                            <i onclick="togglePasswordVisibility('confirm_password')"
                                                class="absolute top-1/2 right-3 transform -translate-y-1/2 cursor-pointer">
                                                <i id="toggle_icon"
                                                    class="mdi mdi-eye-off-outline text-gray-400 text-lg"></i>
                                            </i>
                                            <div class="absolute top-1/2 left-3 transform -translate-y-1/2">
                                                <i class="mdi mdi-lock-outline text-gray-500 text-lg"></i>
                                            </div>
                                        </div>
                                        <span class="error text-red-700 text-xs  absolute -bottom-4 left-0">
                                            @error('confirm_password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        {{-- <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span> --}}
                                    </div>
                                </div>
                                <script>
                                    // Function to set the input value in local storage
                                    function saveInputValue() {
                                        var passwordInput = document.getElementById('confirm_password');
                                        localStorage.setItem('passwordInputValue', passwordInput.value);
                                    }

                                    // Function to load the input value from local storage on page load
                                    function loadInputValue() {
                                        var passwordInput = document.getElementById('confirm_password');
                                        var storedValue = localStorage.getItem('passwordInputValue');

                                        if (storedValue) {
                                            passwordInput.value = storedValue;
                                        }
                                    }

                                    // Attach the 'loadInputValue' function to the 'window.onload' event
                                    window.onload = loadInputValue;

                                    // Add an input event listener to save the input value in local storage
                                    document.getElementById('confirm_password').addEventListener('input', function () {
                                        saveInputValue();
                                    });
                                    </script>
                                <div class="formGroup w-1/2 px-3 mb-5 mt-2">
                                    <div class="flex space-x-2">
                                        <label for="confirm_password_confirmation" class="text-xs font-semibold px-1">Confirm
                                            Password</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex items-center relative">
                                        <div class="relative">
                                            <input type="password" id="confirm_password_confirmation" name="confirm_password_confirmation"
                                                class="form-control w-72 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3 @error('confirm_password') border-red-500 @enderror"
                                                placeholder="************" oninput="clearError(this, true)" ...>
                                            <i onclick="togglePasswordVisibility('confirm_password_confirmation')"
                                                class="absolute top-1/2 right-3 transform -translate-y-1/2 cursor-pointer">
                                                <i id="toggle_icon_confirm"
                                                    class="mdi mdi-eye-off-outline text-gray-400 text-lg"></i>
                                            </i>
                                            <div class="absolute top-1/2 left-3 transform -translate-y-1/2">
                                                <i class="mdi mdi-lock-outline text-gray-500 text-lg"></i>
                                            </div>
                                        </div>
                                        <span class="error text-red-700 text-xs  absolute -bottom-4 left-0">
                                            @error('confirm_password_confirmation')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        {{-- <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-2">
                                <div class="formGroup w-1/2 px-3 mb-5 mt-2">
                                    <div class="flex space-x-2">
                                        <label for="student_cor" class="text-xs font-semibold px-1 pb-2">Upload
                                            Student ID or COR PDF:</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex items-center relative">
                                        <input type="file" name="student_cor" id="student_cor" accept="image/*, .pdf"
                                            class="form-control border rounded-lg @error('student_cor') border-red-500 @enderror">
                                        <span class="error text-red-700 text-xs  absolute -bottom-4 left-0">
                                            @error('stundet_cor')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        {{-- <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row items-center justify-center">
                                <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                                    <a href="{{ route('login') }}"
                                        class="button3 uppercase block w-full max-w-xs mx-auto font-semibold bg-yellowmain hover:bg-yellow-500 text-center rounded-lg px-3 py-3 md:mx-0">Back
                                        to login</a>
                                </div>
                                <div class="w-full md:w-1/2 px-3 mb-1 md:ml-4">
                                    <button
                                        class="buttonh block w-full max-w-xs mx-auto font-semibold bg-yellowmain hover:bg-yellow-500 text-center rounded-lg px-3 py-3 md:mx-0">Register
                                        Now
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function togglePasswordVisibility(inputId) {
                const input = document.getElementById(inputId);
                const icon = document.getElementById(inputId === 'confirm_password' ? 'toggle_icon' : 'toggle_icon_confirm');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('mdi-eye-off-outline');
                    icon.classList.add('mdi-eye-outline');
                } else {
                    input.type = 'password';
                    icon.classList.remove('mdi-eye-outline');
                    icon.classList.add('mdi-eye-off-outline');
                }
            }
        </script>
        {{-- <script>
            const validateForm = (formSelector) => {
                return new Promise((resolve, reject) => {

                    const formElement = document.querySelector(formSelector);

                    const validateOptions = [{
                            attribute: 'minlength',
                            isValid: input => input.value && input.value.length >= parseInt(input.minLength,
                                10),
                            errorMessage: (input, label) => needs at least $ {
                                input.minLength
                            }
                            characters
                        },
                        {
                            attribute: 'custommaxlength',
                            isValid: input => input.value && input.value.length <= parseInt(input.getAttribute(
                                'custommaxlength'), 10),
                            errorMessage: (input, label) =>
                                needs to be less than $ {
                                    input.getAttribute('custommaxlength')
                                }
                            characters
                        },
                        {
                            attribute: 'match',
                            isValid: input => {
                                const matchSelector = input.getAttribute('match');
                                const matchedElement = formElement.querySelector(#$ {
                                    matchSelector
                                });
                                return matchedElement && matchedElement.value.trim() === input.value.trim();
                            },
                            errorMessage: (input, label) => {
                                const matchSelector = input.getAttribute('match');
                                const matchedElement = formElement.querySelector(#$ {
                                    matchSelector
                                });
                                const matchedLabel = matchedElement.parentElement.parentElement
                                    .parentElement
                                    .querySelector('label');
                                return should match $ {
                                    matchedLabel.textContent
                                };
                            },
                        },
                        {
                            attribute: 'pattern',
                            isValid: input => {
                                const patternRegex = new RegExp(input.pattern);
                                return patternRegex.test(input.value);
                            },
                            errorMessage: (input, label) => is not valid!,
                        },
                        {
                            attribute: 'required',
                            isValid: input => input.value.trim() !== '',
                            errorMessage: (input, label) => is required!,
                            errorMessage: (selector, label) => is required!
                        },

                    ];

                    const validateSingleFormGroup = formGroup => {
                        const label = formGroup.querySelector('label');
                        const input = formGroup.querySelector('input, textarea');
                        const selector = formGroup.querySelector('selector, textarea');
                        const errorContainer = formGroup.querySelector('.error');
                        const errorIcon = formGroup.querySelector('.error-icon');
                        const successIcon = formGroup.querySelector('.success-icon');

                        let formGroupError = false;

                        for (const option of validateOptions) {
                            if (input.hasAttribute(option.attribute) && !option.isValid(input)) {
                                errorContainer.textContent = option.errorMessage(input, label);
                                input.classList.add('border-red-700');
                                input.classList.remove('border-green-700');
                                successIcon.classList.add('hidden');
                                errorIcon.classList.remove('hidden');
                                formGroupError = true;
                            }
                        }

                        if (!formGroupError) {
                            errorContainer.textContent = '';
                            input.classList.add('border-green-700');
                            input.classList.remove('border-red-700');
                            successIcon.classList.remove('hidden');
                            errorIcon.classList.add('hidden');
                        }

                        return !formGroupError;
                    };

                    formElement.setAttribute('novalidate', '');

                    Array.from(formElement.elements).forEach(element => {
                        element.addEventListener('blur', event => {
                            validateSingleFormGroup(event.srcElement.parentElement.parentElement);
                        });
                    });

                    const validateAllFormGroups = formToValidate => {
                        const formGroups = Array.from(formToValidate.querySelectorAll('.formGroup'));

                        return formGroups.every(formGroup => validateSingleFormGroup(formGroup));
                    };

                    formElement.addEventListener('register', (event) => {
                        event.preventDefault();
                        const formValid = validateAllFormGroups(formElement);

                        if (!formValid) {
                            event.preventDefault();
                        } else {
                            event.preventDefault();
                            console.log('Registered successfully');
                            callback(formElement);
                        }
                    });
                });
            };

            const sendToAPI = (formElement) => {
                const formObject = Array.from(formElement.elements)
                    .filter(element => element.type !== 'register')
                    .reduce(
                        (accumulator, element) => ({
                            ...accumulator,
                            [element.id]: element.value
                        }), {});

                console.log(formObject);

            }

            validateForm('#registrationForm').then(formElement => {
                console.log('Promise Resolved');
                sendToAPI(formElement);
            });
        </script> --}}
        <script>
            // Remove the alert message after 5 seconds (adjust the timeout value as needed)
            setTimeout(function() {
                document.querySelector('.alert').remove();
            }, 1000);
        </script>
        {{-- <script>
            function clearError(element, isRequired) {
                // Remove error styles and message when the user starts typing
                element.classList.remove('border-red-500');
                const errorSpan = element.nextElementSibling;

                // Check if there is a value, if yes, trim and hide the error message (only if required)
                if (element.value.trim() !== '') {
                    if (isRequired) {
                        element.value = element.value.trim();
                    }
                    errorSpan.innerHTML = '';
                }
            }
        </script> --}}
        <script>
             var storedValues = {}; // Object to store input values

            // Add an input event listener to remove the red border when the user types
            document.getElementById('first_name').addEventListener('input', function () {
                storedValues['last_name'] = this.value;
                this.style.border = '2px solid #ced4da';
            });

            document.getElementById('last_name').addEventListener('input', function () {
                storedValues['last_name'] = this.value;
                this.style.border = '2px solid #ced4da';
            });

            document.getElementById('address').addEventListener('input', function () {
                storedValues['address'] = this.value;
                this.style.border = '2px solid #ced4da';
            });

            document.getElementById('course').addEventListener('select', function () {
                storedValues['course'] = this.value;
                this.style.border = '2px solid #ced4da';
            });

            document.getElementById('sex').addEventListener('select', function () {
                storedValues['sex'] = this.value;
                this.style.border = '2px solid #ced4da';
            });

            document.getElementById('student_id').addEventListener('input', function () {
                storedValues['student_id'] = this.value;
                this.style.border = '2px solid #ced4da';
            });

            document.getElementById('contact_number').addEventListener('input', function () {
                storedValues['contact_number'] = this.value;
                this.style.border = '2px solid #ced4da';
            });

            document.getElementById('email').addEventListener('input', function () {
                storedValues['email'] = this.value;
                this.style.border = '2px solid #ced4da';
            });

            document.getElementById('password').addEventListener('input', function () {
                storedValues['password'] = this.value;
                this.style.border = '2px solid #ced4da';
            });

            // document.getElementById('confirm_password').addEventListener('input', function () {
            //     storedValues['confirm_password'] = this.value;
            //     this.style.border = '2px solid #ced4da';
            // });

            document.getElementById('student_cor').addEventListener('input', function () {
                storedValues['student_cor'] = this.value;
                this.style.border = '2px solid #ced4da';
            });

            function validateForm() {
            // FIRST NAME
                // Reset border colors
                document.getElementById('first_name').style.border = '2px solid #ced4da';

                // Perform your form validation here
                var isValid = true;

                // Example: Check if the first name is not empty
                var first_name = document.getElementById('first_name').value.trim();
                if (first_name === '') {
                    isValid = false;
                    alert('Please enter your first name');
                    document.getElementById('first_name').style.border = '2px solid red';
                }
            // LAST NAME
                // Reset border colors
                document.getElementById('last_name').style.border = '2px solid #ced4da';

                // Perform your form validation here
                var isValid = true;

                // Example: Check if the first name is not empty
                var last_name = document.getElementById('last_name').value.trim();
                if (last_name === '') {
                    isValid = false;
                    alert('Please enter your last name');
                    document.getElementById('last_name').style.border = '2px solid red';
                }
            // ADDRESS
                // Reset border colors
                document.getElementById('address').style.border = '2px solid #ced4da';

                // Perform your form validation here
                var isValid = true;

                // Example: Check if the first name is not empty
                var address = document.getElementById('address').value.trim();
                if (address === '') {
                    isValid = false;
                    alert('Please enter your address');
                    document.getElementById('address').style.border = '2px solid red';
                }
           // COURSE
                 // Reset border colors
                 document.getElementById('course').style.border = '2px solid #ced4da';

                // Perform your form validation here
                var isValid = true;

                // Example: Check if the first name is not empty
                var course = document.getElementById('course').value.trim();
                if (course === '') {
                    isValid = false;
                    alert('Please select your course');
                    document.getElementById('course').style.border = '2px solid red';
                }
            // SEX
                // Reset border colors
                document.getElementById('sex').style.border = '2px solid #ced4da';

                // Perform your form validation here
                var isValid = true;

                // Example: Check if the first name is not empty
                var sex = document.getElementById('sex').value.trim();
                if (sex === '') {
                    isValid = false;
                    alert('Please select your sex');
                    document.getElementById('sex').style.border = '2px solid red';
                }
            // STUDENT ID
                // Reset border colors
                document.getElementById('student_id').style.border = '2px solid #ced4da';

                // Perform your form validation here
                var isValid = true;

                // Example: Check if the first name is not empty
                var student_id = document.getElementById('student_id').value.trim();
                if (student_id === '') {
                    isValid = false;
                    alert('Please enter your student id');
                    document.getElementById('student_id').style.border = '2px solid red';
                }
            // CONTACT NUMBER
                // Reset border colors
                document.getElementById('contact_number').style.border = '2px solid #ced4da';

                // Perform your form validation here
                var isValid = true;

                // Example: Check if the first name is not empty
                var contact_number = document.getElementById('contact_number').value.trim();
                if (contact_number === '') {
                    isValid = false;
                    alert('Please enter your contact number');
                    document.getElementById('contact_number').style.border = '2px solid red';
                }
            // STUDENT COR
                // Reset border colors
                document.getElementById('email').style.border = '2px solid #ced4da';

                // Perform your form validation here
                var isValid = true;

                // Example: Check if the first name is not empty
                var email = document.getElementById('email').value.trim();
                if (email === '') {
                    isValid = false;
                    error('Please enter your email');
                    document.getElementById('email').style.border = '2px solid red';
                }
            // // PASSWORD
            //     // Reset border colors
            //     document.getElementById('password').style.border = '2px solid #ced4da';

            //     // Perform your form validation here
            //     var isValid = true;

            //     // Example: Check if the first name is not empty
            //     var password = document.getElementById('password').value.trim();
            //     if (password === '') {
            //         isValid = false;
            //         alert('Please enter your password');
            //         document.getElementById('password').style.border = '2px solid red';
            //     }
            // // CONFIRM PASSWORD
            //     // Reset border colors
            //     document.getElementById('confirm_password').style.border = '2px solid #ced4da';

            //     // Perform your form validation here
            //     var isValid = true;

            //     // Example: Check if the first name is not empty
            //     var confirm_password = document.getElementById('confirm_password').value.trim();
            //     if (confirm_password === '') {
            //         isValid = false;
            //         alert('Confirmation passsword not matched');
            //         document.getElementById('confirm_password').style.border = '2px solid red';
            //     }
            // STUDENT COR
                // Reset border colors
                document.getElementById('student_cor').style.border = '2px solid #ced4da';

                // Perform your form validation here
                var isValid = true;

                // Example: Check if the first name is not empty
                var student_cor = document.getElementById('student_cor').value.trim();
                if (student_cor === '') {
                    isValid = false;
                    alert('Please upload a photo');
                    document.getElementById('student_cor').style.border = '2px solid red';
                }

                // Add more validation checks for other fields...

                // If isValid is still true, submit the form
                return isValid;
            }
        </script>

        <script>
            // Function to clear red border and hide overall alert
            function clearErrors() {
                // Reset the border colors for all fields
                var elements = document.querySelectorAll('.form-control');
                elements.forEach(function (element) {
                    element.style.border = '2px solid #ced4da';
                });

                // Hide overall alert if it's visible
                document.getElementById('overall-alert').style.display = 'none';
            }

            // Function to show overall alert
            function showOverallAlert(message) {
                // Show overall alert with the specified message
                var alertElement = document.getElementById('overall-alert');
                alertElement.innerText = message;
                alertElement.style.display = 'block';
            }

            // Function to validate the entire form
            function validateForm() {
                // Clear previous errors
                clearErrors();

                // Assume the form is valid initially
                var isValid = true;

                // Check each field for empty values
                var fields = ['first_name', 'last_name', 'address', 'course', 'sex', 'student_id', 'contact_number', 'email', 'password', 'student_cor'];

                fields.forEach(function (fieldName) {
                    var element = document.getElementById(fieldName);
                    var value = element.value.trim();

                    if (value === '') {
                        // If any field is empty, mark the form as invalid and highlight the field
                        isValid = false;
                        element.style.border = '2px solid red';
                    }
                });

                // Add more validation checks for other fields...

                // If isValid is still true, submit the form
                if (isValid) {
                    return true;
                } else {
                    // If any field is empty, show an overall alert
                    showOverallAlert('Please fill up all the blank fields.');
                    return false;
                }
            }
        </script>


    </section>
    <x-footer />
</x-guest-layout>
