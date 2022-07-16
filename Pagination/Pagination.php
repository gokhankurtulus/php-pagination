<?php

namespace Pagination;
class Pagination
{

    /**
     * @param int $currentIndex current page number
     * @param int $itemsPerPage how many items showing per page
     * @param int $totalItems total items
     * @param int $maxPaginationItems how many list item you want to see
     * @param string $link links for page numbers
     * @return string                   returns list
     */
    public static function paginate(int $currentIndex, int $itemsPerPage, int $totalItems, int $maxPaginationItems, string $link)
    {
        // Start and end of the list
        $firstPage = 1;
        $lastPage = ceil($totalItems / $itemsPerPage);  // Calculate total page

        if ($currentIndex > $lastPage)  // Current index cannot be bigger than maximum page
            $currentIndex = $lastPage;

        if ($maxPaginationItems >= $lastPage) { // Page list can't be bigger than maximum page and check do we need prev and next links
            $maxPaginationItems = $lastPage;
            $prevAndNext = false;
        } else
            $prevAndNext = true;

        // Calculate half of the list for number of left and right elements
        $beforeAfter = floor($maxPaginationItems / 2);

        // If the current page at the starting of the list
        if ($currentIndex <= $maxPaginationItems - $beforeAfter) {
            // we don't want to fall into the nothing, fixed the first page to one
            // Current index can aligned center or left
            $before = $firstPage;
            $after = $maxPaginationItems;
        } else {
            if ($currentIndex >= $lastPage - $beforeAfter) { // If the current page at the end of the list
                // Current index can aligned center or right
                $before = $lastPage - ($maxPaginationItems - 1);
                $after = $lastPage;
            } else { // If the current page at the middle of the list
                // Current index at the center of list calculate left and right elements
                $before = $currentIndex - $beforeAfter;
                $after = $currentIndex + $beforeAfter;
            }
        }
//        Remove these lines if you don't want to check values
//        echo "current: $currentIndex <br>";
//        echo "total: $totalItems <br>";
//        echo "maxlistitems: $maxPaginationItems <br>";
//        echo "first page: $firstPage <br>";
//        echo "last page: $lastPage <br>";
//        echo "beforeafter: $beforeAfter <br>";
//        echo "before: $before <br>";
//        echo "after: $after <br>";

        // Assign html elements to variable for return list completely
        $list = '<ul class="pagination">';
        if ($prevAndNext)                                                       // Go first page
            $list .= "<li><a href='$link$firstPage'>&lt;</a></li>";
        for ($i = $before; $i <= $after; $i++) {
            if ($i == $currentIndex)
                $list .= "<li><a class='active' href='$link$i'>$i</a></li>";    // Current Page
            else
                $list .= "<li><a href='$link$i'>$i</a></li>";                   // Other Pages
        }
        if ($prevAndNext)                                                       // Go last page
            $list .= "<li><a href='$link$lastPage'>&gt;</a></li>";
        $list .= '</ul>';

        return $list;
    }
}
