<?php
namespace Library\Models;

use ORM\Model\Model;
use ORM\Model\RelationKey;

//Class cannot override base constructor
//If you want this you must use parent constructor in constructor of this class

class Book extends Model {

    public function init() {
        $this->relations = [
            new RelationKey('authors', 'author_id', 'id'),
        ];
    }

}
