<div class="heading border-b-[1px] border-[#e4dfdf]">
    <div class="pl-[30px] mt-[22px] mb-[23px]">
        <h1>@yield('title')</h1>
    </div>
</div>

<div class="height-autori pb-[30px] scroll" style="overflow-y:auto; max-height:70vh;">
    <div class="flex items-center px-[30px] py-4 space-x-3 rounded-lg justify-between">


        <a href="{{ route($resourcePlural . '.create') }}" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300 rounded-[5px] tracking-wider text-white bg-[#3f51b5] hover:bg-[#4558BE]">
            <i class="fas fa-plus mr-[15px]"></i> New {{ $resourceName }}
        </a>
        <div class="items-center inline-block">
            <div class="relative text-gray-600 focus-within:text-gray-400">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </span>
                <input type="search" name="q"
                       class="py-2 pl-10 text-sm text-white bg-white rounded-md focus:outline-none focus:bg-white focus:text-gray-900"
                       placeholder="Search..." autocomplete="off">
            </div>
        </div>
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
                @foreach($headers as $header)
                    @if($header === "Book name" || $header === "Full name" || $header === "Author name")
                        <th class="px-4 py-4 leading-4 tracking-wider text-left">{{$header}}<a href="#"><i
                                    class="ml-3 fa-lg fas fa-long-arrow-alt-down" onclick="sortTable()"></i></a>
                        </th>
                    @elseif($header === "Author")
                        <th class="px-4 py-4 leading-4 tracking-wider text-left">{{$header}}<a href="#"><i
                                    class="ml-3 fas fa-filter" onclick="sortTable()"></i></a>
                        </th>
                    @elseif($header === "Category")
                        <th class="px-4 py-4 leading-4 tracking-wider text-left">{{$header}}<a href="#"><i
                                    class="ml-3 fas fa-filter" onclick="sortTable()"></i></a>
                        </th>
                    @else
                        <th class="px-4 py-4 leading-4 tracking-wider text-left">{{$header}}
                        </th>
                    @endif
                @endforeach

            </tr>
            </thead>

            <tbody class="bg-white">
            @foreach($items as $item)
                <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                    <td class="px-4 py-3 whitespace-no-wrap">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" id="{{$item->id}}">
                        </label>
                    </td>

                    <td class="flex flex-row items-center px-4 py-3">
                        <img class="object-cover w-8 mr-2 h-11" src="{{ asset($item->picture) }}" alt="default image" />
                        <a href="">
                            <span class="mr-2 font-medium text-center">{{ $item->title ?? $item->name}}</span>
                        </a>
                    </td>

                    @isset($pivots)
                        @foreach($pivots as $pivot)
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                @foreach($item->$pivot as $data)
                                    {{ $data->name . ($loop->last ? '' : ',') }}
                                @endforeach
                            </td>
                        @endforeach
                    @endisset

                    @foreach($values as $value)
                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                            {{$item->$value}}
                        </td>
                    @endforeach


                    <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                        <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsAutori hover:text-[#606FC7]">
                            <i class="fas fa-ellipsis-v"></i>
                        </p>
                        <div
                            class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-autori">
                            <div class="absolute right-[25px] w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                 aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                <div class="py-1">
                                    <a href="{{ route($resourcePlural . '.show', $item->id) }}" tabindex="0"
                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                       role="menuitem">
                                        <i class="far fa-file mr-[5px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Show details</span>
                                    </a>
                                    <a href="{{ route($resourcePlural . '.edit', $item->id) }}" tabindex="0"
                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                       role="menuitem">
                                        <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Edit {{ $resourceName }}</span>
                                    </a>

                                    <form action="{{ route($resourcePlural . '.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button id="deleteAuthors" type="submit"  tabindex="0"
                                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                        >
                                            <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">Delete {{ $resourceName }}</span>
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

        <div class="flex-row items-center justify-end mt-2 ">
            {{ $items->links() }}
        </div>
    </div>
</div>
