<?php


namespace Domains\User\Services\Contracts\DTOs;


/**
 * Class UsersRegisterReportDTO
 */
class UsersRegisterReportDTO
{
    /**
     * @var string
     */
    protected $registerFromClient;

    /**
     * @var string
     */
    protected $registerEndClient;

    /**
     * @var string
     */
    protected $statusClient;

    /**
     * @var string
     */
    protected $registerFromLegate;

    /**
     * @var string
     */
    protected $registerEndLegate;

    /**
     * @var string
     */
    protected $statusLegate;

    /**
     * @var string
     */
    protected $sort;

    /**
     * @var string
     */
    protected $paginate;

    /**
     * @var bool
     */
    protected $typeClient;

    /**
     * @var bool
     */
    protected $typeLegate;

    /**
     * @return bool
     */
    public function isTypeClient(): bool
    {
        return $this->typeClient;
    }

    /**
     * @param bool $typeClient
     * @return UsersRegisterReportDTO
     */
    public function setTypeClient(bool $typeClient): UsersRegisterReportDTO
    {
        $this->typeClient = $typeClient;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTypeLegate(): bool
    {
        return $this->typeLegate;
    }

    /**
     * @param bool $typeLegate
     * @return UsersRegisterReportDTO
     */
    public function setTypeLegate(bool $typeLegate): UsersRegisterReportDTO
    {
        $this->typeLegate = $typeLegate;
        return $this;
    }



    /**
     * @return int
     */
    public function getPaginate(): int
    {
        return $this->paginate;
    }

    /**
     * @param int $paginate
     * @return UsersRegisterReportDTO
     */
    public function setPaginate(int $paginate): UsersRegisterReportDTO
    {
        $this->paginate = $paginate;
        return $this;
    }

    /**
     * @return string
     */
    public function getSort(): string
    {
        return $this->sort;
    }

    /**
     * @param string $sort
     * @return UsersRegisterReportDTO
     */
    public function setSort(string $sort): UsersRegisterReportDTO
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegisterFromClient(): string
    {
        return $this->registerFromClient;
    }

    /**
     * @param string $registerFromClient
     * @return UsersRegisterReportDTO
     */
    public function setRegisterFromClient(string $registerFromClient): UsersRegisterReportDTO
    {
        $this->registerFromClient = $registerFromClient;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegisterEndClient(): string
    {
        return $this->registerEndClient;
    }

    /**
     * @param string $registerEndClient
     * @return UsersRegisterReportDTO
     */
    public function setRegisterEndClient(string $registerEndClient): UsersRegisterReportDTO
    {
        $this->registerEndClient = $registerEndClient;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusClient(): string
    {
        return $this->statusClient;
    }

    /**
     * @param string $statusClient
     * @return UsersRegisterReportDTO
     */
    public function setStatusClient(string $statusClient): UsersRegisterReportDTO
    {
        $this->statusClient = $statusClient;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegisterFromLegate(): string
    {
        return $this->registerFromLegate;
    }

    /**
     * @param string $registerFromLegate
     * @return UsersRegisterReportDTO
     */
    public function setRegisterFromLegate(string $registerFromLegate): UsersRegisterReportDTO
    {
        $this->registerFromLegate = $registerFromLegate;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegisterEndLegate(): string
    {
        return $this->registerEndLegate;
    }

    /**
     * @param string $registerEndLegate
     * @return UsersRegisterReportDTO
     */
    public function setRegisterEndLegate(string $registerEndLegate): UsersRegisterReportDTO
    {
        $this->registerEndLegate = $registerEndLegate;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusLegate(): string
    {
        return $this->statusLegate;
    }

    /**
     * @param string $statusLegate
     * @return UsersRegisterReportDTO
     */
    public function setStatusLegate(string $statusLegate): UsersRegisterReportDTO
    {
        $this->statusLegate = $statusLegate;
        return $this;
    }


}