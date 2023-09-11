@extends('layouts.app')

@section('title', 'Autori')

@section('content')

<div class="height-autori pb-[30px] scroll" style="overflow-y:auto; max-height:70vh;">
        <div class="flex items-center px-[30px] py-4 space-x-3 rounded-lg justify-between">
            

        <a href="{{ route('authors.create') }}" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300 rounded-[5px] tracking-wider text-white bg-[#3f51b5] hover:bg-[#4558BE]">
                <i class="fas fa-plus mr-[15px]"></i> Novi autor
            </a>
            <x-search-bar></x-search-bar>
        </div>

        <div
            class="inline-block min-w-full px-[30px] pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard">
            <table class="overflow-hidden shadow-lg rounded-xl min-w-full border-[1px] border-[#e4dfdf]" id="myTable">
                <thead class="bg-[#EFF3F6]">
                    <tr class="border-b-[1px] border-[#e4dfdf]">
                        <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox">
                            </label>
                        </th>
                        <th class="px-4 py-4 leading-4 tracking-wider text-left">Naziv autora<a href="#"><i
                                    class="ml-3 fa-lg fas fa-long-arrow-alt-down" onclick="sortTable()"></i></a>
                        </th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Opis</th>
                        <th class="px-4 py-4"> </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    
                @foreach($authors as $author)
                    <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                        <td class="px-4 py-3 whitespace-no-wrap">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" id="{{$author->id}}">
                            </label>
                        </td>
                        <td class="flex flex-row items-center px-4 py-3">
                            <img class="object-cover w-8 mr-2 h-11" src="{{ asset('/storage/'.$author->picture) }}" alt="" />
                            <a href="autorProfile.php">
                                <span class="mr-2 font-medium text-center">{{ $author->name }}</span>
                            </a>
                        </td>
                        </td>
                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ $author->about }}</td>
                        <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsAutori hover:text-[#606FC7]">
                                <i class="fas fa-ellipsis-v"></i>
                            </p>
                            <div
                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-autori">
                                <div class="absolute right-[25px] w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                    aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                    <div class="py-1">
                                        <a href="{{ route('authors.show', $author->id) }}" tabindex="0"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            role="menuitem">
                                            <i class="far fa-file mr-[5px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">Pogledaj detalje</span>
                                        </a>
                                        <a href="{{ route('authors.edit', $author->id) }}" tabindex="0"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            role="menuitem">
                                            <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">Izmijeni autora</span>
                                        </a>
                                        
                                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button id="deleteAuthors" type="submit"  tabindex="0"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            >
                                            <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">Izbrisi autora</span>
                                        </button>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                    
                    
                </tbody>
            </table>

            <div class=" flex-row items-center justify-end mt-2">
            {{ $authors->links() }}
            </div>
        </div>
    </div>


@endsection('content')