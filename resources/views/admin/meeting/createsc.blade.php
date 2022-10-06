@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.meeting.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">

        <meeting-form
            :action="'{{ url('admin/meetings') }}'"

            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                   {{-- <i class="fa fa-plus"></i> {{ trans('admin.meeting.actions.create') --}}
                   <center><H4>NUEVA AUDIENCIA</H4></center>
                   <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0 rounded-pill" href="{{ url('admin/meetings') }}" role="button"><i class="fa fa-undo"></i>&nbsp; VOLVER</a><br>
                </div>

                <div class="card-body">
                    @include('admin.meeting.components.form-elementsc')
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
