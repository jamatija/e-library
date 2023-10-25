<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

trait HasPagination
{
    /**
     * After item is deleted calculates what page to redirect to.
     */
    function calculateRedirectPage($perPage, $total, $currentPage)
    {
        if ($total < $perPage)
            return 1;
        $numberOfElementsCurrentPage = $total - ($currentPage - 1) * $perPage;
        if ($numberOfElementsCurrentPage == 1)
            return $currentPage - 1;

        return $currentPage;
    }

    /**
     * Processes data for index page for following resources binding, genre, categories, language, publisher, script, size.
     */
    public function processIndexData(Request $request, $query)
    {
        // Get values from request or set default
        $searchTerm = $request->searchTerm;
        $rowsPerPage = $request->rowsPerPage ?? $this->rowsPerPage;
        $orderBy = $request->orderBy ?? $this->orderBy;
        $orderDir = $request->orderDir ?? $this->orderDir;
        $page = $request->page;

        // Order, filter and paginate data
        $this->order($query, $orderBy, $orderDir);

        $this->filter($query, $searchTerm);
        $paginator = $this->paginate($query, $rowsPerPage);

        // Append attributes to paginator
        $paginator->appends([
            'orderBy' => $orderBy,
            'orderDir' => $orderDir,
            'rowsPerPage' => $rowsPerPage,
            'searchTerm' => $searchTerm,
            'page' => $page,
        ]);

        return $paginator;
    }

    /**
     * Paginates data for index page.
     */
    protected function paginate($query, $rowsPerPage): LengthAwarePaginator
    {
        return $query->paginate($rowsPerPage);
    }

    /**
     * Orders data for index page.
     */
    protected function order($query, $orderBy, $orderDir)
    {   
       $query->orderBy($orderBy, $orderDir);
    }

    /**
     * Filters data for index page only for one field - name.
     */
    protected function filter($query, $searchTerm)
    {
        if (!empty($searchTerm)){
           return $query->where('name', 'LIKE', "%$searchTerm%");
        }
        return $query;
    }
}
