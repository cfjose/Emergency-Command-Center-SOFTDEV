<?php

/**
 * Created by PhpStorm.
 * User: chamber
 * Date: 4/7/17
 * Time: 4:00 PM
 */
class ChartsData extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->chartsdata = $this->load->database('sampledata', TRUE);
    }

    public function totalCasualties(){
        $this->chartsdata->select('*');
        $this->chartsdata->from('casualties');

        $query = $this->chartsdata->get();

        $result = $query->result();

        return $query;
    }

    public function casualtiesPerRegion(){
        $this->chartsdata->select('*');
        $this->chartsdata->from('casualties');

        $query = $this->chartsdata->get();

        return $query;
    }

    public function getRegions($regionId){
        $this->chartsdata->select('name');
        $this->chartsdata->from('region');
        $this->chartsdata->where('id = ' . $regionId);

        $query = $this->chartsdata->get();

        return $query;
    }

    public function getAffectedPopulation(){
        $this->chartsdata->select('*');
        $this->chartsdata->from('affected-population');

        $query = $this->chartsdata->get();

        return $query;
    }
}