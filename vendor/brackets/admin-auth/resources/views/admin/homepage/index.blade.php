@extends('brackets/admin-ui::admin.layout.default')

@section('body')

    <div class="welcome-quote">
<h2> "Registro de Visitas y Audiencias" </h2>
	<script type="text/javascript">
    function Redirect()
    {
        window.location="http://192.168.98.79/admin/visits";
    }

    setTimeout('Redirect()', 3000);
</script>

	    </blockquote>

    </div>

@endsection
