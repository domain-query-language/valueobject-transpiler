<?="<?php"?> use EventSourced\ValueObject\ValueObject\Type\AbstractSingleValue;

class <?=$name?> extends AbstractSingleValue 
{    
    protected function validator()
    {
        <?php 
        $validator_functions = '';
        foreach ($validators as $validator) {
            $validator_functions.= "->".$validator->name."(".implode(", ",$validator->arguments);
        ?>
        return parent::validator()<?=$validator_functions?>;
    }
}

