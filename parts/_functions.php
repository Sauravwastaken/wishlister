<?php
function productNameLinkValidate($name, $link)
{
    if ($link == 0) {
        return $name;
    } else {
        return '<a class="product-name"  href="' . $link . '" target="_blank">' . $name . '</a>';
    }


}
?>