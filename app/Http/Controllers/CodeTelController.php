<?php

namespace App\Http\Controllers;

use App\Models\CodeTel;
use Illuminate\Http\Request;
use Dao\Implement\CodeTelImp;

class CodeTelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     protected $model;
    public function __construct(CodeTelImp $model)
    {
        $this->middleware('auth:api');
        $this->model=$model;
    }
    /**
 * @OA\Get(
 *     path="/api/index",
 *     tags={"Crud"},
 *     summary="Metodo que tiene como funcionalidad visualizar toda la data de codigo de pais registrada en base de datos",
 *      description="Metodo que tiene como funcionalidad visualizar toda la data de codigo de pais registrada en base de datos",
 *     @OA\Response(response="default", description="Welcome page",@OA\JsonContent()),
 *     security={{ "apiAuth": {} }}
 * )
 */
    public function index()
    {
        
        return response()->json($this->model->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
       /**
 * @OA\post(
 *     path="/api/store",
 *     tags={"Crud"},
 *     summary="Metodo que tiene como funcionalidad Registrar un codigo de un pais",
 *      description="Metodo que tiene como funcionalidad Registrar un codigo de un pais",
 *     @OA\Response(response="default", description="Welcome page",@OA\JsonContent()),
 *@OA\Parameter(
 *          name="country",
 *          description="digite pais a insertar",
 *        
 *          in="query",
 *          @OA\Schema(
 *              type="String"
 *          )
 *      ),
 * @OA\Parameter(
 *          name="code",
 *          description="digite codigo pais a insertar",
 *  
 *          in="query",
 *          @OA\Schema(
 *              type="String"
 *          )
 *      ),
 *     security={{ "apiAuth": {} }}
 * )
 */
    public function store(Request $request)
    {
      
        $datos=array($request->country,$request->code);
        return response()->json(["saved"=>$this->model->create($datos)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CodeTel  $codeTel
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\get(
     *      path="/api/show/{id}",
     *      tags={"Crud"},
     *      summary="Metodo que tiene como funcionalidad visualizar una  codigo telefonico especifico",
     *      description="Este metodo retorna una de  los codigos telefonicos y pais  registradas en base de datos",
     *  @OA\Parameter(
     *          name="id",
     *          description="Digite el id del pais",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Mostrar el codigo del pais con el id digitado"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
      * security={{ "apiAuth": {} }}
     * )
     */
    public function show($id)
    {
        return response()->json($this->model->find($id));
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CodeTel  $codeTel
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\put(
     *      path="/api/update/{id}",
     *      tags={"Crud"},
     *      summary="Metodo que tiene como funcionalidad actualizar informacion de codigo de pais dentro del sistema",
     *      description="Metodo que tiene como funcionalidad actualizar informacion de codigo de pais dentro del sistema",
     *    @OA\Parameter(
     *          name="id",
     *          description="Digite el id del pais a actualizar",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="country",
     *          description="Nuevo nombre pais",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="code",
     *          description="nuevo codigo pais",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Actualizar indformacion pais"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
      * security={{ "apiAuth": {} }}
     * )
     **/
    public function update(Request $request, $id)
    {
        $datos=array($request->country,$request->code);
        return response()->json(["updated"=>$this->model->update($datos,$id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CodeTel  $codeTel
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\delete(
     *      path="/api/destroy/{id}",
     *      tags={"Crud"},
     *      summary="Metodo que tiene como funcionalidad eliminar un codigo telefonico especifico",
     *      description="Metodo que tiene como funcionalidad eliminar un codigo telefonico especifico",
     *  @OA\Parameter(
     *          name="id",
     *          description="Digite el id del pais a eliminar",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Eliminar el codigo del pais con el id digitado"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
      * security={{ "apiAuth": {} }}
     * )
     */
    public function destroy($id)
    {
        return response()->json(["deleted"=>$this->model->delete($id)]);
    }
}
