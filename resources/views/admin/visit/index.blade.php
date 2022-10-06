@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.visit.actions.index'))

@section('body')
<body onLoad="setTimeout('self.location.reload()', 30000)"></body>

    <visit-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/visits') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                       {{-- <i class="fa fa-align-justify"></i> {{ trans('admin.visit.actions.index')--}}
                       <center><H2>ADMINISTRACION DE VISITAS</H2></center>
                       <br>
                       <h7>*PANEL PARA REGISTRAR LAS VISITAS A LA INSTITUCIÓN</h7>
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/visits/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.visit.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">

                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </form>

                            <br>

                            <div class ="row">

                                <div class="form-group col-sm-3">

                                    <a  class="btn btn-success rounded-pill">  <i class="fa" :class="submiting ? 'fa-spinner' : 'fa fa-external-link-square'"></i></a> Registrar Salida



                               </div>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>
                                        {{--<th class="bulk-checkbox">
                                            <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                            <label class="form-check-label" for="enabled">
                                                #
                                            </label>
                                        </th>--}}


                                        {{-- {{ Auth::user()->rol_app->rol_name['name']}} --}}

                                        <th is='sortable' :column="'id'">{{ trans('admin.visit.columns.id') }}</th>
                                        <th is='sortable' :column="'CI'">{{ trans('admin.visit.columns.CI') }}</th>
                                        <th is='sortable' :column="'Full_Name'">{{ trans('admin.visit.columns.Full_Name') }}</th>
                                        <th is='sortable' :column="'First_Surname'">{{ trans('admin.visit.columns.First_Surname') }}</th>
                                        <th is='sortable' :column="'Reason'">{{ trans('admin.visit.columns.Reason') }}</th>
                                        <th is='sortable' :column="'Observation'">{{ trans('admin.visit.columns.Observation') }}</th>
                                        <th is='sortable' :column="'Entry_Datetime'">{{ trans('admin.visit.columns.Entry_Datetime') }}</th>
                                        <th is='sortable' :column="'Exit_Datetime'">{{ trans('admin.visit.columns.Exit_Datetime') }}</th>
                                        <th is='sortable' :column="'state_id'">{{ trans('admin.visit.columns.state_id') }}</th>
                                        <th is='sortable' :column="'dependency_id'">{{ trans('admin.visit.columns.dependency_id') }}</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="16">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/visits')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/visits/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                     {{-- <td class="bulk-checkbox">
                                            <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id"  :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                            <label class="form-check-label" :for="'enabled' + item.id">
                                            </label>
                                        </td>--}}

                                    <td>@{{ item.id }}</td>
                                        <td>@{{ item.CI }}</td>
                                        <td>@{{ item.Full_Name }}</td>
                                        <td>@{{ item.First_Surname }}</td>
                                        <td>@{{ item.Reason }}</td>
                                        <td>@{{ item.Observation }}</td>
                                        <td>@{{ item.Entry_Datetime | datetime }}</td>
                                        <td>@{{ item.Exit_Datetime | datetime }}</td>
                                       {{--<td class="text-center"><span :class="item.state.name == 'En Espera' ? 'badge bg-danger' : 'badge bg-success' ">@{{  item.state.name}}</span></td>--}}
                                       <td v-if="item.state.name == 'Atendido' ">
                                        <p style="background-color: green; color:white;font-weight:bold;;border-radius:5px;">&nbsp;&nbsp;@{{  item.state.name}}&nbsp;&nbsp;</p>
                                    </td>
                                    <td v-else-if="item.state.name == 'En Espera' ">

                                        <p style="background-color: red;color: white;font-weight: bold;border-radius: 5px;font-size: 13px;">&nbsp;&nbsp;@{{  item.state.name}}&nbsp;&nbsp;</p>
                                    </td>

                                        <td>@{{ item.dependency.name }}</td>

                                        <td>
                                            <div class="row no-gutters">
                                              {{--  <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                </div>--}}
                                                <div class="col-auto" v-if="item.state.name != 'Atendido'">
                                                    <a :href="item.resource_url + '/actualizar'" class="btn btn-success rounded-pill">  <i class="fa" :class="submiting ? 'fa-spinner' : 'fa fa-external-link-square'" title="Registrar Salida"></i></a>

                                                   {{-- <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/actualizar'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button">Marcar Salida</a>--}}
                                                </div>

                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                   {{-- <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>--}}
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            {{-- <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/visits/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.visit.actions.create') }}</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </visit-listing>

@endsection
