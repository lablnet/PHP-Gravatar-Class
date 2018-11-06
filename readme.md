# PHP-Gravatar-Class

Gravatar is an image that follows you from site to site appearing beside your name when you do things like comment or post on a blog

we use gravatar.com api

# Example

```php
<?php 

require "Classes/Gravatar.php";

$g = new Gravatar("lablnet01@gmail.com");
echo $g->toHtml();


echo "<br>";

//Change the size
$g->setSize(512);
echo $g->toHtml();
```