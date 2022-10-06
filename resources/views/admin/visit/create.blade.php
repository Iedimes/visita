@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.visit.actions.create'))

@section('body')

    <div class="container-xl">
                <div class="card">
        <visit-form

        :action="'{{ url('admin/visits') }}'"

         {{-- :action="'{{ url('admin/visits')'"--}}
          {{-- :action="'{{ url('test') }}'"--}}
            :state="{{$state->toJson()}}"
            :dependency="{{$dependency->toJson()}}"


            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                   {{-- <i class="fa fa-plus"></i> {{ trans('admin.visit.actions.create')--}}
                   <center><H4>NUEVA VISITA</H4></center>
                   <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0 rounded-pill" href="{{ url('admin/visits') }}" role="button"><i class="fa fa-undo"></i>&nbsp; VOLVER</a><br>


                </div>

                <div class="card-body">
                    @include('admin.visit.components.form-elements')
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary rounded-pill" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                    <a href='createsc' title="acceda aqui cuando no hay internet"> <i class="fa fa-wifi pull-right" style="font-size:25px;color:red"></i></a>

                </div>


            </form>

        </visit-form>

        </div>

        </div>


@endsection
