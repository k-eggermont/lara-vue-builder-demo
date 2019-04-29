<?php

namespace App\Forms;

use \Keggermont\LaraVueBuilder\App\Forms\Form;
use App\Author;

class AuthorsForm extends Form {

    static $class = Author::class;
    private $entity = null;
    static $with = [];

    // Actions available for this form
    static $actions = ["create","update","delete","index","view"];


    public function fields() {

        /*
        Here you can add your fields.
        */
        return [

            (new \Keggermont\LaraVueBuilder\App\Fields\InputField("name")),
            (new \Keggermont\LaraVueBuilder\App\Fields\DateTimeField("birthday"))->setMinDate("1900-01-01")->setMaxDate(date("Y-m-d"))->setDisplayDateFormat("d-m-Y")->setEnableTime(false),
            (new \Keggermont\LaraVueBuilder\App\Fields\TextareaField("biograpy"))->nullable(),
            (new \Keggermont\LaraVueBuilder\App\Fields\UploaderField("picture"))->nullable(true),
            (new \Keggermont\LaraVueBuilder\App\Fields\SelectField("is_alive"))->options([1 => "oui", 0 => "non"])->nullable(),


        ];

    }

    public function executeBeforeProcessing($model, $fieldsNotUpdated) {
        /**
         * You can update this method for adding custom processing before insert/update
         */

        request()->validate([ "test_id" => "array|required"]);
        return $model;
    }


}