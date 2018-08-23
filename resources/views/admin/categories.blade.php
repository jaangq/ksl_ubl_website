@extends('admin.layouts.app', ['pages' => $data['pages']])

@section('content')
<div class="flash-message"></div>
<div class="container-narrow categories-container" aria-label="cat">
        <div class="content-head p-4">
          <p class="h2">
            <span class="prime-col">Custom</span>
            <span class="second-col">Categories</span>
          </p>
        </div>
        <!-- 3 Cat -->

        <a class="d-hidden" href="#sub-categories-container"></a>
        <a class="d-hidden" href="#sub-sub-categories-container"></a>

        <div class="row m-0">
          <div class="col-md-12 catid" id="cat-1" val="1"></div>
        </div>
        <div class="row m-0">
          <div class="col-md-12 catid" id="cat-2" val="2"></div>
        </div>
        <div class="row m-0">
          <div class="col-md-12 catid" id="cat-3" val="3"></div>
        </div>

        <div class="row m-0">
          <div class="col-md-hid-cat col-md-7 pr-0">
            <div val="ini-container-sub-cat">
              <div id="sub-categories-container" class="container-narrow sub-categories-container" aria-label="sub-cat" label="sub-cat">
              </div>
            </div>
            <div val="ini-container-sub-sub-cat">
              <div id="sub-sub-categories-container" class="container-narrow sub-sub-categories-container" aria-label="sub-sub-cat" label="sub-sub-cat">
              </div>
            </div>
          </div>
          <div class="col-md-cat col-md-5 pl-0">
            <div val="ini-container-cat">
              <div class="card m-4" label="cat">
                  <div class="card-header text-center">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-8">
                        <strong>Categories</strong>
                      </div>
                      <div class="col-md-2 text-right">
                        <i class="far fa-window-minimize minmax-min-btn" val="cat"></i>
                        <i class="far fa-window-maximize minmax-max-btn" val="cat"></i>
                      </div>
                    </div>
                  </div>
                  <div class="card-body table-responsive-md categories-table card-body-table">
                    <!-- Table-to-load-the-data Part -->
                    <div class="cat-add cat-head-lbs">
                      <div>
                        {{ $data['categories']->links() }}
                      </div>
                      <div class="search-box-container position-relative">
                        <div class="form-group">
                          <input class="form-control search-box" type="text" name="search-box" placeholder="Search Here..." val="cat"><!--
                      --></div><!--
                      --><button class="btn btn-primary search-box-btn m-0" type="button" name="button"><i class="fas fa-search"></i></button>
                      </div>
                      <div class="my-4">
                        <button type="button" data-toggle="modal" data-target="#formModal" class="btn btn-primary btn-xs add-btn-modal mt-5">Add New Categories</button>
                        <br>
                      </div>
                    </div>
                    <div class="row cat-hid d-none">
                      <div class="col-md-4">
                        {{ $data['categories']->links() }}
                      </div>
                      <div class="col-md-4 text-center">
                        <button type="button" data-toggle="modal" data-target="#formModal" class="btn btn-primary btn-xs add-btn-modal">Add New Categories</button>
                      </div>
                      <div class="col-md-4 text-right">
                        <div class="row search-box-container position-relative">
                          <div class ="col-md-10 p-0">
                            <div class="form-group">
                              <input class="form-control search-box" type="text" name="search-box" placeholder="Search Here..." val="cat"><!--
                             --></div><!--
                          --></div><!--
                          --><div class="col-md-2 p-0"><!--
                          --><div class="form-group"><!--
                          --><button class="btn btn-primary search-box-btn m-0" type="button" name="button"><i class="fas fa-search"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <table class="table">
                        <thead class="categories-list-th" name="categories-list-th">
                            <tr>
                                <th class="th-id" scope="col">ID</th>
                                <th class="th-name" scope="col">Name</th>
                                <th class="th-desc" scope="col">Desc</th>
                                <th class="th-name_en cat-en cat-hid d-none" scope="col">Name EN</th>
                                <th class="th-desc_en cat-en cat-hid d-none" scope="col">Desc EN</th>
                                <th class="th-created_at cat-hid d-none" scope="col">Created At</th>
                                <th class="th-updated_at cat-hid d-none" scope="col">Updated At</th>
                                <th class="th-action" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="categories-list" class="categories-list" name="categories-list">
                            @foreach ($data['categories'] as $category)
                            <tr id="categories{{$category->id}}">
                                <td>{{$category->id}}</td>
                                <td class="td-name">{{$category->name}}</td>
                                <td class="td-desc">{!! KSLLessMore::showLessMore($category->desc) !!}</td>
                                <td class="td-name_en cat-en cat-hid d-none">{{$category->name_en}}</td>
                                <td class="td-desc_en cat-en cat-hid d-none">{!! KSLLessMore::showLessMore($category->desc_en) !!}</td>
                                <td class="td-created_at cat-hid d-none">{{$category->created_at}}</td>
                                <td class="td-updated_at cat-hid d-none">{{$category->updated_at}}</td>
                                <td class="td-action cat-hid d-none">
                                    <button class="btn btn-warning btn-xs btn-detail open-modal upd-data-btn" value="{{$category->id}}">Edit</button>
                                    <button class="btn btn-danger btn-xs btn-delete delete-task del-data-btn" value="{{$category->id}}">Delete</button>
                                    <button class="btn btn-warning btn-xs btn-check-view-sub-cat" value="{{$category->id}}" val="cat">Check Sub</button>
                                </td>
                                <td class="td-action cat-add">
                                    <button class="btn btn-warning btn-xs btn-detail open-modal upd-data-btn w-40px" value="{{$category->id}}"><i class="fas fa-pencil-alt"></i></button>
                                    <button class="btn btn-danger btn-xs btn-delete delete-task del-data-btn w-40px" value="{{$category->id}}"><i class="fas fa-times"></i></button>
                                    <button class="btn btn-warning btn-xs btn-check-view-sub-cat w-40px" value="{{$category->id}}"><i class="fas fa-check" val="cat"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End of Table-to-load-the-data Part -->
                    <!-- Modal -->
                    <div class="modal fade formModal" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="formModalLabel">Add New Categories</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form>
                              <div class="form-group">
                                  <label for="category-name" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" id="category-name">
                              </div>
                              <div class="form-group">
                                <label for="category-desc" class="col-form-label">Desc:</label>
                                <textarea class="form-control" id="category-desc" rows="4">
                                </textarea>
                              </div>
                              <div class="form-group">
                                <label for="category-name_en" class="col-form-label">Name EN:</label>
                                <input type="text" class="form-control" id="category-name_en">
                              </div>
                              <div class="form-group">
                                <label for="category-desc_en" class="col-form-label">Desc EN:</label>
                                <textarea class="form-control" id="category-desc_en" rows="4">
                                  </textarea>
                              </div>
                              <div class="form-group">
                                <input type="hidden" class="form-control" id="category-id" name="category-id">
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary add-data-btn btn-gg">Add Now</button>
                          </div>
                        </div>
                      </div>
                     </div>
                    <!-- End of Modal -->
                  </div>
              </div>
            </div>

          </div>
        </div>

         <!-- End 3 Cat -->
       </div>
       <meta name="page" content="categories">
       <script src="{{ asset('js/admin/categories.js') }}" defer></script>
@endsection
