<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Adopcion extends Model
{
   

  protected $fillable =['user_id','especie_id','fundacion_id'];

  protected $allowIncluded=['users','especies','fundaciones'];

  protected $allowFilter=['id', 'user_id'];

  protected $allowSort = ['id', 'user_id'];


public function users(){
    return $this->hasMany('App\Models\User');
}
public function especies(){
    return $this->hasMany('App\Models\Especie');
}
public function fundaciones(){
    return $this->hasMany('App\Models\Fundacion');
}
 
public function scopeIncluded(Builder $query)
{

    if (empty($this->allowIncluded) || empty(request('included'))) {
        return;
    }
    $relations = explode(',', request('included')); //['posts','relation2']
    //return $relations;

    $allowIncluded = collect($this->allowIncluded); //colocamos en una colecion lo que tiene $allowIncluded en este caso = ['posts','posts.user']
   // return $allowIncluded;
    foreach ($relations as $key => $relationship) { //recorremos el array de $relations y los guardamos en una variable llamada relationship

        if (!$allowIncluded->contains($relationship)) { // si un elemento de la variable allowIncluded no esta dentro de $relationship 
            unset($relations[$key]);
        }
    }
                  //relationship: relaciones que existen, si lo que lleva la variante ship va en en el allowed no hace nada 
    $query->with($relations);
}

public function scopeFilter(Builder $query)
{

    if (empty($this->allowFilter) || empty(request('filter'))) {
        return;
    }

    $filters = request('filter');
    $allowFilter = collect($this->allowFilter);

    foreach ($filters as $filter => $value) {
        if ($allowFilter->contains($filter)) {

            //$query->where($filter, $value);
            $query->where($filter,'LIKE','%'.$value.'%');
        }
    }
}


public function scopeSort(Builder $query)
{

    if (empty($this->allowSort) || empty(request('sort'))) {
        return;
    }

    $sortFields = explode(',',request('sort')) ;
    $allowSort = collect($this->allowSort);

    foreach ($sortFields as $sortField) {
        
        if ($allowSort->contains($sortField)) {
            $query->orderBy($sortField,'asc');
           }
    }

}


}