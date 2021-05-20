<?php

$resLeftMenu = ModLeftMenu::buildLeftMenu();
$menu_string = '<ul>';
foreach ($resLeftMenu as $catM => $SsCats) {
    $menu_string  .= '<li class="licategorie">' . $catM . '</li>';
    foreach ($SsCats as $SsCatName) {
        $menu_string .= '<li class="lisscategorie">';
        $menu_string .= '<a href="index.php?idsscat=' . $SsCatName[0] . '">' . $SsCatName[1] . '</a>';
        $menu_string .= '</li>';
    }
}
$menu_string .= '</ul>';
echo $menu_string;