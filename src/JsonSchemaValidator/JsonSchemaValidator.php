<?php namespace Satooon\JsonSchemaValidator;

class JsonSchemaValidator
{
    public static function validate($data, $schemaPath = '')
    {
        if (\Config::get('json-schema-validator::config.run') === false) {
            return true;
        }

        if (! empty($schemaPath)) {
            $retriever = new \JsonSchema\Uri\UriRetriever;

            $schema = $retriever->retrieve('file://' . $schemaPath);

            $validator = new \JsonSchema\Validator();
            $validator->check($data, $schema);

            return $validator;
        }

        return true;
    }
}
