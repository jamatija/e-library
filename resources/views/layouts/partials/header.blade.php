<header
    class="z-20 small:hidden  flex items-center text-white justify-between w-full h-[71px] pr-[30px] mx-auto bg-[#4558BE]">
    <!-- Logo and Title -->
    <div class="logo-font inline-flex py-[18px]">
        <div class="block">
            <a href="{{ route('dashboard') }}" class="text-[20px] font-medium">
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-[83px] h-[71px] mx-auto bg-[#4558BE]">
                        <img src="{{ asset('favicon.ico') }}" class="spin" alt="Icon" width="45px" height="45px">
                    </div>
                    <h2 class="ml-[10px] text-[25px]">{{ config('app.name') }}</h2>
                </div>
            </a>
        </div>
    </div>

    <div class="flex-initial">
        <div class="relative flex items-center justify-end">
            <div class="flex items-center">

                <!-- Notifications Icon -->
                <div class="relative block" title="Activities">
                    <a href="#" class="relative inline-block px-3 py-2 outline-none focus:outline-none "
                        aria-label="Notification">
                        <div class="flex items-center h-5">
                            <div class="">
                                <span
                                    class="transition duration-300 ease-in bg-[#606FC7] text-[25px] rounded-full px-[11px] py-[7px] ">
                                    <i class="far fa-bell"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Add Icon -->
                <a class="inline-block border-l-[1px] border-gray-300 px-3" href="#" aria-label="Add something"
                    id="dropdownCreate">
                    <span
                        class="transition duration-300 ease-in bg-[#606FC7] text-[25px] rounded-full px-[11px] py-[7px]  ">
                        <i class="fas fa-plus"></i>
                    </span>
                </a>

                {{-- Add Icon Dropdown --}}
                <div
                    class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-create">
                    <div
                        class="absolute right-[12px] w-56 mt-[35px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none">
                        <div class="py-1">
                            <a href="#" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                <i class="fa-solid fa-user-graduate mr-[3px] ml-[4px] py-1"></i>
                                <span class="px-4 py-0 ml-[3px]">Student</span>
                            </a>
                            <a href="#" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                <i class="fas fa-book mr-[3px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0 ml-[5px]">Book</span>
                            </a>
                            <a href="{{ route('authors.create') }}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                <i class="fas fa-user-pen mr-[3px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Author</span>
                            </a>
                            <a href="#" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                <i class="fas fa-user-tie mr-[5px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0 ml-[3px]">Librarian</span>
                            </a>
                            <a href="#" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                <i class="fas fa-user-shield  ml-[5px] py-1"></i>
                                <span class="px-4 py-0 ml-[3px]">Admin</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- User Profile Icon -->
                <div class="mr-[10px] relative block">
                    <a href="#" class="relative inline-block px-3 py-2 focus:outline-none " id="dropdownProfile"
                        aria-label="User profile">
                        <div class="flex items-center h-5 my-2">
                            <img class="h-[50px] rounded-full" src="{{ asset('/storage/'.Auth::user()->picture) }}" width="50" alt="User image">
                        </div>
                    </a>
                </div>

                <!-- User Profile Icon Dropdown -->
                <div
                    class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-profile">
                    <div class="absolute right-[12px] w-56 mt-[35px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                        aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                        <div class="py-1">
                            <a href="{{ route('profile.edit') }}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="fas fa-file mr-[8px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Profile</span>
                            </a>
                            <a href="#" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600 ">
                                <i class="fas fa-sign-out-alt mr-[5px] ml-[5px] py-1"></i>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    @method('post')
                                    <button class="inline-block px-4 py-0">Log out</button>
                                </form>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
