<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Reportea\BulkDestroyReportea;
use App\Http\Requests\Admin\Reportea\DestroyReportea;
use App\Http\Requests\Admin\Reportea\IndexReportea;
use App\Http\Requests\Admin\Reportea\StoreReportea;
use App\Http\Requests\Admin\Reportea\UpdateReportea;
use App\Models\Reportea;
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

class ReporteaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexReportea $request
     * @return array|Factory|View
     */
    public function index(IndexReportea $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Reportea::class)->processRequestAndGet(
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

        return view('admin.reportea.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.reportea.create');

        return view('admin.reportea.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReportea $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreReportea $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Reportea
        $reportea = Reportea::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/reporteas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/reporteas');
    }

    /**
     * Display the specified resource.
     *
     * @param Reportea $reportea
     * @throws AuthorizationException
     * @return void
     */
    public function show(Reportea $reportea)
    {
        $this->authorize('admin.reportea.show', $reportea);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Reportea $reportea
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Reportea $reportea)
    {
        $this->authorize('admin.reportea.edit', $reportea);


        return view('admin.reportea.edit', [
            'reportea' => $reportea,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReportea $request
     * @param Reportea $reportea
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateReportea $request, Reportea $reportea)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Reportea
        $reportea->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/reporteas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/reporteas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyReportea $request
     * @param Reportea $reportea
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyReportea $request, Reportea $reportea)
    {
        $reportea->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyReportea $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyReportea $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Reportea::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
