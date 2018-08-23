<div class="card m-4">
  <div class="card-header text-center">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <strong>Sub Categories</strong>
      </div>
      <div class="col-md-2 text-right">
        <i class="far fa-window-minimize minmax-min-btn" val="sub-cat"></i>
        <i class="far fa-window-maximize minmax-max-btn" val="sub-cat"></i>
      </div>
    </div>
  </div>
    <div class="card-body table-responsive-md sub-categories-table card-body-table overflow-x-scroll-none">
      <!-- Table-to-load-the-data Part -->
      <div class="sub-cat-add sub-cat-head-lbs">
        <div>
          {{ $data['sub_categories']->links() }}
        </div>
        <div class="search-box-container position-relative">
          <div class="form-group">
            <input class="form-control search-box" type="text" name="search-box" placeholder="Search Here..." val="sub-cat" idval="{{ $data['sub_categories'][0]->cat_id or '' }}"><!--
        --></div><!--
        --><button class="btn btn-primary search-box-btn m-0" type="button" name="button"><i class="fas fa-search"></i></button>
        </div>
        <div class="my-4">
          <button type="button" data-toggle="modal" data-target="#formModalSubCat" class="btn btn-primary btn-xs add-btn-modal mt-5" val="sub-cat">Add New Sub Categories</button>
          <span class="d-inline-block v-bottom"><strong> For Category {{ $data['cat_name']->name OR '' }}</strong></span>
          <br>
        </div>
      </div>
      <div class="row sub-cat-hid d-none">
        <div class="col-md-4">
          {{ $data['sub_categories']->links() }}
        </div>
        <div class="col-md-4 text-center">
          <button type="button" data-toggle="modal" data-target="#formModalSubCat" class="btn btn-primary btn-xs add-btn-modal" val="sub-cat">Add New Sub Categories</button>
        </div>
        <div class="col-md-4 text-right pr-5">
          <div class="row search-box-container position-relative">
            <div class="col-md-10 p-0">
              <div class="form-group">
                <input class="form-control search-box" type="text" name="search-box" placeholder="Search Here..." val="sub-cat" idval="{{ $data['sub_categories'][0]->cat_id or '' }}"><!--
               --></div><!--
            --></div><!--
            --><div class="col-md-2 p-0"><!--
            --><div class="form-group"><!--
            --><button class="btn btn-primary search-box-btn m-0" type="button" name="button"><i class="fas fa-search"></i></button>
            <span class="d-inline-block v-bottom"><strong> For Category {{ $data['cat_name']->name OR '' }}</strong></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <table class="table">
          <thead>
              <tr>
                <th class="th-id" scope="col">ID</th>
                <th class="th-name" scope="col">Name</th>
                <th class="th-desc" scope="col">Desc</th>
                <th class="th-name_en sub-cat-en sub-cat-hid d-none" scope="col">Name EN</th>
                <th class="th-desc_en sub-cat-en sub-cat-hid d-none" scope="col">Desc EN</th>
                <th class="th-created_at sub-cat-hid d-none" scope="col">Created At</th>
                <th class="th-updated_at sub-cat-hid d-none" scope="col">Updated At</th>
                <th class="th-action" scope="col">Action</th>
              </tr>
          </thead>
          <tbody id="sub-categories-list" name="sub-categories-list">
              @foreach ($data['sub_categories'] as $sub_category)
              <tr id="sub-categories{{$sub_category->id}}">
                  <td>{{$sub_category->id}}</td>
                  <td class="td-name">{{$sub_category->name}}</td>
                  <td class="td-desc">{!!KSLLessMore::showLessMore($sub_category->desc, 180)!!}</td>
                  <td class="td-name_en sub-cat-hid d-none">{{$sub_category->name_en}}</td>
                  <td class="td-desc_en sub-cat-hid d-none">{!!KSLLessMore::showLessMore($sub_category->desc_en, 180)!!}</td>
                  <td class="sub-cat-hid d-none">{{$sub_category->created_at}}</td>
                  <td class="sub-cat-hid d-none">{{$sub_category->updated_at}}</td>
                  <td class="td-action sub-cat-hid d-none">
                      <button class="btn btn-warning btn-xs btn-detail open-modal upd-data-btn" value="{{$sub_category->id}}" val="sub-cat">Edit</button>
                      <button class="btn btn-danger btn-xs btn-delete delete-task del-data-btn" value="{{$sub_category->id}}" val="sub-cat">Delete</button>
                      <button class="btn btn-warning btn-xs btn-check-view-sub-sub-cat" value="{{$sub_category->id}}">Check Sub Sub</button>
                  </td>
                  <td class="td-action sub-cat-add">
                      <button class="btn btn-warning btn-xs btn-detail open-modal upd-data-btn w-40px" value="{{$sub_category->id}}" val="sub-cat"><i class="fas fa-pencil-alt"></i></button><br>
                      <button class="btn btn-danger btn-xs btn-delete delete-task del-data-btn w-40px" value="{{$sub_category->id}}" val="sub-cat"><i class="fas fa-times"></i></button><br>
                      <button class="btn btn-warning btn-xs w-40px btn-check-view-sub-sub-cat" value="{{$sub_category->id}}"><i class="fas fa-check"></i></button>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
      <!-- End of Table-to-load-the-data Part -->
      <!-- Modal -->
      <div class="modal fade formModal" id="formModalSubCat" tabindex="-1" role="dialog" aria-labelledby="formModalLabelSubCat" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="formModalLabelSubCat">Add New Sub Categories</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                    <label for="tag-name" class="col-form-label">Name:</label>
                  <input type="text" class="form-control" id="sub-category-name">
                </div>
                <div class="form-group">
                  <label for="tag-desc" class="col-form-label">Desc:</label>
                  <textarea class="form-control" id="sub-category-desc" rows="4">
                  </textarea>
                </div>
                <div class="form-group">
                  <label for="tag-name_en" class="col-form-label">Name EN:</label>
                  <input type="text" class="form-control" id="sub-category-name_en">
                </div>
                <div class="form-group">
                  <label for="tag-desc_en" class="col-form-label">Desc EN:</label>
                  <textarea class="form-control" id="sub-category-desc_en" rows="4">
                    </textarea>
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" id="sub-category-id" name="tag-id">
                  <input type="hidden" class="form-control" id="sub-category-category-id" value="{{ $data['sub_categories'][0]->cat_id OR '' }}">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary add-data-btn btn-gg" val="sub-cat">Add Now</button>
            </div>
          </div>
        </div>
       </div>
      <!-- End of Modal -->
    </div>
</div>
