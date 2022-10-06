@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.reportev.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">

        <reportev-form
            {{-- :action="'{{ url('admin/reportevs/imprimir') }}'" --}}
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" action="imprimir">

                <div class="card-header">
                    <center><h4>REPORTE DE VISITAS</h4></center>
                </div>

                <div class="card-body">
                    <div class="form-group row align-items-center">
                        <label for="inicio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reportev.columns.inicio') }}</label>
                        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                            <div class="input-group input-group--custom">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <datetime :config="datetimePickerConfig" class="flatpickr" id="inicio" name="inicio" class="@error('inicio') is-invalid @enderror"></datetime>
                                </div>
                                @error('inicio')
                                    <div class="input-group input-group--custom" style="color: red">
                                        {{ $message }}
                                    </div>
                                @enderror

                        </div>
                </div>




                <br>
                <div class="form-group row align-items-center" :class="{'has-danger': errors.has('fin'), 'has-success': fields.fin && fields.fin.valid }">
                        <label for="fin" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reportev.columns.fin') }}</label>
                        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                            <div class="input-group input-group--custom">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <datetime v-model="form.fin" :config="datetimePickerConfig" class="flatpickr" id="fin" name="fin" class="@error('fin') is-invalid @enderror"></datetime>
                            </div>
                            @error('fin')
                            <div class="input-group input-group--custom" style="color: red">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-danger" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-file-pdf-o'"></i>
                        GENERAR INFORME
                    </button>
                </div>

            </form>

        </reportev-form>


        </div>

        </div>


@endsection
