<?php

namespace App\Repositories;

use App\Scopes\DeleteFlgNotDeleteScope;

class Repository
{
    private $model;
    protected $fields;

    public const NOT_DELETED = 'not_deleted';

    public function __construct($model)
    {
        $this->model = $model;
        $this->fields = defined("$model::FIELDS") ? $model::FIELDS : [];
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getInstance()
    {
        return new $this->model();
    }

    public function store($data)
    {
        if (empty($this->fields) || empty($data)) {
            return false;
        }

        $object = new $this->model();
        foreach ($this->fields as $field) {
            if (array_key_exists($field, $data)) {
                $object->$field = $data[$field];
            }
        }
        if ($object->save()) {
            return $object;
        }
        return false;
    }

    public function update($object, $data)
    {
        if (empty($this->fields) || empty($data)) {
            return false;
        }

        foreach ($this->fields as $field) {
            if (array_key_exists($field, $data)) {
                $object->$field = $data[$field];
            }
        }

        if ($object->save()) {
            return $object;
        }
        return false;
    }

    public function get($filters = [], $take = 30, $sort = [], $relations = [], $cols = ['*'])
    {
    }

    public function all($filters = [])
    {
        return $this->getInstance()->all();
    }

    public function getById($id)
    {
        if (!$id) {
            return false;
        }
        return $this->model::find($id);
    }

    public function getByCol($col, $value, $relations = [], $sort = [])
    {
    }

    public function updateById($id, array $data)
    {
        return $this->model::where('id', $id)->update($data);
    }

    public function getByCols($filters, $relations = [], $sort = [])
    {
    }

    public function updateByField(string $filed, $fieldValue, array $data): bool
    {
    }

    public function findByField($column, $valueColumn, $relations = [])
    {
    }
  
    public function isDeleted($tableName, $objectIdName, $objectId, $identifyCode)
    {
    }
}
