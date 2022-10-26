@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.reportea.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">

        <reportea-form
            :action="'{{ url('admin/reporteas') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.reportea.actions.create') }}
                </div>

                <div class="card-body">
                    <div class="form-group row align-items-center" :class="{'has-danger': errors.has('inicio'), 'has-success': fields.inicio && fields.inicio.valid }">
                        <label for="inicio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reportea.columns.inicio') }}</label>
                        <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
                            <div class="input-group input-group--custom">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <datetime v-model="form.inicio" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('inicio'), 'form-control-success': fields.inicio && fields.inicio.valid}" id="inicio" name="inicio" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
                            </div>
                            <div v-if="errors.has('inicio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('inicio') }}</div>
                        </div>
                    </div>

                    <div class="form-group row align-items-center" :class="{'has-danger': errors.has('fin'), 'has-success': fields.fin && fields.fin.valid }">
                        <label for="fin" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reportea.columns.fin') }}</label>
                        <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
                            <div class="input-group input-group--custom">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <datetime v-model="form.fin" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('fin'), 'form-control-success': fields.fin && fields.fin.valid}" id="fin" name="fin" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
                            </div>
                            <div v-if="errors.has('fin')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fin') }}</div>
                        </div>
                    </div>



                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </reportea-form>

        </div>

        </div>


@endsection
