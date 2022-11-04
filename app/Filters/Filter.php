<?php 

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class Filter{

    private array $filters = [
        PriceFilter::class,
    ];

    private array $admin_filters = [
        CategoryFilter::class,
    ];

    // DEFAULT

    public function filter($request, $query){
        $filters = $this->getFilters();
        foreach($filters as $filter){
            $query = $filter::filter($request, $query);
        }
        return $query;
    }

    public function view(){
        $filters = $this->getFilters();
        foreach($filters as $filter){
            $views[] = $filter::view();
        }
        return $views;
    }

    // ADMIN

    public function admin_filter($request, $query){
        $filters = $this->getAdminFilters();
        foreach($filters as $filter){
            $query = $filter::filter($request, $query);
        }
        return $query;
    }

    public function admin_view(){
        $filters = $this->getAdminFilters();
        foreach($filters as $filter){
            $views[] = $filter::view();
        }
        return $views;
    }

    // FUNCTION

    public function getFilters(){
        return $this->filters;
    } 
    public function getAdminFilters(){
        return $this->admin_filters;
    } 
}