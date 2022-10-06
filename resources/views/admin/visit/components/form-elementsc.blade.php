


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('CI'), 'has-success': fields.CI && fields.CI.valid }">
    <label for="CI" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.visit.columns.CI') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text"   v-model="form.CI"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('CI'), 'form-control-success': fields.CI && fields.CI.valid}" id="CI" name="CI" placeholder="{{ trans('admin.visit.columns.CI') }}">
        <div v-if="errors.has('CI')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('CI') }}</div>
    </div>
</div>



<div class="form-group row align-items-center" :class="{'has-danger': errors.has('Full_Name'), 'has-success': fields.Full_Name && fields.Full_Name.valid }">
    <label for="Full_Name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.visit.columns.Full_Name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text"  v-model="form.Full_Name"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('Full_Name'), 'form-control-success': fields.Full_Name && fields.Full_Name.valid}" id="Full_Name" name="Full_Name" placeholder="{{ trans('admin.visit.columns.Full_Name') }}">
        <div v-if="errors.has('Full_Name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('Full_Name') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('First_Surname'), 'has-success': fields.First_Surname && fields.First_Surname.valid }">
    <label for="First_Surname" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.visit.columns.First_Surname') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text"  v-model="form.First_Surname"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('First_Surname'), 'form-control-success': fields.First_Surname && fields.First_Surname.valid}" id="First_Surname" name="First_Surname" placeholder="{{ trans('admin.visit.columns.First_Surname') }}">
        <div v-if="errors.has('First_Surname')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('First_Surname') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('Reason'), 'has-success': fields.Reason && fields.Reason.valid }">
    <label for="Reason" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.visit.columns.Reason') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <textarea v-model="form.Reason"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('Reason'), 'form-control-success': fields.Reason && fields.Reason.valid}" id="Reason" name="Reason" placeholder="{{ trans('admin.visit.columns.Reason') }}">  </textarea>
        <div v-if="errors.has('Reason')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('Reason') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('Observation'), 'has-success': fields.Observation && fields.Observation.valid }">
    <label for="Observation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.visit.columns.Observation') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <textarea v-model="form.Observation"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('Observation'), 'form-control-success': fields.Observation && fields.Observation.valid}" id="Observation" name="Observation" placeholder="{{ trans('admin.visit.columns.Observation') }}"> </textarea>
        <div v-if="errors.has('Observation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('Observation') }}</div>
    </div>
</div>




<div class="form-group row align-items-center" :class="{'has-danger': errors.has('dependency_id'), 'has-success': fields.dependency_id && fields.dependency_id.valid }">
    <label for="dependency_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.visit.columns.dependency_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        {{-- <input type="text" v-model="form.category_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('category_id'), 'form-control-success': fields.category_id && fields.category_id.valid}" id="category_id" name="category_id" placeholder="{{ trans('admin.detail-help.columns.category_id') }}"> --}}
        <multiselect
            v-model="form.dependency"
            :options="dependency"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.visit.columns.dependency_id') }}">
        </multiselect>
        <div v-if="errors.has('dependency_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('dependency_id') }}</div>
    </div>
</div>

{{--
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('state_id'), 'has-success': fields.state_id && fields.state_id.valid }">
    <label for="state_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.visit.columns.state_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <multiselect
            v-model="form.state"
            :options="state"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.visit.columns.state_id') }}">
        </multiselect>
        <div v-if="errors.has('state_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('state_id') }}</div>
    </div>
</div>
--}}



