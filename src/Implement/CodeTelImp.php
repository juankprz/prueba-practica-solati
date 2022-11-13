<?php
namespace Dao\Implement;
use App\Models\CodeTel;
use Dao\Repository\Repository;

class CodeTelImp implements Repository{

    protected $model;

     public function __construct(CodeTel $model)
    {
        $this->model=$model;
    }
    public function all()
    {
        return $this->model->all();
    }
    public function create(array $data){
       
        $this->model->country =$data[0];
        $this->model->code =$data[1];
        return $this->model->save();
    }
    public function delete($id){
        $country=$this->model->find($id);
       if(is_null($country)){
        return response()->json(['mensaje'=>'Codigo pais  no encontrado'], 422);
    }else{
    return  $country->delete();}
       
    }
    public function update(array $data,$id){

        $country= $country=$this->model->find($id);
        $insertar=true;
        if(is_null( $country)){
            $insertar=false;
            return response()->json(['mensaje'=>'codigo no encontrado'], 422);
        }
        if($insertar){
            if(!is_null($data[0])){
                $country->country=$data[0];
            }
            if(!is_null($data[1])){
                $country->code=$data[1];
            }
             if(is_null($data[0]) && is_null($data[1])  ){
                return response()->json(['mensaje'=>'No hay datos para actualizar'], 422);
             }

             return  $country->save();
            }else{
                return response()->json(['mensaje'=>'La agenda no se puede actualizar'], 422);
            }
        
       
       
    }
    public function find($id){
        $country=$this->model->find($id);
        if(is_null($country)){
            return response()->json(['mensaje'=>'Codigo pais  no encontrado'], 422);
        }else{
        return response()->json($country, 200);}
    }
}