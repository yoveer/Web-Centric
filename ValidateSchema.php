<?php

use Opis\JsonSchema\{
    Validator,
    ValidationResult,
    ValidationError,
    Schema
};

require_once 'vendor/autoload.php';

$url = 'search_result.json'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable

$schema = Schema::fromJsonString(file_get_contents('schema.json')); //path to schema file

$validator = new Validator();

/** @var ValidationResult $result */
$result = $validator->schemaValidation($data, $schema);

if ($result->isValid()) {
    echo 'data is valid', PHP_EOL;
    // echo $data;
} else {
    /** @var ValidationError $error */
    $error = $result->getFirstError();
    echo '$data is invalid', PHP_EOL;
    echo "Error: ", $error->keyword(), PHP_EOL;
    echo json_encode($error->keywordArgs(), JSON_PRETTY_PRINT), PHP_EOL;
}
