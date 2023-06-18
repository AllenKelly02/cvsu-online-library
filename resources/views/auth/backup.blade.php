<div class="flex -mx-2">
    <div class="formGroup w-1/2 px-3 mb-5">
        <label for="email" class="text-xs font-semibold px-1">Email Address</label>
        <span class="error  text-red-700 text-xs"></span>
        <div class="flex">
            <div
                class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                <i class="mdi mdi-home-outline text-gray-500 text-lg"></i>
            </div>
            <input type="text" name="email" required maxlength="20" minlength="1"
                class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                placeholder="">
            <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                <i class="ri-error-warning-fill"></i>
            </span>
            <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                <i class="ri-checkbox-fill"></i>
            </span>
        </div>
    </div>
    <div class="formGroup w-1/2 px-3 mb-5">
        <label for="password" class="text-xs font-semibold px-1">Password</label>
        <span class="error  text-red-700 text-xs"></span>
        <div class="flex">
            <div
                class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                <i class="mdi mdi-home-outline text-gray-500 text-lg"></i>
            </div>
            <input type="text" name="studentId" required maxlength="20" minlength="5"
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
        <label for="confirm_password" class="text-xs font-semibold px-1">Confirm Password</label>
        <span class="error  text-red-700 text-xs"></span>
        <div class="flex">
            <div
                class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                <i class="mdi mdi-home-outline text-gray-500 text-lg"></i>
            </div>
            <input type="text" name="barangay" required maxlength="20" minlength="2"
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
    <div class=" px-2 mb-2 flex space-x-6">
    <div class="formGroup w-1/2 px-3 mb-5">
        <label for="sex" class="text-xs font-semibold px-1">Sex</label>
        <span class="error  text-red-700 text-xs"></span>
        <select name="sex"
            id="dropdown"class="w-full py-2 px-5 rounded-lg border-2 border-gray-200 outline-none focus:border-green3" required>
            <option selected>Select Sex</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="NA">Prefer not to say</option>
        </select>
    </div>

    <div class="formGroup w-1/2 px-3 mb-5">
        <label for="studentId" class="text-xs font-semibold px-1">Student ID</label>
        <span class="error  text-red-700 text-xs"></span>
        <div class="flex">
            <div
                class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                <i class="mdi mdi-account-outline text-gray-500 text-lg"></i>
            </div>
            <input type="text" name="studentId" maxlength="20" minlength="5"
                class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                placeholder="Student ID" pattern="[0-9]+" title="Please enter numbers only" required>
            <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                <i class="ri-error-warning-fill"></i>
            </span>
            <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                <i class="ri-checkbox-fill"></i>
            </span>
        </div>
    </div>

    <div class="formGroup w-1/2 px-3 mb-5">
        <label for="contact_number" class="text-xs font-semibold px-1">Contact Number</label>
        <span class="error  text-red-700 text-xs"></span>
        <div class="flex">
            <div
                class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                <i class="mdi mdi-account-outline text-gray-500 text-lg"></i>
            </div>
            <input type="text" name="contact_number"
                class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                placeholder="09xxxxxxxxx" pattern="[0-9]+" title="Please enter numbers only" minlength="11" maxlength="11" required>
                <span class="error-icon hidden mt-2 -ml-6 text-red-700">
                    <i class="ri-error-warning-fill"></i>
                </span>
                <span class="success-icon hidden mt-2 -ml-6 text-green-700">
                    <i class="ri-checkbox-fill"></i>
                </span>
        </div>
        </div>
    </div>
</div>


<div class="flex">
    <div class="formGroup w-1/2 px-3 mb-5">
        <label for="email" class="text-xs font-semibold px-1">Email</label>
        <span class="error  text-red-700 text-xs"></span>
        <div class="flex">
            <div
                class="w-10 z-10 px-3 text-center pointer-events-none flex items-center justify-between">
                <i class="mdi mdi-email-outline text-gray-500 text-lg"></i>
            </div>
            <input type="email" name="email" maxlength="50" minlength="5"
                class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                placeholder="cvsubacoor@gmail.com" required>
            <span class="error-icon hidden -ml-6 text-red-700">
                <i class="ri-error-warning-fill"></i>
            </span>
            <span class="success-icon hidden -ml-6 text-green-700">
                <i class="ri-checkbox-fill"></i>
            </span>
        </div>
    </div>

@if ($errors->any())
    <div class="alert alert-error w-full animation">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="formGroup w-1/2 px-3 mb-5">
        <label for="password" class="text-xs font-semibold px-1">Password</label>
        <span class="error  text-red-700 text-xs"></span>
        <div class="relative">
            <input type="password" id="password" name="password"
                class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
                placeholder="************" minlength="8" maxlength="20" required>
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
    <div class="formGroup w-1/2 px-3 mb-5">
        <label for="confirm-password" class="text-xs font-semibold px-1">Confirm
            Password</label>
        <span class="error  text-red-700 text-xs"></span>
        <div class="relative">
            <input type="password" id="confirm-password" name="password_confirmation"
                class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-green3"
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
    </div>
