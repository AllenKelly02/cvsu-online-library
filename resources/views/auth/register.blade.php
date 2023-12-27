<x-guest-layout>
    <section class="full-screen body-font bg-bottom bg-no-repeat bg-bgmain"
        style="background-image: url('../img/wave (7).svg');">
        <div class="flex items-center justify-center py-20 pt-36">
            <div class="text-gray-800 rounded-3xl shadow-xl w-full overflow-hidden bg-no-repeat"
                style="background-image: url('../img/blob-scene-haikei (6).svg'); max-width:1000px">
                <div class="md:flex w-full h-full">

                    <div class="w-full md:w-1/3.5 py-10 px-5 md:px-10" x-data="storeAccount">
                        <div class="text-center mb-10">
                            <h1 class="font-bold text-3xl text-gray-900">REGISTER</h1>
                            <p>Enter your information to register</p>
                        </div>
                        <form method="POST" action="{{ route('register') }}" name="registrationForm"
                            id="registrationForm">
                            @csrf
                            <h1 class=" text-xl pl-2">Personal Information:</h1>
                            <div class="flex -mx-2">

                                <div class="formGroup w-1/2 px-3 mb-5 mt-2">
                                    <div class="flex space-x-2">
                                        <label for="firstName" class="text-xs font-semibold px-1">First name</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="firstName" required custommaxlength="20"
                                            minlength="2"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="First Name" />
                                        <span class="error-icon hidden -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="formGroup w-1/2 px-3 mb-5 mt-2">
                                    <div class="flex space-x-2">
                                        <label for="middle_name" class="text-xs font-semibold px-1">Middle Name</label>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="middle_name" custommaxlength="20" minlength="2"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Middle Name" />
                                        <span class="error-icon hidden -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="formGroup w-1/2 px-3 mb-5 mt-2">
                                    <div class="flex space-x-2">
                                        <label for="lastName" class="text-xs font-semibold px-1">Last Name</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="lastName" required custommaxlength="20"
                                            minlength="2"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Last Name" />
                                        <span class="error-icon hidden -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex -mx-2">
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <div class="flex space-x-2">
                                        <label for="address" class="text-xs font-semibold px-1">Address</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-home-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="address" required custommaxlength="20"
                                            minlength="2"
                                            class="w-full -ml-10 pl-10 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Address....">
                                        <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <div class="flex space-x-2">
                                        <label for="course" class="text-xs font-semibold px-1">Course</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex relative">
                                        <select
                                            class="w-full py-2 pl-4 rounded-lg border-2 border-gray-200 outline-none focus:border-green3 capitalize"
                                            id="course" name="course" required>
                                            <option selected value="">Select Course</option>
                                            <option class="bg-white" value="BSE">📚 Bachelor of Secondary Education</option>
                                            <option class="bg-white" value="BSBM">📚 BS Business Management</option>
                                            <option class="bg-white" value="BSCS">📚 BS Computer Science</option>
                                            <option class="bg-white" value="BSC">📚 BS Criminology</option>
                                            <option class="bg-white" value="BSHM">📚 BS Hospitality Management</option>
                                            <option class="bg-white" value="BSIT">📚 BS Information Technology</option>
                                            <option class="bg-white" value="BSP">📚 BS Psychology</option>
                                        </select>

                                        <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-2">
                                <div class="formGroup w-1/2 px-3 mb-16">
                                    <div class="flex space-x-2">
                                        <label for="course" class="text-xs font-semibold px-1">Sex</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex relative">
                                        <select
                                            class="w-full py-2 pl-4  rounded-lg border-2 border-gray-200 outline-none focus:border-green3 capitalize"
                                            id="sex" name="sex" required>
                                            <option selected value="" class="bg-white">Select Sex</option>
                                            <option class="bg-white" value="Male"><span class="text-blue-500">♂</span> Male</option>
                                            <option class="bg-white" value="Female"><span class="text-pink-500">♀</span> Female</option>
                                            <option class="bg-white" value="Prefer not to say">Prefer not to say</option>
                                        </select>
                                        <span class="absolute top-1/2 left-3 transform -translate-y-1/2">
                                            <!-- Male Symbol in Blue -->

                                            <!-- Female Symbol in Pink -->

                                        </span>
                                        <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <div class="flex space-x-2">
                                        <label for="student_id" class="text-xs font-semibold px-1">Student ID</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="studentId" custommaxlength="15" minlength="5"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Student ID" pattern="[0-9]+"
                                            title="Please enter numbers only" required>
                                        <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <div class="flex space-x-2">
                                        <label for="contact_number" class="text-xs font-semibold px-1">Contact
                                            Number</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="contact_number"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="09xxxxxxxxx" pattern="[0-9]+"
                                            title="Please enter numbers only" minlength="11" custommaxlength="11"
                                            required>
                                        <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex -mx-2 mb-16">
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <div class="flex space-x-2">
                                        <label for="email" class="text-xs font-semibold px-1">Email Address</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-email-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="email" name="email" custommaxlength="50" minlength="5"
                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="cvsubacoor@gmail.com" required>
                                        <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <div class="flex space-x-2">
                                        <label for="password" class="text-xs font-semibold px-1">Password</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex">
                                        <div class="relative">
                                            <input type="password" id="password" name="password"
                                                class="w-72 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                                placeholder="************" minlength="8" custommaxlength="20"
                                                required>
                                            <i onclick="togglePasswordVisibility('password')"
                                                class="absolute top-1/2 right-3 transform -translate-y-1/2 cursor-pointer">
                                                <i id="toggle_icon"
                                                    class="mdi mdi-eye-off-outline text-gray-400 text-lg"></i>
                                            </i>
                                            <div class="absolute top-1/2 left-3 transform -translate-y-1/2">
                                                <i class="mdi mdi-lock-outline text-gray-500 text-lg"></i>
                                            </div>
                                        </div>
                                        <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <div class="flex space-x-2">
                                        <label for="confirm_password" class="text-xs font-semibold px-1">Confirm
                                            Password</label>
                                        <p class="text-red-500 text-center text-xs">*</p>
                                        <span class="error  text-red-700 text-xs"></span>
                                    </div>
                                    <div class="flex">
                                        <div class="relative">
                                            <input type="password" id="confirm-password" name="password_confirmation"
                                                match="password"
                                                class="w-72 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                                placeholder="************" required>
                                            <i onclick="togglePasswordVisibility('confirm-password')"
                                                class="absolute top-1/2 right-3 transform -translate-y-1/2 cursor-pointer">
                                                <i id="toggle_icon_confirm"
                                                    class="mdi mdi-eye-off-outline text-gray-400 text-lg"></i>
                                            </i>
                                            <div class="absolute top-1/2 left-3 transform -translate-y-1/2">
                                                <i class="mdi mdi-lock-outline text-gray-500 text-lg"></i>
                                            </div>
                                        </div>
                                        <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row items-center justify-center">
                                <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                                    <a href="{{ route('login') }}"
                                        class="buttonh block w-full max-w-xs mx-auto font-semibold bg-yellowmain hover:bg-yellow-500 text-center rounded-lg px-3 py-3 md:mx-0">Back
                                        to login</a>
                                </div>
                                <div class="w-full md:w-1/2 px-3 mb-1 md:ml-4">
                                    <button class="buttonh block w-full max-w-xs mx-auto font-semibold bg-yellowmain hover:bg-yellow-500 text-center rounded-lg px-3 py-3 md:mx-0">Register Now
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
                const icon = document.getElementById(inputId === 'password' ? 'toggle_icon' : 'toggle_icon_confirm');

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
        <script>
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
        </script>

    </section>
    <x-footer />
</x-guest-layout>
