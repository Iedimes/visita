<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Reportev\BulkDestroyReportev;
use App\Http\Requests\Admin\Reportev\DestroyReportev;
use App\Http\Requests\Admin\Reportev\IndexReportev;
use App\Http\Requests\Admin\Reportev\StoreReportev;
use App\Http\Requests\Admin\Reportev\Request;
use App\Http\Requests\Admin\Reportev\UpdateReportev;
use App\Models\Reportev;
use App\Models\Visit;
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
use PDF;

class ReportevController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexReportev $request
     * @return array|Factory|View
     */
    public function index(IndexReportev $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Reportev::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['inicio', 'fin'],

            // set columns to searchIn
            ['']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.reportev.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.reportev.create');

        return view('admin.reportev.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReportev $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $inicio =  $request->inicio;
        $fin =  $request->fin;

        //return [$inicio, $fin];



        // Sanitize input
        // $sanitized = $request->getSanitized();
        // return $visits = Visit::all();
        //return $visits = Visit::whereBetween('Exit_Datetime', ['2022-08-05 00:00:00', '2022-08-05 23:59:59'])->get();
        $visits = Visit::whereBetween('Exit_Datetime', ["$inicio", "$fin"])->get();

        // $pdf = PDF::loadView('admin.reportev.prueba');

        //return 'algo';
        $pdf = PDF::loadView('admin.reportev.prueba', compact('visits'))->setPaper('a4', 'landscape');
        return $pdf->download('ReporteVisitas.pdf');

        // Store the Reportev
        // $reportev = Reportev::create($sanitized);

        // if ($request->ajax()) {
        //     return ['redirect' => url('admin/reportevs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        // }

        // return redirect('admin/reportevs');
    }

    public function pdf(StoreReportev $request)
    {
        return ALGO;
        return $inicio =  $request->inicio;
        $fin =  $request->fin;

        //return [$inicio, $fin];



        // Sanitize input
        // $sanitized = $request->getSanitized();
        // return $visits = Visit::all();
        //return $visits = Visit::whereBetween('Exit_Datetime', ['2022-08-05 00:00:00', '2022-08-05 23:59:59'])->get();
        $visits = Visit::whereBetween('Exit_Datetime', ["$inicio", "$fin"])->get();

        // $pdf = PDF::loadView('admin.reportev.prueba');

        //return 'algo';
        $pdf = PDF::loadView('admin.reportev.prueba', compact('visits'))->setPaper('a4', 'landscape');
        return $pdf->download('ReporteVisitas.pdf');

        // Store the Reportev
        // $reportev = Reportev::create($sanitized);

        // if ($request->ajax()) {
        //     return ['redirect' => url('admin/reportevs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        // }

        // return redirect('admin/reportevs');
    }





    public function prueba(Request $request)
    {
        return $request;
        //return $Desde;
        //return $visits = Visit::whereBetween('Entry_Datetime', ['2022-08-05','2022-08-05'])->get();
        //return $visits = Visit::whereBetween('Exit_Datetime', ['2022-08-08 00:00:00', '2022-08-08 23:59:59'])->get();
        //$visits = Visit::all();
        $pdf = PDF::loadView('admin.visit.prueba', compact('visits'))->setPaper('a4', 'landscape');
        return $pdf->download('ReporteVisitas.pdf');
        //return 'pdf';
        // retreive all records from db
        /*$data = Resume::all();

        // share data to view
        view()->share('employee', $data);
        $pdf = PDF::loadView('pdf_view', $data);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');*/
    }





    /**
     * Display the specified resource.
     *
     * @param Reportev $reportev
     * @throws AuthorizationException
     * @return void
     */
    public function show(Reportev $reportev)
    {
        $this->authorize('admin.reportev.show', $reportev);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Reportev $reportev
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Reportev $reportev)
    {
        $this->authorize('admin.reportev.edit', $reportev);


        return view('admin.reportev.edit', [
            'reportev' => $reportev,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReportev $request
     * @param Reportev $reportev
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateReportev $request, Reportev $reportev)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Reportev
        $reportev->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/reportevs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/reportevs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyReportev $request
     * @param Reportev $reportev
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyReportev $request, Reportev $reportev)
    {
        $reportev->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyReportev $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyReportev $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Reportev::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
