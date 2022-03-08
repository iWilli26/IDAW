<?php
require_once("./template/templateHeader.php");
require_once("./template/templateMenu.php");
$currentPageId = 'accueil';
if(isset($_GET['page'])) {
    $currentPageId = $_GET['page'];
}
?>

<?php
renderMenuToHTML($currentPageId);
?>

<section class="corps">
    <?php $pageToInclude = $currentPageId . ".php";
if(is_readable($pageToInclude))
require_once($pageToInclude);
?>
</section>
<?php
require_once("./template/templateFooter.php");
?>