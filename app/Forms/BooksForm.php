<?php

namespace App\Forms;

use App\Author;
use \Keggermont\LaraVueBuilder\App\Forms\Form;
use App\Book;

class BooksForm extends Form {

    static $class = Book::class;
    private $entity = null;
    static $with = [];

    // Actions available for this form
    static $actions = ["create","update","delete","index","view"];


    public function fields() {

        /*
        Here you can add your fields.
        */
        return [

            (new \Keggermont\LaraVueBuilder\App\Fields\InputField("Name of the book:","name")),
            (new \Keggermont\LaraVueBuilder\App\Fields\NumberField("Price:","price"))->step(0.01)->min(0)->max(100)->setPlaceholder("Price"),
            (new \Keggermont\LaraVueBuilder\App\Fields\NumberField("State of stocks", "stock"))->min(0)->max(50)->setPlaceholder("Stock"),
            (new \Keggermont\LaraVueBuilder\App\Fields\TextareaField("Description:","description"))->nullable(),
            (new \Keggermont\LaraVueBuilder\App\Fields\SelectField("Author:","author_id"))->options(
                function() {
                    return Author::pluck("name","id")->toArray();

                })

        ];
/*
 * $table->bigIncrements('id');
            $table->string("name");
            $table->decimal("price",10,2);
            $table->integer("stock")->default(0);
            $table->string("description")->nullable();
            $table->integer("author_id")->unsigned();
 */
    }

    public function executeBeforeProcessing($model, $fieldsNotUpdated) {
        /**
         * You can update this method for adding custom processing before insert/update
         */
        return $model;
    }


}