<?php 

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Filter{

    private array $filters = [
        'price' => PriceFilter::class,
    ];

    private array $admin_filters = [ // Фильтры, используемые в админке
        'category' => CategoryFilter::class,
        'price' => PriceFilter::class,
    ];

    // DEFAULT

    public function filter($request, $query){

        if($this->isUrlAdmin()){ // Если используется в админке
            $filters = $this->getAdminFilters();
            foreach($filters as $filter){
                $query = $filter::filter($request, $query);
            }
            return $query;
        }        
        
        $filters = $this->getFilters();
        foreach($filters as $filter){
            $query = $filter::filter($request, $query);
        }
        return $query;
    }

    public function view(){
        if($this->isUrlAdmin()){
            $filters = $this->getAdminFilters();
            foreach($filters as $filter){
                $views[] = $filter::view();
            }
            return $views;
        }
        $filters = $this->getFilters();
        foreach($filters as $filter){
            $views[] = $filter::view();
        }
        return $views;
    }

    // ADMIN

    // public function admin_filter($request, $query){
    //     $filters = $this->getAdminFilters();
    //     foreach($filters as $filter){
    //         $query = $filter::filter($request, $query);
    //     }
    //     return $query;
    // }

    // public function admin_view(){
    //     $filters = $this->getAdminFilters();
    //     foreach($filters as $filter){
    //         $views[] = $filter::view();
    //     }
    //     return $views;
    // }

    // FUNCTION

    private function getFilters(){
        return $this->filters;
    } 
    private function getAdminFilters(){
        return $this->admin_filters;
    } 
    private function isUrlAdmin(){
        $url = $_SERVER['REQUEST_URI'];
        return strpos($url, 'admin');
    }
}