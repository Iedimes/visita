<div class="form-group row align-items-center" :class="{'has-danger': errors.has('CI'), 'has-success': fields.CI && fields.CI.valid }">
    <label for="CI" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.meeting.columns.CI') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text"  @change="findData" v-model="form.CI"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('CI'), 'form-control-success': fields.CI && fields.CI.valid}" id="CI" name="CI" placeholder="{{ trans('admin.meeting.columns.CI') }}">
        <div v-if="errors.has('CI')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('CI') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('Names'), 'has-success': fields.Names && fields.Names.valid }">
    <label for="Names" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.meeting.columns.Names') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" readonly v-model="form.Names"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('Names'), 'form-control-success': fields.Names && fields.Names.valid}" id="Names" name="Names" placeholder="{{ trans('admin.meeting.columns.Names') }}">
        <div v-if="errors.has('Names')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('Names') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('First_Names'), 'has-success': fields.First_Names && fields.First_Names.valid }">
    <label for="First_Names" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.meeting.columns.First_Names') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" readonly v-model="form.First_Names"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('First_Names'), 'form-control-success': fields.First_Names && fields.First_Names.valid}" id="First_Names" name="First_Names" placeholder="{{ trans('admin.meeting.columns.First_Names') }}">
        <div v-if="errors.has('First_Names')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('First_Names') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('Reason'), 'has-success': fields.Reason && fields.Reason.valid }">
    <label for="Reason" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.meeting.columns.Reason') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <textarea  v-model="form.Reason"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('Reason'), 'form-control-success': fields.Reason && fields.Reason.valid}" id="Reason" name="Reason" placeholder="{{ trans('admin.meeting.columns.Reason') }}"></textarea>
        <div v-if="errors.has('Reason')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('Reason') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('Observation'), 'has-success': fields.Observation && fields.Observation.valid }">
    <label for="Observation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.meeting.columns.Observation') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <textarea v-model="form.Observation"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('Observation'), 'form-control-success': fields.Observation && fields.Observation.valid}" id="Observation" name="Observation" placeholder="{{ trans('admin.meeting.columns.Observation') }}"></textarea>
        <div v-if="errors.has('Observation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('Observation') }}</div>
    </div>
</div>

{{-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('With_whom'), 'has-success': fields.With_whom && fields.With_whom.valid }">
    <label for="With_whom" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.meeting.columns.With_whom') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.With_whom"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('With_whom'), 'form-control-success': fields.With_whom && fields.With_whom.valid}" id="With_whom" name="With_whom" placeholder="{{ trans('admin.meeting.columns.With_whom') }}">
        <div v-if="errors.has('With_whom')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('With_whom') }}</div>
    </div>
</div> --}}

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('Meeting_Date'), 'has-success': fields.Meeting_Date && fields.Meeting_Date.valid }">
    <label for="Meeting_Date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.meeting.columns.Meeting_Date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.Meeting_Date" :config="datetimePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('Meeting_Date'), 'form-control-success': fields.Meeting_Date && fields.Meeting_Date.valid}" id="Meeting_Date" name="Meeting_Date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('Meeting_Date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('Meeting_Date') }}</div>
    </div>
</div>



