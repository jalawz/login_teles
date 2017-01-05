<?php

/**
 * Classe Model de Usuarios
 */

namespace Teles;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password', 'first_name', 'last_name', 'location', 'company'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    /**
     * Metodo que retorna o Id do Usuario
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Metodo que retorna o nome completo do user se estiver cadastrado,
     * caso contrario retorna o primeiro nome,
     * caso contrario retorna null
     * @return string or null
     */
    public function getName()
    {
    	if ($this->first_name && $this->last_name) {
    		return "{$this->first_name} {$last_name}";
    	}

    	if ($this->first_name) {
    		return $this->first_name;
    	}

    	return null;
    }
    
    /**
     * Metodo que verifica o se o metodo getName() nao e' null,
     * se for retorna o username que e' obrigatorio para o cadastro
     * @return string
     */
    public function getNameOrUsername()
    {
    	return $this->getName() ?: $this->username;
    }
    
    /**
     * Metodo que verifica se o campo no banco first_name esta preenchido e o retorna,
     * caso contrario retorna o username
     * @return string
     */
    public function getFirstNameOrUsername()
    {
    	return $this->first_name ?: $this->username;
    }
}
