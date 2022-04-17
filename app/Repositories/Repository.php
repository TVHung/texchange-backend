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
        return $this->model::where($col, $value)->first();
    }

    public function updateById($id, array $data)
    {
        return $this->model::where('id', $id)->update($data);
    }

    public function getByCols($filters, $relations = [], $sort = [])
    {
        if (count($relations) > 0) {
            if (is_array($sort) && !empty($sort['by']) && !empty($sort['type'])) {
                return $this->model::where($filters)->orderBy($sort['by'], $sort['type'])->with($relations)->first();
            }
            return $this->model::where($filters)->with($relations)->first();
        }
        if (is_array($sort) && !empty($sort['by']) && !empty($sort['type'])) {
            return $this->model::where($filters)->orderBy($sort['by'], $sort['type'])->first();
        }
        return $this->model::where($filters)->first();
    }

    public function updateByField(string $filed, $fieldValue, array $data): bool
    {
        try {
            $result = $this->getInstance()->where($filed, $fieldValue)->update($this->checkDataWithField($data));
            if (!$result) {
                return false;
            }
            return true;
        } catch (\Throwable $th) {
        }
        return false;
    }

    private function checkDataWithField(array $data)
    {
        return array_filter($data, function ($item) {
            return in_array($item, $this->fields, true);
        }, ARRAY_FILTER_USE_KEY);
    }

    public function deleteByField($column, $valueColumn): bool
    {
        try {
            return $this->getInstance()->where($column, $valueColumn)->delete();
        } catch (\Throwable $th) {
            set_log_error('deleteByField', $th->getMessage());
        }
        return false;
    }

    public function findByField($column, $valueColumn, $relations = [])
    {
    }
  
    public function isDeleted($tableName, $objectIdName, $objectId, $identifyCode)
    {
    }
}
