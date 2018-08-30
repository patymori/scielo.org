<?php

/**
 * @author
 * SciELO - Scientific Electronic Library Online 
 * @link 
 * https://www.scielo.org/
 * @license
 * Copyright SciELO All Rights Reserved.
 */

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Collections Class
 *
 * This class uses the json array from the rest API service to configure and setup all the varibles 
 * used to customize the template view. It has logic that is dependent of the json content.
 *
 * @category	Models
 * @author		SciELO - Scientific Electronic Library Online 
 * @link		https://www.scielo.org/
 */
class Collections
{

    /**
     * List of all the data used in the collections setup.
     *
     * @var	array
     */
    private $collection_json = array();

    /**
     * List of all the data used in the collections development section.
     *
     * @var	array
     */
    private $development_list = array();

    /**
     * List of all the data used in the collections books section.
     *
     * @var	array
     */
    private $books_list = array();

    /**
     * List of all the data used in the collections scientific section.
     *
     * @var	array
     */
    private $scientific_list = array();

    /**
     * List of all the data used in the collections journals section.
     *
     * @var	array
     */
    private $journals_list = array();

    /**
     * Gets the about json array and call other setup methods.
     *
     * @param   array  $collection_json The rest API service data converted in an array.
     * @return	void
     */
    public function initialize($collection_json)
    {
        $this->collection_json = $collection_json;

        $this->set_collection_lists();
    }

    /**
     * Returns the books list.
     *
     * @return	array
     */
    public function get_books_list()
    {

        return $this->books_list;
    }

    /**
     * Returns the journals list.
     *
     * @return	array
     */
    public function get_journals_list()
    {

        return $this->journals_list;
    }

    /**
     * Returns the development list.
     *
     * @return	array
     */
    public function get_development_list()
    {

        return $this->development_list;
    }

    /**
     * Returns the scientific list.
     *
     * @return	array
     */
    public function get_scientific_list()
    {

        return $this->scientific_list;
    }

    /**
     * Set the collections list in the respective array by type.
     * Note that in this case I did not created a class (just cast the array), 
     * because this data can change in the future (this data comes from and external service, not wordpress). 
     *
     * @return	void
     */
    private function set_collection_lists()
    {
        foreach ($this->collection_json as $collection) {

            switch ($collection['status']) {

                case 'diffusion': // Section 'Coleções de livros'
                    $this->books_list[] = (object)$collection;
                    break;

                case 'certified': // Section 'Coleções de periódicos'
                    $this->journals_list[] = (object)$collection;
                    break;

                case 'development': // Section 'Em desenvolvimento'
                    $this->development_list[] = (object)$collection;
                    break;
            }
        }

    }

}