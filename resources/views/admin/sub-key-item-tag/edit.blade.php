@extends('admin.layouts.master')
@section('title', 'Edit Sub Key Item Tag')
@section('breadcrumb', 'Sub Key Item Tag')
@section('breadcrumb-info', 'Edit Sub Key Item Tag')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                {!! Form::model($sub_key_item_tag, [
                    'method' => 'PATCH',
                    'url' => ['/admin/sub-key-item-tag', $sub_key_item_tag->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                @include ('admin.sub-key-item-tag.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).on('change','#auto_translate',function() {

            let val = $(this).prop('checked') ? '1' : '0';
            let simplified_name=$('#name_sc');
            if (val==1){
                let name = $('#name_tc').val();
                console.log(name)
                $.ajax({
                    url: "{{ url('/admin/sub-key-item-tag-auto-translate') }}",
                    data: {'val': val, 'name': name},
                    type: 'get',
                    success: function (response) {
                        console.log(response)
                        response['name']!==''?simplified_name.val(response['name']):alert('Name field must be less than 5000 characters')
                    }
                });
            }
            else {
                simplified_name.val('')
            }

        });


    </script>
@endpush

