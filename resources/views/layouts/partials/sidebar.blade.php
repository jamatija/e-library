<nav id="sidebar"
    class="fixed z-10 flex flex-col justify-between overflow-x-hidden overflow-y-auto bg-[#EFF3F6] sidebar nav-height">
    <div class="">

        <!-- Hamburger Icon -->
        <div
            class="cursor-pointer text-[#707070] pl-[30px] pt-[28px] pb-[27px] text-[25px] border-b-[1px] border-[#e4dfdf] ">
            <i id="hamburger" class="hamburger-btn fas fa-bars"></i>
        </div>

        <div class="">
            <ul class="text-[#2D3B48] sidebar-nav">

                <!-- Dashboard Icon -->
                <li class="pt-[18px] pb-[14px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full fill-current whitespace-nowrap">
                            <div class="transition duration-300 ease-in group-hover:text-blue-600" title="Dashboard">
                                <a href="{{ route('dashboard') }}" aria-label="Dashboard">
                                    <i
                                        class="text-[22px] pt-[4px] pr-1 pb-[5px] fa-solid fa-chart-line rounded-[3px] text-[#707070]
                                        transition duration-300 ease-in group-hover:text-blue-600"></i>
                                    <div class="hidden sidebar-item">
                                        <p
                                            class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[20px]">
                                            Dashboard</p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>

                <!-- Students Icon -->
                <li class="pt-[18px] pb-[14px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap" title="Students">
                            <a href="{{ route('students.index') }}" aria-label="Students">
                                <i
                                    class="text-[22px] pt-[4px] pb-[5px] mr-1 transition duration-300 ease-in group-hover:text-blue-600 text-[#707070] fa-solid fa-user-graduate"></i>
                                <div class="hidden sidebar-item">
                                    <p
                                        class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[20px]">
                                        Students</p>
                                </div>
                            </a>
                        </span>
                    </div>
                </li>

                <!-- Authors Icon -->
                <li class="pt-[18px] pb-[14px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap" title="Authors">
                            <a href=" {{ route('authors.index') }}" aria-label="Authors">
                                <i
                                    class="text-[22px] pt-[4px] pb-[5px] transition duration-300 ease-in group-hover:text-blue-600 text-[#707070] fas fa-user-pen"></i>
                                <div class="hidden sidebar-item">
                                    <p
                                        class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[19px]">
                                        Authors</p>
                                </div>
                            </a>
                        </span>
                    </div>
                </li>

                <!-- Books Icon -->
                <li class="pt-[18px] pb-[14px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap" title="Books">
                            <a href="{{ route('books.index') }}" aria-label="Books">
                                <i
                                    class="text-[22px] pt-[4px] pb-[5px] pr-2 transition duration-300 ease-in group-hover:text-blue-600 text-[#707070] fas fa-book"></i>
                                <div class="hidden sidebar-item">
                                    <p
                                        class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[19px]">
                                        Books</p>
                                </div>
                            </a>
                        </span>
                    </div>
                </li>

                <!-- Transactions Icon -->
                <li class="pt-[18px] pb-[14px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap" title="Transactions">
                            <a href="#" aria-label="Transactions">
                                <i
                                    class="text-[22px] pt-[4px] pb-[5px] pr-1 text-[#707070] fa-solid fa-repeat transition duration-300 ease-in group-hover:text-blue-600"></i>
                                <div class="hidden sidebar-item">
                                    <p
                                        class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[20px]">
                                        Transactions</p>
                                </div>
                            </a>
                        </span>

                    </div>
                </li>

                <!-- Librarian Icon -->
                <li class="pt-[18px] pb-[14px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap" title="Librarians">
                            <a href="{{ route('librarians.index') }}" aria-label="Librarians">
                                <i
                                    class="text-[22px] pt-[4px] pb-[5px] pr-2 text-[#707070] fa-solid fa-user-tie transition duration-300 ease-in group-hover:text-blue-600"></i>
                                <div class="hidden sidebar-item">
                                    <p
                                        class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[19px]">
                                        Librarians</p>
                                </div>
                            </a>
                        </span>
                    </div>
                </li>

                <!-- Admin Icon -->
                <li class="pt-[18px] pb-[14px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap" title="Admins">
                            <a href="#" aria-label="Admins">
                                <i
                                    class="text-[22px] pt-[4px] pb-[5px] transition duration-300 ease-in group-hover:text-blue-600 text-[#707070] fa-solid fa-user-shield"></i>
                                <div class="hidden sidebar-item">
                                    <p
                                        class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[19px]">
                                        Admins</p>
                                </div>
                            </a>
                        </span>
                    </div>
                </li>

            </ul>
        </div>
    </div>

    <!-- Settings Icon -->
    <div class="sidebar-nav py-[10px] border-t-[1px] border-[#e4dfdf] pt-[23px] pb-[29px] hover:bg-[#EAEAEA]">
        <ul>
            <li class="h-[60px] pt-[18px] pb-[14px]">
                <a href="{{  route('settings.index') }}" aria-label="Settngs" class="ml-[30px]">
                    <span class="whitespace-nowrap" title="Settings">
                        <i
                            class="transition duration-300 ease-in group-hover:text-[#576cdf] text-[22px] pr-1 text-[#707070] fas fa-cog"></i>
                        <div class="hidden sidebar-item">
                            <p
                                class="transition duration-300 ease-in group-hover:text-blue-600  inline text-[15px] ml-[20px]">
                                Settings</p>
                        </div>
                    </span>
                </a>
            </li>
        </ul>
    </div>

</nav>
