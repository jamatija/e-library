@extends('layouts.app')

@section('title', $authorName)

@section('content')

<div>
    <nav class="w-full rounded">
        <ol class="flex list-reset">
            <li>
                <a href="autori.php" class="text-[#2196f3] hover:text-blue-600">
                    Evidencija autora
                </a>
            </li>
            <li>
                <span class="mx-2">/</span>
            </li>
            <li>
                <a href="autorProfile.php" class="text-gray-400 hover:text-blue-600">
                    AUTOR-124
                </a>
            </li>
        </ol>
    </nav>
</div>
                    
<div class="pt-[24px] pr-[30px]">
    <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-gray-300 dotsAutor hover:text-[#606FC7]">
        <i
            class="fas fa-ellipsis-v"></i>
    </p>
    <div
        class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-autor">
        <div class="absolute right-0 w-56 mt-[2px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
            aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
            <div class="py-1">
                <a href="editAutor.php" tabindex="0"
                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                    role="menuitem">
                    <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                    <span class="px-4 py-0">Izmijeni autora</span>
                </a>
                <a href="#" tabindex="0"
                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                    role="menuitem">
                    <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                    <span class="px-4 py-0">Izbrisi autora</span>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>

            <!-- Space for content -->
<div class="pl-[30px] height-profile pb-[30px] scroll mt-[20px]">
    <div class="mr-[30px]">
        <div class="mt-[20px]">
            <span class="text-gray-500">Ime i prezime</span>
            <p class="font-medium">Mark Twain</p>
        </div>
        <div class="mt-[40px]">
            <span class="text-gray-500">Opis</span>
            <p class="font-medium max-w-[550px]">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Atque non aperiam voluptas
                expedita, laborum deleniti sit ipsum quam!
                Quis architecto aliquid deleniti ipsum labore ipsa mollitia aspernatur consequatur incidunt
                nesciunt.
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Atque non aperiam voluptas
                expedita, laborum deleniti sit ipsum quam!
                Quis architecto aliquid deleniti ipsum labore ipsa mollitia aspernatur consequatur incidunt
                nesciunt.
            </p>
        </div>
    </div>
</div>

@endsection('content')