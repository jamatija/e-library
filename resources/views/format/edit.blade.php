@extends('layouts.app')

@section('title', 'Format')

@section('content')

<div>
        <nav class="w-full rounded">
            <ol class="flex list-reset">
            <li>
                    <a href="settingsPolisa.php" class="text-[#2196f3] hover:text-blue-600">
                        Settings
                    </a>
                </li>
                <li>
                    <span class="mx-2">/</span>
                </li>
                <li>
                    <a href="settingsFormat.php" class="text-[#2196f3] hover:text-blue-600">
                        Formati
                    </a>
                </li>
                <li>
                    <span class="mx-2">/</span>
                </li>
                <li>
                    <a href="#" class="text-gray-400 hover:text-blue-600">
                        Izmijeni podatke
                    </a>
                </li>
            </ol>
        </nav>
    </div>

            
            <!-- Space for content -->
            <div class="scroll height-content section-content">
                <form class="text-gray-700 forma">
                    <div class="flex flex-row ml-[30px]">
                        <div class="w-[50%] mb-[150px]">
                            <div class="mt-[20px]">
                                <p>Naziv formata <span class="text-red-500">*</span></p>
                                <input type="text" name="nazivFormatEdit" id="nazivFormatEdit" value="A1" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsNazivFormatEdit()"/>
                                <div id="validateNazivFormatEdit"></div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                                <button type="button"
                                    class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                    Ponisti <i class="fas fa-times ml-[4px]"></i>
                                </button>
                                <button id="sacuvajFormatEdit" type="submit"
                                    class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaFormatEdit()">
                                    Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


@endsection('content')