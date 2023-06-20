<x-guest-layout>
    <section class="full-screen bg-gradient-to-b from-green-200 to-emerald-400 body-font bg-bottom bg-no-repeat bg-white"
        style="background-image: url('../img/wave.svg');">
        <div class="flex items-center justify-center py-28">
            <div class="text-gray-800 rounded-3xl shadow-xl w-full overflow-hidden border-green-800 bg-no-repeat"
                style="background-image: url('../img/blob-scene-haikei.svg'); max-width:1000px">
                <div class="md:flex w-full">

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
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="middle_name" class="text-xs font-semibold px-1">M. Name(Opt)</label>
                                    <span class="error  text-red-700 text-xs"></span>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="middle_name" custommaxlength="20" minlength="2"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Middle Name">
                                        <span class="error-icon hidden -ml-6 mt-2 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden -ml-6 mt-2 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <label for="lastName" class="text-xs font-semibold px-1">Last name</label>
                                    <span class="error  text-red-700 text-xs"></span>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="lastName" required custommaxlength="20"
                                            minlength="2"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Last name">
                                        <span class="error-icon hidden -ml-6 mt-2 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden -ml-6 mt-2 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-2">
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <label for="block" class="text-xs font-semibold px-1">Block & Lot</label>
                                    <span class="error  text-red-700 text-xs"></span>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-home-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="block" required custommaxlength="20"
                                            minlength="2"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Block and Lot">
                                        <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <label for="subdivision" class="text-xs font-semibold px-1">Subdivision</label>
                                    <span class="error  text-red-700 text-xs"></span>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-home-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="subdivision" required custommaxlength="20"
                                            minlength="2"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Subdivision">
                                        <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <label for="barangay" class="text-xs font-semibold px-1">Barangay</label>
                                    <span class="error  text-red-700 text-xs"></span>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-home-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="barangay" required custommaxlength="20"
                                            minlength="2"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Barangay">
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
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <label for="municipality" class="text-xs font-semibold px-1">Municipality</label>
                                    <span class="error  text-red-700 text-xs"></span>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-home-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="municipality" required custommaxlength="20"
                                            minlength="2"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Municipality">
                                        <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <label for="province" class="text-xs font-semibold px-1">Province</label>
                                    <span class="error  text-red-700 text-xs"></span>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-home-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="province" required custommaxlength="20"
                                            minlength="2"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Province">
                                        <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <label for="zip_code" class="text-xs font-semibold px-1">Zip Code</label>
                                    <span class="error  text-red-700 text-xs"></span>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-home-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="zip_code" required custommaxlength="4"
                                            minlength="4" pattern="[0-9]+"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Zip Code">
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
                                <div class="formGroup w-1/2 px-3 mb-16  ">
                                    <label for="sex" class="text-xs font-semibold px-1">Sex</label>
                                    <span class="error  text-red-700 text-xs"></span>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="sex" required custommaxlength="20"
                                            minlength="1"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Type here...">
                                        <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                                            <i class="ri-error-warning-fill"></i>
                                        </span>
                                        <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                                            <i class="ri-checkbox-fill"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <label for="studentId" class="text-xs font-semibold px-1">Student ID</label>
                                    <span class="error  text-red-700 text-xs"></span>
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
                                    <label for="contact_number" class="text-xs font-semibold px-1">Contact
                                        Number</label>
                                    <span class="error  text-red-700 text-xs"></span>
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
                            <h1 class=" text-xl pl-2">Email Address & Password:</h1>
                            <div class="flex -mx-2 mb-16">
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <label for="email" class="text-xs font-semibold px-1">Email Address</label>
                                    <span class="error  text-red-700 text-xs"></span>
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
                                {{-- @if ($errors->any())
                                    <div class="alert alert-error w-full animation">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}
                                <div class="formGroup w-1/2 px-3 mb-5">
                                    <label for="password" class="text-xs font-semibold px-1">Password</label>
                                    <span class="error  text-red-700 text-xs"></span>
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
                                    <label for="confirm-password" class="text-xs font-semibold px-1">Confirm
                                        Password</label>
                                    <span class="error  text-red-700 text-xs"></span>
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

                            <div class="flex">
                                <div class="w-full px-3 mb-1">

                                    <a href="{{ route('login') }}"
                                        class="block w-full max-w-xs mx-auto bg-green-600 hover:bg-green3 text-center text-white rounded-lg px-3 py-3 font-semibold">Back
                                        to login</a>
                                </div>
                                <div class="w-full px-3 mb-1">
                                    <button
                                        class="block w-full max-w-xs mx-auto bg-green-600 hover:bg-green3 text-white rounded-lg px-3 py-3 font-semibold"
                                        @click="sendData()" type="register">REGISTER NOW</button>
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
            const validateForm = (formSelector, callback) => {
                return new Promise((resolve, reject) => {
                    const formElement = document.querySelector(formSelector);

                    const validateOptions = [
                        {
                            attribute: 'minlength',
                            isValid: input => input.value && input.value.length >= parseInt(input.getAttribute('minlength'), 10),
                            errorMessage: (input, label) => `needs at least ${input.getAttribute('minlength')} characters`
                        },
                        {
                            attribute: 'custommaxlength',
                            isValid: input => input.value && input.value.length <= parseInt(input.getAttribute('custommaxlength'), 10),
                            errorMessage: (input, label) => `needs to be less than ${input.getAttribute('custommaxlength')} characters`
                        },
                        {
                            attribute: 'match',
                            isValid: input => {
                                const matchSelector = input.getAttribute('match');
                                const matchedElement = formElement.querySelector(`#${matchSelector}`);
                                return matchedElement && matchedElement.value.trim() === input.value.trim();
                            },
                            errorMessage: (input, label) => {
                                const matchSelector = input.getAttribute('match');
                                const matchedElement = formElement.querySelector(`#${matchSelector}`);
                                const matchedLabel = matchedElement.parentElement.parentElement.parentElement.querySelector('label');
                                return `should match ${matchedLabel.textContent}`;
                            },
                        },
                        {
                            attribute: 'pattern',
                            isValid: input => {
                                const patternRegex = new RegExp(input.getAttribute('pattern'));
                                return patternRegex.test(input.value);
                            },
                            errorMessage: (input, label) => `is not valid!`,
                        },
                        {
                            attribute: 'required',
                            isValid: input => input.value.trim() !== '',
                            errorMessage: (input, label) => `${label.textContent} is required!`,
                        },
                    ];

                    const validateSingleFormGroup = formGroup => {
                        const label = formGroup.querySelector('label');
                        const input = formGroup.querySelector('input, textarea');
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
                                break; // Stop checking other options if there is an error
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
                            validateSingleFormGroup(event.target.closest('.formGroup'));
                        });
                    });

                    const validateAllFormGroups = formToValidate => {
                        const formGroups = Array.from(formToValidate.querySelectorAll('.formGroup'));
                        return formGroups.every(formGroup => validateSingleFormGroup(formGroup));
                    };

                    formElement.addEventListener('submit', event => {
                        event.preventDefault();
                        const formValid = validateAllFormGroups(formElement);

                        if (!formValid) {
                            console.log('Form has errors. Please fix them before submitting.');
                        } else {
                            console.log('Form submitted successfully');
                            sendToAPI(formElement);
                        }
                    });

                    resolve(formElement); // Resolve the promise with the form element
                });
            };

            const sendToAPI = (formElement) => {
                const formObject = Array.from(formElement.elements)
                    .filter(element => element.type !== 'submit')
                    .reduce((accumulator, element) => {
                        return { ...accumulator, [element.id]: element.value };
                    }, {});

                console.log(formObject);
            };

            validateForm('#registrationForm').then(formElement => {
                console.log('Promise Resolved');
                // You can perform any additional actions after the form is validated here
            });
        </script>

    </section>
    <x-footer />
</x-guest-layout>
