@extends('admin.layouts.master')
@section('title', 'Edit Dashboard slider')
@section('breadcrumb', 'Dashboard slider')
@section('breadcrumb-info', 'Edit Dashboard slider')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                {!! Form::model($slider, [
                    'method' => 'PATCH',
                    'url' => ['/admin/dashboard-sliders', $slider->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.dashboard-slider.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>

    $(document).on('change','#auto_translate',function() {
        let val = $(this).prop('checked') ? '1' : '0';
        let simplified_name = $('#name_sc');

        if (val==1){
            let name = $('#name_tc').val();
            let content = tinymce.get("description_tc").getContent({format : 'text'});

            $.ajax({
                url: "{{ url('/admin/dashboard-sliders-translate') }}",
                data: {'val': val, 'name': name,'cont':content},
                type: 'get',
                success: function (response) {
                    console.log(response);
                    response['name']!==''?simplified_name.val(response['name']):alert('Name field must be less than 5000 characters')
                    response['content']!==''?tinymce.get("description_sc").setContent(response['content']):alert('Content field must be less than 5000 characters')

                }
            });
        }
        else {
            simplified_name.val('')
            tinymce.get("description_sc").setContent('')

        }

    });

</script>
@endpush
