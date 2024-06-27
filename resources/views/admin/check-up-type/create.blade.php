@extends('admin.layouts.master')
@section('title', 'Create CheckUpType')
@section('breadcrumb', 'CheckUpType')
@section('breadcrumb-info', 'Create CheckUpType')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                <form method="POST" action="{{ url('/admin/check-up-type') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.check-up-type.form', ['formMode' => 'create'])

                </form>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('body').on('click', '#select-all', function () {

        if ($(this).hasClass('allChecked')) {
            $('.check').prop('checked', false);
        } else {
            $('.check').prop('checked', true);
        }
        $(this).toggleClass('allChecked');
        })
    </script>

<script>

    $(document).on('change','#auto_translate',function() {

        let val = $(this).prop('checked') ? '1' : '0';
        let simplified_name=$('#name_sc');
        if (val==1){
            let name = $('#name_tc').val();
            $.ajax({
                url: "{{ url('/admin/checkup-type-translate') }}",
                data: {'val': val, 'name': name},
                type: 'get',
                success: function (response) {
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
