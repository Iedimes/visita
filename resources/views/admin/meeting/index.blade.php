@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.meeting.actions.index'))

@section('body')
<body onLoad="setTimeout('self.location.reload()', 30000)"></body>

    <meeting-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/meetings') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        {{--<i class="fa fa-align-justify"></i> {{ trans('admin.meeting.actions.index') --}}
                        <center><h2>ADMINISTRACION DE AUDIENCIAS</h2></center>
                       <br>

                        <h7> *PANEL GENERAL DE AUDIENCIAS </h7>

                        <a class="btn btn-primary  btn-sm pull-right m-b-0" href="{{ url('admin/meetings/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.meeting.actions.create') }}</a>

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
                                   <a  class="btn btn-dark rounded-pill">  <i class="fa" :class="submiting ? 'fa-spinner' : 'fa fa-sign-in'"></i></a>  Registrar Entrada
                               </div>
                               <div class="form-group col-sm-3">
                                  <a  class="btn btn-primary rounded-pill">  <i class="fa" :class="submiting ? 'fa-spinner' : 'fa fa-refresh'"></i></a> Reprogramar Audiencia
                               </div>
                               <div class="form-group col-sm-3">
                                  <a  class="btn btn-danger rounded-pill">  <i class="fa" :class="submiting ? 'fa-spinner' : 'fa fa-remove'"></i></a>  Cancelar Audiencia
                               </div>
                               <div class="form-group col-sm-3">
                                  <a  class="btn btn-success rounded-pill">  <i class="fa" :class="submiting ? 'fa-spinner' : 'fa fa-clock-o'" ></i></a>  Registrar Salida
                               </div>
                                </div>

                              <br>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>
                                        {{-- <th class="bulk-checkbox">
                                            <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                            <label class="form-check-label" for="enabled">
                                                #
                                            </label>
                                        </th>//--}}

                                        <th is='sortable' :column="'id'">{{ trans('admin.meeting.columns.id') }}</th>
                                        <th is='sortable' :column="'CI'">{{ trans('admin.meeting.columns.CI') }}</th>
                                        <th is='sortable' :column="'Names'">{{ trans('admin.meeting.columns.Names') }}</th>
                                        <th is='sortable' :column="'First_Names'">{{ trans('admin.meeting.columns.First_Names') }}</th>
                                        <th is='sortable' :column="'Reason'">{{ trans('admin.meeting.columns.Reason') }}</th>
                                        <th is='sortable' :column="'Observation'">{{ trans('admin.meeting.columns.Observation') }}</th>
                                        <th is='sortable' :column="'With_whom'">{{ trans('admin.meeting.columns.With_whom') }}</th>
                                        <th is='sortable' :column="'Meeting_Date'">{{ trans('admin.meeting.columns.Meeting_Date') }}</th>
                                        <th is='sortable' :column="'Entry_Datetime'">{{ trans('admin.meeting.columns.Entry_Datetime') }}</th>
                                        <th is='sortable' :column="'Exit_Datetime'">{{ trans('admin.meeting.columns.Exit_Datetime') }}</th>
                                        <th is='sortable' :column="'state_id'">{{ trans('admin.meeting.columns.state_id') }}</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                      {{--  <td class="bg-bulk-info d-table-cell text-center" colspan="13">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/meetings')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/meetings/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                        </td>--}}
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                       {{--  <td class="bulk-checkbox">
                                            <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id"  :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                            <label class="form-check-label" :for="'enabled' + item.id">
                                            </label>
                                        </td>--}}

                                    <td>@{{ item.id }}</td>
                                        <td>@{{ item.CI }}</td>
                                        <td>@{{ item.Names }}</td>
                                        <td>@{{ item.First_Names }}</td>
                                        <td>@{{ item.Reason }}</td>
                                        <td>@{{ item.Observation }}</td>
                                        <td>@{{ item.With_whom }}</td>
                                        <td>@{{ item.Meeting_Date | datetime }}</td>
                                        <td>@{{ item.Entry_Datetime | datetime }}</td>
                                        <td>@{{ item.Exit_Datetime | datetime }}</td>
                                        <td v-if="item.state.name ==  'Concretada' ">
                                            <p style="background-color: green; color:white;font-weight:bold;;border-radius:5px;">&nbsp;&nbsp;@{{  item.state.name}}&nbsp;&nbsp;</p>
                                        </td>
                                        <td v-else-if="item.state.name ==  'Agendada' ">
                                            <p style="background-color: orange; color:white;font-weight:bold;;border-radius:5px;">&nbsp;&nbsp;@{{  item.state.name}}&nbsp;&nbsp;</p>
                                        </td>
                                        <td v-else>
                                            <p style="background-color: red; color:white;font-weight:bold;;border-radius:5px;">&nbsp;&nbsp;@{{  item.state.name}}&nbsp;&nbsp;</p>
                                        </td>


                                       {{-- <td v-else-if="item.state.name ==  'Cancelada' ? 'badge bg-warning' ">@{{  item.state.name}}</td>

                                    {{--<td class="text-center"><span :class="item.state.name ==  'Agendada' ? 'badge bg-danger' : 'badge bg-success' ">@{{  item.state.name}}</span></td>--}}


                                        <td>
                                            <div class="row no-gutters">

                                                <div class="col-auto" v-if="item.state.name == 'Agendada'">


                                                    <div style="display: flex; justify-content: space-between;" v-if="item.Entry_Datetime != NULL">

                                                        <div><a :href="item.resource_url + '/salida'" class="btn btn-success rounded-pill">  <i class="fa" :class="submiting ? 'fa-spinner' : 'fa fa-clock-o'" title="Registrar Salida"></i></a></div>

                                                      {{-- <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/salida'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button">Salida</a>--}}
                                                      <div> <a :href="item.resource_url + '/reprogramar'" class="btn btn-primary rounded-pill">  <i class="fa" :class="submiting ? 'fa-spinner' : 'fa fa-refresh'" title="Reprogramar Audiencia"></i></a></div>

                                                        {{--  <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/reprogramar'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button">Reprogramar Audiencia</a>--}}
                                                        <div>  <a :href="item.resource_url + '/cancelar'" class="btn btn-danger rounded-pill">  <i class="fa" :class="submiting ? 'fa-spinner' : 'fa fa-remove'" title="Cancelar Audiencia"></i></a></div>

                                                          {{--<a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/cancelar'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button">Cancelar Audiencia</a>--}}


                                                        </div>

                                                        <div style="display: flex; justify-content: space-between;" v-else>
                                                        <div>   <a :href="item.resource_url + '/entrada'" class="btn btn-dark rounded-pill ">  <i class="fa" :class="submiting ? 'fa-spinner' : 'fa fa-sign-in'" title="Registrar Entrada"></i></a></div>

                                                            <div><a :href="item.resource_url + '/reprogramar'" class="btn btn-primary rounded-pill ">  <i class="fa" :class="submiting ? 'fa-spinner' : 'fa fa-refresh'" title="Reprogramar Audiencia"></i></a></div>
                                                                <div> <a :href="item.resource_url + '/cancelar'" class="btn btn-danger rounded-pill">  <i class="fa" :class="submiting ? 'fa-spinner' : 'fa fa-remove'" title="Cancelar Audiencia"></i></a></div>

                                                        {{--<a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/entrada'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button">Registrar Entrada</a>--}}
                                                         {{--<a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/reprogramar'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button">Reprogramar Audiencia</a>--}}
                                                        {{-- <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/cancelar'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button">Cancelar Audiencia</a>--}}
                                                    </div>





                                                </div>

                                                <div class="col-auto" v-else-if  ="item.state.name == 'Concretada'"> </div>



                                                <div class="col-auto" v-else-if="item.state.name == 'Cancelada'">

                                                </div>













                                                  <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                {{--    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>--}}
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
{{--
                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/meetings/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.meeting.actions.create') }}</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </meeting-listing>

@endsection
