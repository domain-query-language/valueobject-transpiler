<?="<?php"?> namespace <?=$namespace;?>;

use EventSourced\ValueObject\ValueObject\Type\AbstractCollection;

class <?=$id['name']?> extends AbstractCollection 
{
    public function collection_of()
    {
        return <?=$collection_of['name']?>::class;
    }
}

