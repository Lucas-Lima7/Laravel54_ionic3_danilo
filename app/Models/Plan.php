<?php

namespace DeskFlix\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Plan extends Model implements Transformable, TableInterface
{
    const DURATION_YEARLY = 1;
    const DURATION_MONTHLY = 2;

    use TransformableTrait;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'value',
        'duration',
    ];

    public function getSku(){
        return "plan - {$this->id}";
    }

    protected $casts = [
      'duration' => 'integer'
    ];
    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['#', 'Nome', 'Descrição', 'Duração'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header) {
            case '#':
                return $this->id;
            case 'Nome':
                return $this->name;
            case 'Descrição':
                return $this->description;
            case 'Duração':
                return $this->duration == self::DURATION_MONTHLY ? 'Monthly' : 'Yearly';
        }
    }
}
