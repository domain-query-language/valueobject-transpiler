<?="<?php"?> namespace <?=$namespace;?>;

use EventSourced\ValueObject\ValueObject\Type\AbstractTreeNode;

class <?=$id['name']?> extends AbstractTreeNode 
{<?php
$options = array_map(function($option){
    return $option['name'];
}, $node_options);

$options_formatted = array_map(function($option){
    return "            '$option' => $option::class";
}, $options);

?>

    static protected function accepts()
    {
        return [
<?=implode(",\n", $options_formatted);?>
        
        ];
    }
}
