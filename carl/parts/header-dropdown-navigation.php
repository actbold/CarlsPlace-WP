<?php
    $categoryMenuLinks = get_field('category_menu_links', 'options');
    $materialMenuLinks = get_field('material_menu_links', 'options');
?>
<div id="dropdown-navigation">
    <div id="category-menu" class="menu menu--active">
        <div class="dropdown-layout">
            <div class="dropdown-sidebar">
                <ul>
                <?php $i = 0; foreach($categoryMenuLinks as $link):  $i++;
                    if($i == 1){ $class = 'link--active'; } else { $class = ''; }
                ?>
                    <li>
                        <a class="<?= $class; ?>" href="#"><?= $link['title']; ?></a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
            <div class="dropdown-content">
                <?php $i = 0; foreach($categoryMenuLinks as $link): $Subcategories = $link['subcategories']; $i++;
                    if($i == 1){ $class = 'content--active'; } else { $class = ''; }
                ?>
                    <div class="menu-content <?= $class; ?>">
                        <div class="dropdown-content-layout">
                            <?php foreach($Subcategories as $Subcategory): ?>
                                    <div class="menu-block">
                                        <div class="title"><span><?= $Subcategory['title']; ?></span></div>
                                            <ul>
                                                <?php foreach($Subcategory['links'] as $link): ?>
                                                    <li><a href="<?= $link['link']; ?>" title="<?= $link['title']; ?>"><?= $link['title']; ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                    </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div id="material-menu" class="menu">
        <div class="dropdown-layout">
            <div class="dropdown-sidebar">
                <ul>
                <?php foreach($materialMenuLinks as $link): ?>
                    <li>
                        <a href="#"><?= $link['title']; ?></a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
            <div class="dropdown-content">
                <?php $i = 0; foreach($materialMenuLinks as $link): $Subcategories = $link['subcategories']; $i++;
                    if($i == 1){ $class = 'active'; } else { $class = 'inactive'; }
                ?>
                    <div class="menu-content <?= $class; ?>">
                        <div class="dropdown-content-layout">
                            <?php foreach($Subcategories as $Subcategory): 
                                if($Subcategory['links'][0]['image']) {
                                    $class = 'menu-block--has-image';
                                } else {
                                    $class = '';
                                }
                                ?>
                                    <div class="menu-block <?= $class; ?>">
                                        <div class="title"><span><?= $Subcategory['title']; ?></span></div>
                                            <ul>
                                                <?php foreach($Subcategory['links'] as $link): ?>
                                                    <li><a href="<?= $link['link']; ?>" title="<?= $link['title']; ?>">
                                                        <img src="<?= $link['image']; ?>" />
                                                        <div class="title">
                                                            <span><?= $link['title']; ?></span>
                                                        </div>
                                                    </a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                    </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>