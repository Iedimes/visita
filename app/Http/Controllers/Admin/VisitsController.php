<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Visit\BulkDestroyVisit;
use App\Http\Requests\Admin\Visit\DestroyVisit;
use App\Http\Requests\Admin\Visit\IndexVisit;
use App\Http\Requests\Admin\Visit\StoreVisit;
use App\Http\Requests\Admin\Visit\UpdateVisit;
use App\Http\Requests\Admin\Visit\ParametroReportev;
use App\Models\Visit;
use App\Models\State;
use App\Models\Dependency;
use Carbon\Carbon;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use PDF;
use App\Models\RoleAdminUser;



class VisitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IndexVisit $request
     * @return array|Factory|View
     */
    public function index(Visit $visit, IndexVisit $request)
    {
        // $login=auth()->id();
        // $roles=RoleAdminUser::where('admin_users_id', $login)
        //                             ->first();

        // create and AdminListing instance for a specific model and
       // return date('Y-m-d h:y:s');
       $id = $visit->id;

        $data = AdminListing::create(Visit::class)->processRequestAndGet(
            // pass the request with params
            $request,
            // set columns to query
            ['id', 'CI', 'Full_Name', 'First_Surname', 'Second_Surname', 'Married_Surname', 'First_Name', 'Second_Name', 'Reason', 'Observation', 'Entry_Datetime', 'Exit_Datetime', 'state_id', 'dependency_id'],

            // set columns to searchIn
            ['id','CI', 'Full_Name', 'First_Surname', 'Second_Surname', 'Married_Surname', 'First_Name', 'Second_Name', 'Reason', 'Observation'],


            function ($query) use ($id) {
                $query
                   //  ->where('helps.id', '=', $id);
                  ->orderBy('id', 'DESC');
            }

     );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.visit.index', ['data' => $data]);
    }

    public function inicio(Visit $visit, IndexVisit $request)
    {
        return view('admin.visit.inicio');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.visit.create');
        $state = State::all();
        $dependency= Dependency::all();

       // $Entry_Datetime=date('d/m/Y', strtotime($contrato['CliFchCon']));

        return view('admin.visit.create', compact('state','dependency'));
    }

    public function createsc()
    {
        //$this->authorize('admin.visit.create');
        $state = State::all();
        $dependency= Dependency::all();

       // $Entry_Datetime=date('d/m/Y', strtotime($contrato['CliFchCon']));

        return view('admin.visit.createsc', compact('state','dependency'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreVisit $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreVisit $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['state_id']= 1;// $request->getStateId();
        $sanitized ['dependency_id']=  $request->getDependencyId();
              //  $status->Visit_id = $Visit->id;

   // $visit=new Visit();
    //$visit->
    //$visit->$sanitized ['Entry_Datetime']=date('Y-m-d h:y:s');

    $sanitized ['Entry_Datetime']=Carbon::now();
//$alumno = Alumno::findOrFail($id);
//$alumno->nombre_apellido = $request->nombre_apellido;
//$alumno->edad = $request->edad;
//$alumno->telefono = $request->telefono;
//$alumno->direccion = $request->direccion;
//$alumno->save();

 //   $visit->save();
        // Store the Visit
        $visit = Visit::create($sanitized);
       // return $visit;
        if ($request->ajax()) {
            return ['redirect' => url('admin/visits'), 'visit' => $visit['id'] ];
        }


       // if ($request->ajax()) {
       //     return ['redirect' => url('admin/visits')], 'visita' => $visit['id']];//'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
       //  }

        return redirect('admin/visits');
    }


    public function storesc(StoreVisit $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['state_id']= 1;// $request->getStateId();
        $sanitized ['dependency_id']=  $request->getDependencyId();
              //  $status->Visit_id = $Visit->id;

   // $visit=new Visit();
    //$visit->
    //$visit->$sanitized ['Entry_Datetime']=date('Y-m-d h:y:s');

    $sanitized ['Entry_Datetime']=Carbon::now();
    //$alumno = Alumno::findOrFail($id);
    //$alumno->nombre_apellido = $request->nombre_apellido;
    //$alumno->edad = $request->edad;
    //$alumno->telefono = $request->telefono;
    //$alumno->direccion = $request->direccion;
    //$alumno->save();

 //   $visit->save();
        // Store the Visit
        $visit = Visit::create($sanitized);
       // return $visit;
        if ($request->ajax()) {
            return ['redirect' => url('admin/visits'), 'visit' => $visit['id'] ];
        }


       // if ($request->ajax()) {
       //     return ['redirect' => url('admin/visits')], 'visita' => $visit['id']];//'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
       //  }

        return redirect('admin/visits');
    }

    public function message()
{
    return [
        'inicio.required' => 'Tu hermana',
        // 'body.required' => 'A message is required',
    ];
}



    public function pdf(Request $request)
    {

        // $validated = $request->validate([
        //     'inicio' => 'required',
        //     'fin' => 'required',
        // ]);
        $rules = [
            'inicio' => 'required',
            'fin' => 'required',
        ];

        $messages = [
            'inicio.required' => 'Debe cargar la fecha de inicio.',
            'fin.required' => 'Debe cargar la fecha de fin.',
        ];

        $this->validate($request, $rules, $messages);



        $inicio=$request->inicio;
        $fin=$request->fin;



        $visits = Visit::whereBetween('Exit_Datetime', ["$inicio", "$fin"])->get();
        $contar = count($visits);
        $pdf = PDF::loadView('admin.visit.prueba', compact('visits' , 'contar'))->setPaper('a4', 'landscape');
        return $pdf->download('ReporteVisitas.pdf');
    }






    /**
     * Display the specified resource.
     *
     * @param Visit $visit
     * @throws AuthorizationException
     * @return void
     */
    public function show(Visit $visit)
    {
        $this->authorize('admin.visit.show', $visit);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Visit $visit
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Visit $visit)
    {
        $this->authorize('admin.visit.edit', $visit);


        return view('admin.visit.edit', [
            'visit' => $visit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateVisit $request
     * @param Visit $visit
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateVisit $request, Visit $visit)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
      //  $sanitized ['state_id']=  $request->getStateId();
        $sanitized ['dependency_id']=  $request->getStateId();
        $sanitized ['Exit_Datetime']=Carbon::now();
        // Update changed values Visit
        $visit->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/visits'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/visits');
    }

    public function actualizar(UpdateVisit $request, Visit $visit)
    {
        // Sanitize input
       // return date('d-m-Y h:y:s');
        $sanitized = $request->getSanitized();
        //$sanitized ['state_id']=  $request->getStateId();
       // $sanitized ['dependency_id']=  $request->getStateId();

        $sanitized ['Exit_Datetime']=Carbon::now();//date('d-m-Y h:y:s');
        $sanitized ['dependency']=1;
        $sanitized ['state_id']=2;

        // Update changed values Visit
        $visit->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/visits'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/visits');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyVisit $request
     * @param Visit $visit
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyVisit $request, Visit $visit)
    {
        $visit->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyVisit $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyVisit $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Visit::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    public function getIdentificaciones($id)
    {

        $client = new Client();

        $url = "http://10.1.79.7:8080/mbohape-core/sii/security";
        $res = $client->request('POST', $url, [
            'http_errors' => true,
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            'json' => [
                'username' => 'senavitatconsultas',
                'password' => 'S3n4vitat'
            ],
        ]);

        if ($res->getStatusCode() == 200) {
            $json = json_decode($res->getBody(), true);
            $token = $json['token'];

            $url = 'http://10.1.79.7:8080/frontend-identificaciones/api/persona/obtenerPersonaPorCedula/' . $id;
            $res = $client->request('GET', $url, [
                'http_errors' => true,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]);

            if ($res->getStatusCode() == 200) {
                $json = json_decode($res->getBody(), true);
                return response()->json([
                    'error' => false,
                    'message' => $json['obtenerPersonaPorNroCedulaResponse']['return']
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Error de Consulta'
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Error de Autenticación'
            ]);
        }
    }
}
