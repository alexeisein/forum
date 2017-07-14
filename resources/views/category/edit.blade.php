@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default col-md-3">
                    <div class="panel-heading">Add a category</div>
                    <div class="panel-body">
                        
                    {{ Form::open(['route' => 'categories.store']) }}

                    <div class="form-group">
                       {{ Form::label('name', 'Category Name: ', [
                       'class' => 'control-label'
                       ]) }}

                       {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Add new category'])}}
                    </div>

                    <div class="form-group">
                        {{ Form::submit('ADD', ['class' => 'btn btn-primary']) }}
                    </div>
                    {{ Form::close() }}
                    </div>
                </div>

                <div class="panel panel-default col-md-9">
                    <div class="panel-heading">List of categories</div>

                    <div class="panel-body">
                        
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>No.#</th>
                                        <th>Category Name</th>
                                        <th>Created Date</th>
                                        <th>Updated Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>
                                            {{ Form::model($category,['method' => 'PATCH', 'route' => ['categories.update', $category->id ]]) }}

                                            <div class="form-group col-md-8">

                                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Add new category']) }}
                                            </div>

                                            <div class="form-group">
                                                {{ Form::submit('SAVE', ['class' => 'btn btn-warning'])}}
                                            </div>

                                            

                                            {{ Form::close() }}
                                        </td>

                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                        <td>{{ $category->updated_at->diffForHumans() }}</td>

                                        <td>
                                            {{ Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->id ]]) }}
                                            {{ Form::submit('DELETE', ['class' => 'btn btn-danger'])}}

                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                  
                                </tbody>
                            </table>
                              {{-- @foreach($category->questions as $category)
                                {{ $category->questions->title}}
                              @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
