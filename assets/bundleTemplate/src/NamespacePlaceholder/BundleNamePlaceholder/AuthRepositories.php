<?php

namespace NamespacePlaceholder\BundleNamePlaceholder;

/**
 * Here you can define user repositories for the Auth component.
 */
class AuthRepositories extends \PHPixie\Auth\Repositories\Registry\Builder
{
    /**
     * @var Builder
     */
    protected $builder;

    /**
     * AuthRepositories constructor.
     * @param Builder $builder
     */
    public function __construct($builder)
    {
        $this->builder = $builder;
    }

    /**
     * Most often you will use some ORM repository for users
     */
    /*
    protected function buildUserRepository()
    {
        $orm = $this->builder->components()->orm();
        return $orm->repository('user');
    }
    */
}
