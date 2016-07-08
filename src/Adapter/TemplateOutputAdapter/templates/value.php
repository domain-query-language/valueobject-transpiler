<?="<?php"?> use EventSourced\ValueObject\ValueObject\Type\AbstractSingleValue;

class <?=$name?> extends AbstractSingleValue 
{    
    protected function validator()
    {
        return parent::validator()->floatVal()->between(-67, 90);
    }
}

