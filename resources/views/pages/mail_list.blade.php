@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Simple Table</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Email
                  </th>

                </thead>
                <tbody>
                  @foreach ($mail_list as $item)
                  <tr>
                    <td>
                      {{$item->id}}
                    </td>
                    <td>
                      {{$item->email}}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$mail_list->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection