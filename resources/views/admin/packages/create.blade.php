@extends('admin.layouts.master')
@section('title', 'Create Package')
@section('breadcrumb', 'Package')
@section('breadcrumb-info', 'Create Package')
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

                <form method="POST" action="{{ url('/admin/packages') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.packages.form', ['formMode' => 'create'])

                </form>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script>
        $('#cat-image').filemanager('file');
        $(document).on('change','#auto_translate',function() {

            let val = $(this).prop('checked') ? '1' : '0';
            let simplified_name=$('#name_sc');
            if (val==1){
                let name = $('#name_tc').val();
                let content = tinymce.get("content_tc").getContent({format : 'text'});
                $.ajax({
                    url: "{{ url('/admin/package-translate') }}",
                    data: {'val': val, 'name': name,'cont':content},
                    type: 'get',
                    success: function (response) {
                        response['name']!==''?simplified_name.val(response['name']):''
                        response['content']!==''?tinymce.get("content_sc").setContent(response['content']):''
                    }
                });
            }
            else {
                simplified_name.val('')
                tinymce.get("content_sc").setContent('')

            }

        });


        new Vue({
            el: '#plan_details',
            data: {
                header: {
                    header_en: "",
                    header_tc: "",
                    header_sc: "",
                },
                
                title: {
                    title_en: "",
                    title_tc: "",
                    title_sc: "",
                    column: {
                        col_name_en: "",
                        col_name_tc: "",
                        col_name_sc: "",
                    },
                    tableColumns: []
                },
                tableTitles: [],
                tableHeaders: []
            },
            created() {
                this.addHeader();
                this.addTitle();
                // this.addColumn();
            },
            methods: {

                addHeader: function() {
                    this.tableHeaders.push(JSON.parse(JSON.stringify(this.header)));
                },

                addTitle: function() {
                    this.tableTitles.push(JSON.parse(JSON.stringify(this.title)));
                },

                addColumn: function(index) {
                    this.tableTitles[index].tableColumns.push(JSON.parse(JSON.stringify(this.title.column)));
                },

                removeHeader: function(index) {
                    this.tableHeaders.splice(index, 1)
                },

                removeTitle: function(index) {
                    this.tableTitles.splice(index, 1)
                },

                removeColumn: function(cindex,index) {
                    this.tableTitles[index].tableColumns.splice(cindex, 1)
                },

                inputName: function(index, property) {
                    return "tableHeaders[" + index + "][" + property + "]";

                },

                tinputName: function(index, property) {
                    return "tableTitles[" + index + "][" + property + "]";

                },
                
                cinputName: function(tindex,cindex, property) {
                    console.log(tindex,cindex);
                    return "tableTitles["+tindex+"][tableColumns]["+cindex+"]["+property+"]";

                    // return "tableColumns[" + index + "][" + property + "]";

                },
            }
        });

    </script>
@endpush
