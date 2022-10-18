<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
public function adopcion(){
    return $this->belongsTo('App\Models\Adopcion');
}

protected $allowIncluded = ['adopcion']; 
    
protected $allowFilter = ['id', 'name'];

protected $allowSort = ['id', 'name'];


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
