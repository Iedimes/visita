@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.meeting.actions.edit', ['name' => $meeting->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <meeting-form
                :action="'{{ $meeting->resource_url }}'"
                :data="{{ $meeting->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.meeting.actions.edit', ['name' => $meeting->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.meeting.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </meeting-form>

        </div>
    
</div>

@endsection