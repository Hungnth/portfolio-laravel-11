@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.general-setting.index') }}" class="btn btn-icon"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1>SEO Setting</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update SEO Setting</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.seo-setting.update', 1) }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SEO
                                        Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="title" class="form-control" value="{{ $seo_setting->title }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SEO
                                        Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="description" id="" class="form-control"
                                                  style="height: 100px;">{{ $seo_setting->description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SEO
                                        Keyword</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="keywords" class="form-control" value="{{ $seo_setting->keywords }}">
                                        <code>Keywords will be comma seperated!</code>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
