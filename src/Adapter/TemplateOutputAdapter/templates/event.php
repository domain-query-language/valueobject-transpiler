<?="<?php"?> namespace <?=$namespace;?>;

use EventSourced\ValueObject\ValueObject\Type\AbstractEntity;
use EventSourced\ValueObject\ValueObject\Uuid;

class <?=$id['name']?> extends AbstractEntity
{<?php 
$private = "";
$arguments = [];
$assignment = "";
$getters = "";

array_unshift($properties, ['key'=>'aggregate_id', 'id'=>['name'=>'Uuid']]);
array_unshift($properties, ['key'=>'id', 'id'=>['name'=>'Uuid']]);

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

