@extends('admin.layouts.master')
@section('title', 'Edit PromoCode')
@section('breadcrumb', 'PromoCode')
@section('breadcrumb-info', 'Edit PromoCode')
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
                {!! Form::model($promocode, [
                    'method' => 'PATCH',
                    'url' => ['/admin/promo-code', $promocode->id],
                    'class' => 'form-horizontal'
                    ]) !!}
                    
                    @include ('admin.promo-code.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $('#lfm-img').filemanager('file');
    $(document).on('change','#auto_translate',function() {

    let val = $(this).prop('checked') ? '1' : '0';

    if (val==1){
        let description = tinymce.get("description_tc").getContent({format : 'text'});
        console.log(description);
        $.ajax({
            url: "{{ url('admin/promocode-auto-translate') }}",
            data: {'val': val, 'description': description},
            type: 'get',
            success: function (response) {
                console.log(response);
                response['description']!==''?tinymce.get("description_sc").setContent(response['description']):alert('Description field must be less than 5000 characters')

            }
        });
    }
    else {
        
        tinymce.get("description_sc").setContent('')
    }

    });
</script>
@endpush