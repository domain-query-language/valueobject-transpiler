<?="<?php"?> namespace <?=$namespace;?>;

use EventSourced\ValueObject\ValueObject\Type\AbstractEntity;

class <?=$id['name']?> extends AbstractEntity
{<?php 
$private = "";
$arguments = "";
$assignment = "";
$getters = "";

foreach ($properties as $property) {
    
    $key = $property['key'];
    $arguments[] = $property['id']['name'].' $'.$key;
    if ($key != "id") {
        
        $private .=  '    private $'.$key.";\n";
    
        $assignment .= '        $this->'.$key.' = $'.$key.";\n";
        $getters .= "
    public function ".$key."()
    {
        return ".'$this->'.$key.";
    }\n";      
    }
    
}?>

<?=$private?>

    public function __construct(<?=implode(", ", $arguments)?>)
    {
<?=$assignment?>
        parent::__construct($id);
    }
    <?=$getters?>
}

