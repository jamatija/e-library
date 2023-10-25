<form action="{{ route($resourcePlural.'.filter' ) }}" method="POST">
@csrf
    <input type="search" name="searchTerm" class="py-2 pl-10 text-sm text-white bg-white rounded-md focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Search..." autocomplete="off">
</form>