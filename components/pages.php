<?php
require_once __DIR__ . "/../BACK/get_student.php";

$pageNum = (int) ceil(getPagesCount() / 10);
$currentPage = 1;

if (isset($_GET['page']) && $_GET['page'] > 1) {
    $currentPage = $_GET['page'];
}

$liHtml = '';

for ($i = 0; $i <= $pageNum + 1; $i++) {

    if ($i == 0) {
        $isDisabled = ($currentPage == 1) ? "disabled" : "";
        $prevPage = ($currentPage == 1) ? 1 : $currentPage - 1;
        $liHtml .= "
 <li class='page-item '>
      <a class='page-link {$isDisabled}' href=' index.php?page={$prevPage}' aria-current='page'>Previous</a>
    </li>
";
    } else if ($i == $pageNum + 1) {
        $isDisabled = ($currentPage == $pageNum) ? "disabled" : "";
        $nextPage = ($currentPage == $pageNum) ? $pageNum : $currentPage + 1;
        $liHtml .= "
 <li class='page-item '>
      <a class='page-link {$isDisabled}' href=' index.php?page={$nextPage}' aria-current='page'>Next</a>
    </li>
";
    } else {
       $isActive = ($i == $currentPage) ? 'active' : '';

        $liHtml .= "
            <li class='page-item {$isActive}'>
                <a class='page-link' href='index.php?page={$i}'>
                    {$i}
                </a>
            </li>
        ";
    }


}
echo $liHtml;