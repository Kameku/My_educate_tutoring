<?php
namespace App\Helpers;

class Helper
{

    public static function IDGenerator($model, $trow, $length, $prefix ){
        $data = $model::orderBy('id','desc')->first();
        if(!$data){
            $og_length = $length;
            $last_number = '';
        }else{
            // $length;
            $code = substr($data->$trow, strlen($prefix)+1);
            $actial_last_number = ($code/1)*1;
            $increment_last_number = ((int)$actial_last_number)+1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = "";
        for($i=0;$i<$og_length;$i++){
            $zeros.="0";
        }
        return $prefix.'-'.$zeros.$last_number;
    }
  
}

// $code_id = Helper::IDGenerator(new User, 'code_id', 2, 'MET'); /** Genera id */ controlador
//         $user = new User;
//         $user->code_id = $code_id;
//            $user->save()

// $length = 4,
?>
