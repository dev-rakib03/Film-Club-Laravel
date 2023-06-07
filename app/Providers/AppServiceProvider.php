<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('aiub_id_check', function($attribute, $value, $parameters, $validator) {

            $data = $validator->getData();
            $aiub_id=$data['aiub_id'];
            $result = true;
            if($aiub_id[2]!='-'){
                $result = false;
            }
            elseif($aiub_id[8]!='-'){
                $result = false;
            }
            elseif(!is_numeric(substr($aiub_id, 0, 2))){
                $result = false;
            }
            elseif(!is_numeric(substr($aiub_id, 3, 5))){
                $result = false;
            }
            elseif(!is_numeric(substr($aiub_id, 9, 1))){
                $result = false;
            }
            else{
                $result = true;
                //dd(substr($aiub_id, 9, 1));
            }
            
            return $result;
        });
    }
}
