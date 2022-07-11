# php-pagination
Simple pagination (Pure PHP)

<img src="https://camo.githubusercontent.com/087e01747495b2ce95c09e9f8ca394d721b8cf5146897b49628e31954f1f07f3/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f7068702d253345253344253230372e302d3838393242462e737667" alt="PHP version" data-canonical-src="https://img.shields.io/badge/php-%3E%3D%207.0-8892BF.svg" style="max-width: 100%;">
<p>Used <a href="https://github.com/fzaninotto/Faker">Faker</a> for test function with fake datas. Remove related lines if you don't want to use Faker.</p>
<p>This project can help you to manage pages and listing items.
It won't get items from Database or something else, you need to get those values and pass it to the function.
</p>
<p>paginate function returns the list of pages you need.</p>
<p> Check values before pass the function to prevent fatal errors.</p>
<p> Try to keep $maxPaginationItems in odd numbers to center items properly. </p>
<h3>Simple usage</h3>
<pre>
use Pagination\Pagination;
echo Pagination::paginate($currentIndex, $itemsPerPage, $totalItems, $maxPaginationItems, $link);
</pre>