<x-guest-layout>
    <section class="full-screen bg-gradient-to-b from-green-200 to-emerald-400 body-font bg-bottom bg-no-repeat bg-white" style="background-image: url('../img/wave.svg');">
        <div class="flex items-center justify-center py-28">
            <div class="text-gray-800 rounded-3xl shadow-xl w-full overflow-hidden border-green-800 bg-no-repeat" style="background-image: url('../img/blob-scene-haikei.svg'); max-width:1000px">
                <div class="md:flex w-full">
                                      
                    <div class="w-full md:w-1/3.5 py-10 px-5 md:px-10" x-data="storeAccount">
                        <div class="text-center mb-10">
                            <h1 class="font-bold text-3xl text-gray-900">REGISTER</h1>
                            <p>Enter your information to register</p>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="flex -mx-2">
                                <div class="w-1/2 px-3 mb-5 mt-2">
                                    <div class="flex space-x-2">
                                        <label for="" class="text-xs font-semibold px-1">First name</label>
                                    </div>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="firstName" required autofocus
                                            autocomplete="firstName"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="First Name">
                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Middle name(Opt)</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="middle_name"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Middle Name">
                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Last name</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="lastName" required autofocus
                                            autocomplete="lastName"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Last name">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-2">
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Block and Lot</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-home-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="block" required autofocus autocomplete="block"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Block and Lot">
                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Subdivision</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-home-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="subdivision" required autofocus
                                            autocomplete="subdivision"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Subdivision">
                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Barangay</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-home-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="barangay" required autofocus
                                            autocomplete="barangay"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Barangay">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-2">
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Municipality</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-home-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="municipality" required autofocus
                                            autocomplete="municipality"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Municipality">
                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Province</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-home-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="province" required autofocus
                                            autocomplete="province"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Province">
                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Zip Code</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-home-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="zip_code" required autofocus
                                            autocomplete="zip_code"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Zip Code">
                                    </div>
                                </div>
                            </div>
                            <div class=" px-2 mb-5 flex space-x-10">
                                <div>
                                    <label for="sex" class="text-xs font-semibold px-1">Sex</label>
                                    <select name="sex"
                                        id="dropdown"class="w-full py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3">
                                        <option selected>Select Sex</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="NA">Prefer not to say</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="" class="text-xs font-semibold px-1">Student ID</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="text" name="studentId"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="Student ID" pattern="[0-9]+" title="Please enter numbers only" required>
                                    </div>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Email</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-between">
                                            <i class="mdi mdi-email-outline text-gray-500 text-lg"></i>
                                        </div>
                                        <input type="email" name="email"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="cvsubacoor@gmail.com">
                                    </div>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Password</label>
                                    <div class="relative">
                                        <input type="password" id="password" name="password"
                                            class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="************">
                                        <i onclick="togglePasswordVisibility('password')"
                                            class="absolute top-1/2 right-3 transform -translate-y-1/2 cursor-pointer">
                                            <i id="toggle_icon"
                                                class="mdi mdi-eye-off-outline text-gray-400 text-lg"></i>
                                        </i>
                                        <div class="absolute top-1/2 left-3 transform -translate-y-1/2">
                                            <i class="mdi mdi-lock-outline text-gray-500 text-lg"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="w-full px-3 mb-10">
                                    <label for="" class="text-xs font-semibold px-1">Confirm Password</label>
                                    <div class="relative">
                                        <input type="password" id="confirm_password" name="confirm_password"
                                            class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                                            placeholder="************">
                                        <i onclick="togglePasswordVisibility('confirm_password')"
                                            class="absolute top-1/2 right-3 transform -translate-y-1/2 cursor-pointer">
                                            <i id="toggle_icon_confirm"
                                                class="mdi mdi-eye-off-outline text-gray-400 text-lg"></i>
                                        </i>
                                        <div class="absolute top-1/2 left-3 transform -translate-y-1/2">
                                            <i class="mdi mdi-lock-outline text-gray-500 text-lg"></i>
                                        </div>
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
                                        @click="sendData()">REGISTER NOW</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- OFFICIAL WEBSITE OF CAVITE STATE UNIVERSITY - BACOOR CAMPUS -->
        <div class="flex items-end justify-end fixed bottom-0 right-0 mb-4 mr-4 z-10">
            <div>
                <a title="Facebook of CVSU-BACOOR" href="https://cvsu.edu.ph/bacoor/" target="_blank"
                    class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12">
                    <img class="object-cover object-center w-full h-full rounded-full"
                        src="{{ asset('img/logo.png') }}" />
                </a>
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

    </section>
    <x-footer />
</x-guest-layout>
