<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Meeting\BulkDestroyMeeting;
use App\Http\Requests\Admin\Meeting\DestroyMeeting;
use App\Http\Requests\Admin\Meeting\IndexMeeting;
use App\Http\Requests\Admin\Meeting\StoreMeeting;
use App\Http\Requests\Admin\Meeting\UpdateMeeting;
use App\Models\Meeting;
use App\Models\State;
use GuzzleHttp\Client;
use Carbon\Carbon;

use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\RoleAdminUser;

class MeetingsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMeeting $request
     * @return array|Factory|View
     */
    public function index(Meeting $meeting, IndexMeeting $request)
    {
        // $login=auth()->id();
        // $roles=RoleAdminUser::where('admin_users_id', $login)
        //                             ->first();
        // create and AdminListing instance for a specific model and
        $id = $meeting->id;


        $data = AdminListing::create(Meeting::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'CI', 'Names', 'First_Names', 'Reason', 'Observation', 'With_whom', 'Meeting_Date', 'Entry_Datetime', 'Exit_Datetime', 'state_id'],

            // set columns to searchIn
            ['id', 'CI','Names', 'First_Names', 'Reason', 'Observation', 'With_whom'],

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

        return view('admin.meeting.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.meeting.create');

        return view('admin.meeting.create');
    }

    public function createsc()
    {
        //$this->authorize('admin.meeting.create');

        return view('admin.meeting.createsc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMeeting $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMeeting $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Meeting
        $sanitized ['state_id']=3;

       // $meeting = Meeting::create($sanitized);

        $audiencia = Meeting::create($sanitized);
        // return $visit;
         if ($request->ajax()) {
             return ['redirect' => url('admin/meetings'), 'audiencia' => $audiencia['CI'] ];
         }
       // if ($request->ajax()) {
       //     return ['redirect' => url('admin/meetings'),  'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
       // }
        return redirect('admin/meetings');
    }

    public function storesc(StoreMeeting $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Meeting
        $sanitized ['state_id']=3;

       // $meeting = Meeting::create($sanitized);

        $audiencia = Meeting::create($sanitized);
        // return $visit;
         if ($request->ajax()) {
             return ['redirect' => url('admin/meetings'), 'audiencia' => $audiencia['CI'] ];
         }
       // if ($request->ajax()) {
       //     return ['redirect' => url('admin/meetings'),  'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
       // }
        return redirect('admin/meetings');
    }

    /**
     * Display the specified resource.
     *
     * @param Meeting $meeting
     * @throws AuthorizationException
     * @return void
     */
    public function show(Meeting $meeting)
    {
        $this->authorize('admin.meeting.show', $meeting);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Meeting $meeting
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Meeting $meeting)
    {
        $this->authorize('admin.meeting.edit', $meeting);

        return view('admin.meeting.edit', [
            'meeting' => $meeting,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMeeting $request
     * @param Meeting $meeting
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMeeting $request, Meeting $meeting)
    {
         //return $request;
        $sanitized = $request->getSanitized();
        $sanitized ['Entry_Datetime']=NULL;
       // Update changed values Meeting
      //a return $sanitized;
       $meeting->update($sanitized);

        //$audiencia = Meeting::create($sanitized);
     //   $audiencia = Meeting::create($sanitized);
         // $audiencia = data.audiencia;
      //  $audiencia = CI();
        // return $visit;
         if ($request->ajax()) {
             return ['redirect' => url('admin/meetings'),'audiencia' =>  $request['CI'] ];
         }
        return redirect('admin/meetings');
    }

    public function reprogramar(Meeting $meeting)
    {
        $this->authorize('admin.meeting.edit', $meeting);

        $sanitized ['Entry_Datetime']=NULL;

        return view('admin.meeting.edit', [
            'meeting' => $meeting,
        ]);
    }

    public function entrada(UpdateMeeting $request, Meeting $meeting)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        if (empty($request->Entry_Datetime)){
            $sanitized ['Entry_Datetime']=Carbon::now();
            }
            else {

            }

        // Update changed values Meeting
        $meeting->update($sanitized);
        if ($request->ajax()) {
            return [
                'redirect' => url('admin/meetings'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/meetings');
    }

    public function cancelar(UpdateMeeting $request, Meeting $meeting)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['Entry_Datetime']=NULL;
        $sanitized ['state_id']=5;

        // Update changed values Meeting
        $meeting->update($sanitized);


        if ($request->ajax()) {
            return [
                'redirect' => url('admin/meetings'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/meetings');
    }
    public function salida(UpdateMeeting $request, Meeting $meeting)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['Exit_Datetime']=Carbon::now();
        $sanitized ['state_id']=4;

        // Update changed values Meeting
        $meeting->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/meetings'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/meetings');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMeeting $request
     * @param Meeting $meeting
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMeeting $request, Meeting $meeting)
    {
        $meeting->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMeeting $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMeeting $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Meeting::whereIn('id', $bulkChunk)->delete();

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
