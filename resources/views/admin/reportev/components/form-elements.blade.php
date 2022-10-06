<div class="form-group row align-items-center" :class="{'has-danger': errors.has('inicio'), 'has-success': fields.inicio && fields.inicio.valid }">
    <label for="inicio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reportev.columns.inicio') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.inicio" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('inicio'), 'form-control-success': fields.inicio && fields.inicio.valid}" id="inicio" name="inicio" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('inicio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('inicio') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fin'), 'has-success': fields.fin && fields.fin.valid }">
    <label for="fin" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reportev.columns.fin') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.fin" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('fin'), 'form-control-success': fields.fin && fields.fin.valid}" id="fin" name="fin" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('fin')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fin') }}</div>
    </div>
</div>


