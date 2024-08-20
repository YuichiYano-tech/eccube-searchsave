<?php

namespace Plugin\SearchQueryLogger\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dtb_search_query")
 */
class SearchQuery
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $search_keyword;

    /**
     * @ORM\Column(type="string")
     */
    private $user_ip;

    /**
     * @ORM\Column(type="datetime")
     */
    private $search_date;

    public function getId()
    {
        return $id;
    }

    public function setSearchKeyword($search_keyword)
    {
        $this->search_keyword = $search_keyword;
    }

    public function getSearchKeyword()
    {
        return $this->search_keyword;
    }

    public function setUserIp($user_ip)
    {
        $this->user_ip = $user_ip;
    }

    public function getUserIp()
    {
        return $this->user_ip;
    }

    public function setSearchDate($search_date)
    {
        $this->search_date = $search_date;
    }

    public function getSearchDate()
    {
        return $this->search_date;
    }
}
