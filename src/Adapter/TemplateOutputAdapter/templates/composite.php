<?="<?php"?> namespace <?=$namespace;?>;

use EventSourced\ValueObject\ValueObject\Type\AbstractComposite;

class <?=$id['name']?> extends AbstractComposite 
{<?php 
$private = "";
$arguments = "";
$assignment = "";
$getters = "";

foreach ($properties as $property){
    $key = $property['key'];
    $private .=  '    private $'.$key.";\n";
    $arguments[] = $property['id']['name'].' $'.$key;
    $assignment .= '        $this->'.$key.' = $'.$key.";\n";
    $getters .= "
    public function ".$key."()
    {
        return ".'$this->'.$key.";
    }\n";      
}?>

<?=$private?>

    public function __construct(<?=implode(", ", $arguments)?>)
    {
<?=$assignment?>
    }
    <?=$getters?>
}

