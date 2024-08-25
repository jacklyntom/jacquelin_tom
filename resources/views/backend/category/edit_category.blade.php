@include('backend.templates.header')

<!-- InternalFileupload css-->
<link href="{{ asset('backend/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
<style>
    .form input:checked+label:after,
    form input:checked+label:after {
        content: none;
    }


</style>


<!-- Main Content-->
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">

            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5"> Categories</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('category.all') }}"> Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                    </ol>
                </div>

            </div>
            <!-- End Page Header -->

            <!-- Row -->
            <div class="row row-sm">

                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">

                            <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0"> Category</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="category_name" id="category_name"
                                                placeholder="Enter category name" type="text"
                                                value="{{ $category->category_name }}"required>
                                        </div>
                                    </div>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0"> Image</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input type="file" name="image" id="image" class="dropify"
                                                data-default-file="{{ asset('backend/image/category/' . $category->image) }}"
                                                data-height="200"
                                                accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Status</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="is_active" id="is_active"
                                                required>
                                                <option value="1"
                                                    @if ($category->is_active == '1') selected='selected' @endif>Active
                                                </option>
                                                <option value="0"
                                                    @if ($category->is_active == '0') selected='selected' @endif>
                                                    InActive</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Filters</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">

                                            @if ($filters != null)

                                                @foreach ($filters as $value)

                                                <div style=" border: 1px solid #e8e8f7;padding-left:10px;padding-bottom:10px;margin-bottom:10px; z-index: -1;">

                                                    <input type="checkbox" class="ckbox mt-3" name="filter_id[]"
                                                        value="{{ $value->id }}"

                                                        @foreach ($category_filter as $item)  @if ($value->id == $item->filter_id) ? checked  @endif @endforeach>

                                                    <label style="padding-right:40px;">
                                                        <b style="text-transform: capitalize;">{{ $value->filter_title }}</b></label><br>
                                                    @php
                                                        $filteroptions = App\Models\FilterOption::where('is_deleted', '<>', 1)
                                                            ->where('filter_id', $value->id)
                                                            ->get();
                                                    @endphp

                                                    @if (!$filteroptions->isEmpty())
                                                        @foreach ($filteroptions as $item)
                                                            <ul>
                                                                <li style="text-transform: capitalize;list-style-type: square;">{{ $item->option_name }}</li>

                                                            </ul>
                                                        @endforeach
                                                    @endif
                                                </span>

                                            </div>
                                                @endforeach

                                            @endif
                                        </div>
                                    </div> --}}

                                    <div class="form-group row justify-content-end mb-0">
                                        <div class="col-md-8 pl-md-2">
                                            <button type="submit" class="btn ripple btn-primary pd-x-30 mg-r-5"
                                                style="background-color:#25233c;">Submit</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

        </div>
    </div>
</div>
<!-- End Main Content-->

<script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Internal Fileuploads js-->
<script src="{{ asset('backend/assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/fileuploads/js/file-upload.js') }}"></script>

@include('backend.templates.footer')
