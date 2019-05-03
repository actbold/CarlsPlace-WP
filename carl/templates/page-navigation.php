<?php get_header(); //Template Name: Navigation ?>

<main role="main">

<?php   $categoryMenuLinks = get_field('category_menu_links', 'options');
    $sidebarLinks = array();
    $subCategories = array();
    $subCategoryLinks = array();
    $linkIndex = 0;
    foreach($categoryMenuLinks as $key => $link){
        $linkIndex++;
        $sidebarLinks[] = array(
            'link_index' => $linkIndex,
            'link_title' => $link['title'],
            'link_target' => $link['target'],
            'link_subcategories' => $link['subcategories'],
        );
    }
    print_r($sidebarLinks);
?>

</main>


<?php get_footer(); ?>
